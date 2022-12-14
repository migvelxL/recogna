@component('mail::message')

<h1 style="text-align: center;">Solicitação de cadastro</h1>

<p>O usuário,</p> 

<span id="nome" value='{{ $nome }}' style="color: #6610f2;"><b>{{ $nome }}</b></span> <br>
    
<p>solicitou cadastro como o endereço de email:</p>

<span id="email" value='{{ $email }}' style="color: #6610f2;"><b>{{ $email }}</b></span> <br>

<p style="text-align: center;">Clique para cadastrar o usuário:</p>






@component('mail::button', ['url' => "http://127.0.0.1:8000/cad_user?nome= $nome & email= $email & telefone= $telefone", 'nome' => $nome, 'email' => $email, 'telefone' => $telefone])
    Cadastrar usuário
@endcomponent

@endcomponent

