@component('mail::message')

<h1 style="text-align: center;">Bem vindo</h1>

<p>Seja muito bem vindo!!</p>
<p style="text-align: justfy;">Você foi cadastrado no nosso sistema Recogna com as seguintes informações:</p>

<p>Nome:</p>
<p style="color: #6610f2;"><b>{{ $user->name }}</b></p>

<p>Email:</p>
<p style="color: #6610f2;"><b>{{ $user->email }}</b></p>

<p>Senha padrão:</p>
<p style="color: #6610f2;"><b>{{ $senha }}</b></p>

<p>Tipo de usuário:</p>
<p style="color: #6610f2;"><b>{{ $tipo }}</b></p>

<p style="text-align: justfy;">Após logar altere sua senha padrão para evitar que outros acessem sua conta!</p>


<p style="text-align: center;">Clique para entrar na sua nova conta em nosso site:</p>

@component('mail::button', ['url' => 'http://127.0.0.1:8000/home'])
    Entrar
@endcomponent

@endcomponent
