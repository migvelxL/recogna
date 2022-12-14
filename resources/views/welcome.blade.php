<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Recogna</title>
        
        <!-- Font do google-->
        <link href = "https://fonts.googleapis.com/css2?family=Quicksand" rel = "stylesheet">
        
        <!-- css bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <!-- css ds aplicação -->
        <link rel="stylesheet" href="/css/index.css">
        <link href="{{ asset('css/mens.css') }}" rel="stylesheet">
        
    </head>
    <body>

            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand">
                        <img src="/img/logo.png" alt="Recogna" width="150px">
                    </a>
                    
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/login" class="nav-link">ENTRAR</a>
                        </li>
                        <li class="nav-item">
                            <a href="/solic_cad" class="nav-link">SOLICITAR CADASTRO</a>
                        </li>
                    </ul>
                </div>
            </nav>

        <div id="index_logo">
            <img src="/img/recogna_branco_vert.png" alt="Recogna" height="260px">
            <div>Biometric & Pattern Recognition Research Group</div>
        </div>
    </body>
</html>





