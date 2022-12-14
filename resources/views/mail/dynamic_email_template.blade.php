@component('mail::message')

<h1 style="text-align: center;">Aviso de desalocamento de máquina</h1>

<p>Olá,</p> 

<span id="nome" style="color: #6610f2;"><b>{{ $nome }},</b></span> <br>
    
<p>o prazo da seguinte máquina expirou o prazo:</p>

<span id="email" style="color: #6610f2;"><b>{{ $alocacao->nome }}</b></span> <br>

<p style="text-align: center;">A máquina será desalocada automaticamente</p>






@endcomponent