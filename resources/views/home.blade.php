@extends('layouts.app_pages_user')

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


        <div class="atencao"><i class="fas fa-exclamation-circle" style="color: #fcba03; margin-right: 20px;"></i>Leia com atenção<i class="fas fa-exclamation-circle" style="color: #fcba03; margin-left: 20px;"></i></div>
        <div class="text_meio">
            <i class="fas fa-at" style="color: #128df7; margin-right: 20px;"></i>Para acessar as máquinas são utilizados os domínios.
            <br><br><br>
            <i class="fas fa-desktop" style="color: #128df7; margin-right: 20px;"></i>Após o fim do uso libere a máquina que estava utilizando.
            <br><br><br>
            <i class="far fa-folder-open" style="color: #128df7; margin-right: 20px;"></i>Ao acessar a máquina pela primeira vez será criado um diretório /home/seu_usuario.
            <br><br><br>
            <i class="fas fa-unlock-alt" style="color: #128df7; margin-right: 20px;"></i>No primeiro acesso de seu login, você será requisitado para mudar a senha, mude e guarde-a.
            <br><br><br>
            <i class="far fa-copy" style="color: #128df7; margin-right: 20px;"></i>Caso precise copiar algo seu da máquina use: cp -rf /home/nome_da_maquina/pasta_desejada /home/seu_usuario.
            
        </div>


</div>
@endsection
