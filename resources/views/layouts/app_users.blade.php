<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
        
    <!-- Font do google-->
    <link href = "https://fonts.googleapis.com/css2?family=Quicksand" rel = "stylesheet">
        
    <!-- css bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mens.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
    <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
                <a href="/home" class="navbar-brand">
                    <img src="/img/logo.png" alt="Recogna">
                </a>
                
                <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/contatos" class="nav-link">CONTATOS</a>
                        </li>
                        <li class="nav-item">
                            <a href="/controle_maq" class="nav-link">MÁQUINAS</a>
                        </li>
                        <li class="nav-item">
                            <a href="/area" class="nav-link">ÁREA DO USUÁRIO</a>
                        </li>
                </ul>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/mensagem.js') }}"></script>
    @stack('script')
</body>
</html>