@extends('layouts.app_pages')

@section('title', 'Página Inicial')

@section('content')

<div class="container">

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="title">
        <h3><b>BEM VINDO {{ Auth::user()->name }}</b></h3>
        <hr>
    </div>

    <br>

    <div class="meio">
        <div class="texto_meio">
            <i class="fas fa-network-wired" style="color: #128df7; margin-right: 20px;"></i>Administre as máquinas e os usuários cadastrados.
            <br><br><br>
            <i class="fas fa-edit" style="color: #128df7; margin-right: 20px;"></i>Altere ou exclua dados das planilhas salvas.
            <br><br><br>
            <i class="fas fa-table" style="color: #128df7; margin-right: 20px;"></i>Tenha controle das atividades dos usuários e de máquinas.
        </div>
        <img src="/img/imgHome_adm.png" alt="Recogna" class="img_home">
    </div>    


</div>

@endsection