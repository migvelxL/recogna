@extends('layouts.app')

@section('title', 'Dados')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="cardMais">
                    

                    <div class="card-body">
                        <form action="{{ url('/mais', $maq_mais[0]->id_maq)}}" method="POST" enctype="multipart/form-data" class="form-cad">
                            @csrf

                            <div class="title">
                                <h3><b>DADOS DA MÁQUINA</b></h3>
                                <hr>
                            </div>
                        
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Nome da máquina:</b></label>
                                <div class="col-md-6"> 
                                    <input type="text" class="form-control" name="nome" value="{{ $maq_mais[0]->nome }}" disabled> 
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Mac Address:</b></label>
                                <div class="col-md-6"> 
                                    <input type="text" class="form-control" name="mac_address" value="{{ $maq_mais[0]->mac_address }}" disabled> 
                                </div>
                            </div>

                            <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-md-right"><b>Status:</b></label>
                                <div class="col-md-6"> 
                                <input type="text" class="form-control" name="status" value="<?php if($maq_mais[0]->status == 1) {echo 'Ok';} else{ echo 'Manutenção'; } ?>" disabled>
                                </div>
                            </div>

                            @if($maq_mais[0]->status != 1)
                                <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right" style="color: red;"><b>Em manutenção:</b></label>
                                    <div class="col-md-6"> 
                                    <input type="text" class="form-control" name="manut" value="{{ $maq_mais[0]->manut }}" readonly>
                                    </div>
                                </div>
                            @endif

                            <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-md-right"><b>Restrita:</b></label>
                                <div class="col-md-6"> 
                                <input type="text" class="form-control" name="restrita" value="<?php if($maq_mais[0]->restrita == 1) {echo 'Sim';} else{ echo 'Não'; } ?>" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Local:</b></label>
                                <div class="col-md-6"> 
                                    <input type="text" class="form-control" name="local" value="{{ $maq_mais[0]->local }}" disabled> 
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Domínio:</b></label>
                                <div class="col-md-6"> 
                                    <input type="text" class="form-control" name="dominio" value="{{ $maq_mais[0]->dominio }}" disabled> 
                                </div>
                            </div>

                            @if($maq_mais[0]->cpu != '')
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label text-md-right"><b>CPU:</b></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="cpu" value="<?php if($maq_mais[0]->cpu == '') {echo '--';} else{ echo $maq_mais[0]->cpu; } ?>" disabled>
                                    </div>
                                </div>
                            @endif

                            @if($maq_mais[0]->gpu != '')
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label text-md-right"><b>GPU:</b></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="gpu" value="<?php if($maq_mais[0]->gpu == '') {echo '--';} else{ echo $maq_mais[0]->gpu; } ?>" disabled>
                                    </div>
                                </div>
                            @endif


                            @if($maq_mais[0]->ram != '')
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>RAM:</b></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="ram" value="<?php if($maq_mais[0]->ram == '') {echo '--';} else{ echo $maq_mais[0]->ram; } ?>" disabled>
                                </div>
                            </div>
                            @endif

                            @if($maq_mais[0]->storage != '')
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Storage:</b></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="storage" value="<?php if($maq_mais[0]->storage == '') {echo '--';} else{ echo $maq_mais[0]->storage; } ?>" disabled>
                                </div>
                            </div>
                            @endif

                            @if($maq_mais[0]->endereco != '')
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Endereço IP:</b></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="endereco" value="<?php if($maq_mais[0]->endereco == '') {echo '--';} else{ echo $maq_mais[0]->endereco; } ?>" disabled>
                                </div>
                            </div>
                            @endif

                            @if($maq_mais[0]->senha != '')
                            <div class="input-control">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label text-md-right"><b>Senha:</b></label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="senha" value="<?php if($maq_mais[0]->senha == '') {echo '--';} else{ echo $maq_mais[0]->senha; } ?>" disabled>
                                        </div>
                                </div>
                            </div>
                            @endif

                            @if($maq_mais[0]->id_user != '')

                                <div class="input-control">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label text-md-right"><b>Usuário:</b></label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="name" value="<?php if($maq_mais[0]->name == '') {echo '--';} else{ echo $maq_mais[0]->name; } ?>" readonly>
                                            </div>
                                    </div>
                                </div>

                                <div class="input-control">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label text-md-right"><b>Prazo:</b></label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="prazo" value="<?php if($maq_mais[0]->prazo == '') {echo '--';} else{ echo $maq_mais[0]->prazo; } ?>" readonly>
                                            </div>
                                    </div>
                                </div>

                                <div class="input-control">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label text-md-right"><b>Paper:</b></label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="paper" value="<?php if($maq_mais[0]->paper == '') {echo '--';} else{ echo $maq_mais[0]->paper; } ?>" readonly>
                                            </div>
                                    </div>
                                </div>

                            @endif
                            
                            <br>


                        </form>

                        <div class="botoes">
                            <a href="{{ url('/alt_maq', $maq_mais[0]->id_maq) }}">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Alteração') }}
                                </button>
                            </a>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="{{ url('/del_maq', $maq_mais[0]->id_maq) }}">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Exclusão') }}
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

