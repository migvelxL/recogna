@extends('layouts.app_init')

@section('title', 'Login')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="cardLogin">
                    

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="title">
                                <h3><b>LOGIN</b></h3>
                                <hr>
                            </div>
                            

                            <div class="form-group row">

                                <div class="col-md-6">

                                    <div class="icon_log">

                                        <input id="email" type="email" placeholder="&#xf003;    Email"   class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">

                                    <div class="icon_log">
                                        <input id="password" placeholder="&#xf069;    Senha" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            

                            <div class="form-check">
                                <label class="form-check-label" for="remember">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    {{ __('Lembre de mim') }}
                                </label>
                            </div>

                            <br>

                            
                            <button type="submit" class="btn btn-primary">
                                {{ __('LOGIN') }}
                            </button>

                            <br>
                            <br>

                                    @if (Route::has('password.request'))
                                        <a class="link" href="{{ route('password.request') }}">
                                            {{ __('Esqueceu sua senha?') }}
                                        </a>
                                    @endif
                        </form>

                        
                    </div>

                    

                </div>
            </div>
        </div>
    </div>
@endsection
