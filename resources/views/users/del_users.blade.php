@extends('layouts.app_forms')

@section('title', 'Exclusão')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="cardAlterar">
                    

                    <div class="card-body">
                        <form action="{{ url('/delete_user', $user[0]->id)}}" method="POST" enctype="multipart/form-data" class="form-cad">
                            @csrf

                            <div class="title">
                                <h3><b>EXCLUIR USUÁRIO</b></h3>
                                <hr>
                            </div>
                            

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Nome do usuário:</b></label>
                                <div class="col-md-6"> 
                                    <input type="text" class="form-control" name="name" value="{{ $user[0]->name }}" disabled> 
                                </div>
                            </div>
                            

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Telefone:</b></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="telefone" value="{{ $user[0]->telefone }}" disabled>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Tipo de usuário:</b></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="tipo" value="<?php if($user[0]->adm == 1) {echo 'Administrador';} else{ echo 'Usuário comum'; } ?>" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Máquina em uso:</b></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="maquina" value="<?php if($user[0]->id_maq == '') {echo 'Nenhuma máquina em uso';} else{ echo $user[0]->nome; } ?>" disabled>
                                </div>
                            </div>

                            <div class="form-group row"  style="margin-bottom: 10px;">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Status:</b></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="status" value="<?php if($user[0]->ativo == 1) {echo 'Ativo';} else{ echo 'Inativo'; } ?>" disabled>
                                    </div>
                                    <br><br>
                            </div>
                 
                            <button type="submit" class="btn btn-primary">
                                    {{ __('Excluir') }}
                            </button>
                            

                            <br>


                        </form>

                        <a href="{{ url('/controle_user') }}">
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