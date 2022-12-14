@extends('layouts.app_init')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="cardReset2">
                    

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="title">
                                <h3><b>REDEFINA SUA SENHA</b></h3>
                                <hr>
                            </div>
                            
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right"><b>{{ __('Email de acesso:') }}</b></label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ $email ?? old('email') }}" required autocomplete="email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right"><b>{{ __('Nova senha:') }}</b></label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Nova senha" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <div class="ult">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><b>{{ __('Confirme senha:') }}<b></label>
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" placeholder="Confirme senha" name="password_confirmation" style="margin-left: 8px;" required autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                            
                            
                            <button type="submit" class="btn btn-primary" style="margin-top: 20px;">
                                {{ __('Redefinir senha') }}
                            </button>

                            <br>
                        </form>   
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
