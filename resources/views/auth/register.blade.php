@extends('layouts.app_users')

@section('title', 'Cadastro de usuários')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="cardRegister">
                

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="title">
                            <h3><b>CADASTRAR USUÁRIO</b></h3>
                            <hr>
                        </div>
                        

                        <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-md-right"><b>Nome do usuário:</b></label>
                                <div class="col-md-6">
                                    <input id="name" placeholder="Nome" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-md-right"><b>Email:</b></label>
                                <div class="col-md-6">
                                    <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-md-right"><b>Telefone:</b></label>
                                <div class="col-md-6">
                                    <input id="telefone" placeholder="Telefone" type="text" class="form-control" name="telefone" required autocomplete="telefone">
                                </div>
                        </div>

                        <div class="form-group dec">
                            <div class="ger"><p>Usuário</p></div>
                                <div class="switch__container">
                                    <input id="switch-flat" class="switch switch--flat" type="checkbox" name="adm" value="1">
                                    <label for="switch-flat"></label>
                                </div>
                                <div class="func"><p>Administrador</p></div>   
                            
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-md-right"><b>Senha:</b></label>
                                <div class="col-md-6">
                                    <input id="password" placeholder="Senha" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-md-right"><b>Confirme a senha:</b></label>
                                <div class="col-md-6">
                                <input id="password-confirm" placeholder="Confirmar senha" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>
                        <br>


                        <button type="submit" class="btn btn-primary">
                            {{ __('CADASTRAR') }}
                        </button>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
