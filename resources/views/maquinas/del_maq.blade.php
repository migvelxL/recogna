@extends('layouts.app_forms')

@section('title', 'Exclusão')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="cardAlterarMaq">
                    <div class="card-body">
                        <form action="{{ url('/delete_maq', ['id' => $maq[0]->id_maq, 'id2' => $maq[0]->id]) }}" method="POST" enctype="multipart/form-data" class="form-cad">
                            @csrf

                            <div class="title">
                                <h3><b>EXCLUIR MÁQUINA</b></h3>
                                <hr>
                            </div>
                        
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Nome da máquina:</b></label>
                                <div class="col-md-6"> 
                                    <input type="text" class="form-control" name="nome" value="{{ $maq[0]->nome }}" disabled> 
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Mac Address:</b></label>
                                <div class="col-md-6"> 
                                    <input type="text" class="form-control" name="mac_address" value="{{ $maq[0]->mac_address }}" disabled> 
                                </div>
                            </div>

                            <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-md-right"><b>Status:</b></label>
                                <div class="col-md-6"> 
                                <input type="text" class="form-control" name="status" value="<?php if($maq[0]->status == 1) {echo 'Ok';} else{ echo 'Manutenção'; } ?>" disabled>
                                </div>
                            </div>

                            @if($maq[0]->status != 1)
                                <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right" style="color: red;"><b>Em manutenção:</b></label>
                                    <div class="col-md-6"> 
                                    <input type="text" class="form-control" name="manut" value="{{ $maq[0]->manut }}" disabled>
                                    </div>
                                </div>
                            @endif

                            <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-md-right"><b>Restrita:</b></label>
                                <div class="col-md-6"> 
                                <input type="text" class="form-control" name="restrita" value="<?php if($maq[0]->restrita == 1) {echo 'Sim';} else{ echo 'Não'; } ?>" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Local:</b></label>
                                <div class="col-md-6"> 
                                    <input type="text" class="form-control" name="local" value="{{ $maq[0]->local }}" disabled> 
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Domínio:</b></label>
                                <div class="col-md-6"> 
                                    <input type="text" class="form-control" name="dominio" value="{{ $maq[0]->dominio }}" disabled> 
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>CPU:</b></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="cpu" value="<?php if($maq[0]->cpu == '') {echo '--';} else{ echo $maq[0]->cpu; } ?>" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>GPU:</b></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="gpu" value="<?php if($maq[0]->gpu == '') {echo '--';} else{ echo $maq[0]->gpu; } ?>" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>RAM:</b></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="ram" value="<?php if($maq[0]->ram == '') {echo '--';} else{ echo $maq[0]->ram; } ?>" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Storage:</b></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="storage" value="<?php if($maq[0]->storage == '') {echo '--';} else{ echo $maq[0]->storage; } ?>" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Endereço IP:</b></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="endereco" value="<?php if($maq[0]->endereco == '') {echo '--';} else{ echo $maq[0]->endereco; } ?>" disabled>
                                </div>
                            </div>

                            <div class="input-control">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label text-md-right"><b>Senha:</b></label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="senha" style="margin-bottom: 5px;" value="<?php if($maq[0]->senha == '') {echo '--';} else{ echo $maq[0]->senha; } ?>" disabled>
                                        </div>
                                </div>
                            </div>
                 
                            <button type="submit" class="btn btn-primary">
                                    {{ __('Excluir') }}
                            </button>
                            

                            <br>


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