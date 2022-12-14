<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class newRecogna extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\stdClass $user, string $email, string $nome, string $telefone)
    {
        $this->user = $user;
        $this->email = $email;
        $this->nome = $nome;
        $this->telefone = $telefone;
    }

    /**
     * Build the message.
     *
     * @return $this
     *
     */
    public function build()
    {
        $this->subject('Solicitação de cadastro');
        $this->to($this->user->email, $this->user->name);

        return $this->markdown('mail.newRecogna',[
            'user' => $this->user,
            'email' => $this->email,
            'nome' => $this->nome,
            'telefone' => $this->telefone
        ]);
    }
}