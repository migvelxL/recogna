@extends('layouts.app_forms')

@section('title', 'Alteração')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="cardAlterar">

                    <div class="card-body">
                        <form action="{{ url('/update_user', $usuario[0]->id)}}" method="POST" enctype="multipart/form-data" class="form-cad">
                            @csrf

                            <div class="title">
                                <h3><b>ALTERAR DADOS USUÁRIO</b></h3>
                                <hr>
                            </div>
                            

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Nome do usuário:</b></label>
                                <div class="col-md-6"> 
                                    <input type="text" class="form-control" name="name" placeholder="Nome:" value="{{ $usuario[0]->name }}" required> 
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Telefone:</b></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="telefone" placeholder="Telefone:" value="{{ $usuario[0]->telefone }}" required>
                                </div>
                            </div>

                            @if(Auth::user()->id == $usuario[0]->id && Auth::user()->adm == 1)
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label text-md-right"><b>Tipo de usuário:</b></label>
                                    <div class="col-md-6">
                                    <select name="tipo">
                                        <option value="1" <?php if($usuario[0]->adm == 1) echo'selected';?> >Administrador</option>
                                    </select>
                                    </div>
                                </div>

                            @else
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label text-md-right"><b>Tipo de usuário:</b></label>
                                    <div class="col-md-6">
                                    <select name="tipo">
                                        <option value="1" <?php if($usuario[0]->adm == 1) echo'selected';?>>Administrador</option>
                                        <option value="0" <?php if($usuario[0]->adm == 0) echo'selected';?>>Usuário Comum</option>
                                    </select>
                                    </div>
                                </div>
                            @endif
                            

                            <div class="form-group row" style="margin-bottom: 10px;">
                                <label class="col-sm-4 col-form-label text-md-right"><b>Status:</b></label>
                                <div class="col-md-6">
                                <select name="status" class="select-control">
                                    <option value="1" <?php if($usuario[0]->ativo == 1) echo'selected';?>>Ativo</option>
                                    <option value="0" <?php if($usuario[0]->ativo == 0) echo'selected';?>>Inativo</option>
                                </select>
                                </div>
                            </div>

                              
                            <button type="submit" class="btn btn-primary">
                                    {{ __('Alterar') }}
                            </button>
                            

                            


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