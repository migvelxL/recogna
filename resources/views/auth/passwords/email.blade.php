@extends('layouts.app_init')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="cardReset">
                    

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="title">
                                <h3><b>RESGATANDO SENHA</b></h3>
                                <hr>
                            </div>

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            
                            <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><b>{{ __('Email de redefinição:') }}</b></label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}"required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                            
                            
                            <button type="submit" class="btn btn-primary" style="margin-top: 20px;">
                                {{ __('Enviar email') }}
                            </button>

                            <br>
                        </form>   
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
