@extends('layouts.app_forms')

@section('title', 'Alteração')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="cardAlterarMaq" <?php if($maquina[0]->status != 1) echo "style='height: 920px;'"?>>

                    <div class="card-body">
                        <form action="{{ url('/update_maq', $maquina[0]->id_maq)}}" method="POST" enctype="multipart/form-data" class="form-cad">
                            @csrf

                            <div class="title">
                                <h3><b>ALTERAR DADOS MÁQUINA</b></h3>
                                <hr>
                            </div>
                            

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Nome da máquina:</b></label>
                                <div class="col-md-6"> 
                                    <input type="text" class="form-control" name="nome" placeholder="Nome:" value="{{ $maquina[0]->nome }}" required> 
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Mac Address:</b></label>
                                <div class="col-md-6"> 
                                    <input type="text" class="form-control" name="mac_address" placeholder="Mac Address:" value="{{ $maquina[0]->mac_address }}" required> 
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Status:</b></label>
                                <div class="col-md-6">
                                <select name="status" id="status" onchange="changeSelect()">
                                    <option value="1" <?php if($maquina[0]->status == 1) echo'selected';?>>Ok</option>
                                    <option value="0" <?php if($maquina[0]->status == 0) echo'selected';?>>Manutenção</option>
                                </select>
                                </div>
                                <input type="text" id="manut" class="form-control" name="manut" style="display: none; margin-top: 15px; width: 400px; text-align: center; margin-bottom: 10px; margin-left: 25px;" placeholder="Digite a causa da manutenção" value="{{ $maquina[0]->manut }}">
                            </div>

                            @if($maquina[0]->status != 1)
                                <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right" style="color: red;"><b>Em manutenção:</b></label>
                                    <div class="col-md-6"> 
                                    <input type="text" class="form-control" name="manut" value="{{ $maquina[0]->manut }}">
                                    </div>
                                </div>
                            @endif


                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Restrita:</b></label>
                                <div class="col-md-6">
                                <select name="restrita">
                                    <option value="1" <?php if($maquina[0]->restrita == 1) echo'selected';?>>Sim</option>
                                    <option value="0" <?php if($maquina[0]->restrita == 0) echo'selected';?>>Não</option>
                                </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Local:</b></label>
                                <div class="col-md-6"> 
                                    <input type="text" class="form-control" name="local" placeholder="Local:" value="{{ $maquina[0]->local }}" required> 
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Domínio:</b></label>
                                <div class="col-md-6"> 
                                    <input type="text" class="form-control" name="dominio" placeholder="Domínio:" value="{{ $maquina[0]->dominio }}" required> 
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>CPU:</b></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="cpu" placeholder="<?php if($maquina[0]->cpu == '') {echo 'CPU';} else{ echo $maquina[0]->cpu; } ?>" value="{{ $maquina[0]->cpu }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>GPU:</b></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="gpu" placeholder="<?php if($maquina[0]->gpu == '') {echo 'GPU';} else{ echo $maquina[0]->gpu; } ?>" value="{{ $maquina[0]->gpu }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>RAM:</b></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="ram" placeholder="<?php if($maquina[0]->ram == '') {echo 'RAM';} else{ echo $maquina[0]->ram; } ?>" value="{{ $maquina[0]->ram }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Storage:</b></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="storage" placeholder="<?php if($maquina[0]->storage == '') {echo 'Storage';} else{ echo $maquina[0]->storage; } ?>" value="{{ $maquina[0]->storage }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Endereço IP:</b></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="endereco" placeholder="<?php if($maquina[0]->endereco == '') {echo 'Endereço IP';} else{ echo $maquina[0]->endereco; } ?>" value="{{ $maquina[0]->endereco }}">
                                </div>
                            </div>

                            <div class="input-control">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label text-md-right"><b>Senha:</b></label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="senha" style="margin-bottom: 5px;" placeholder="<?php if($maquina[0]->senha == '') {echo 'Senha';} else{ echo $maquina[0]->senha; } ?>" value="{{ $maquina[0]->senha }}">
                                        </div>
                                </div>
                            </div>
                              
                            <button type="submit" class="btn btn-primary">
                                    {{ __('Alterar') }}
                            </button>
                         
                        </form>

                        <a href="{{ URL::previous() }}">
                            <div class="fechar">
                                <button class="btn btn-primary">
                                        {{ __('Voltar') }}      
                                </button>
                            </div>
                        </a>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('js/javs.js') }}"></script>
    <script src="{{ asset('js/mensagem.js') }}"></script>
@endpush