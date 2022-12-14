<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class cadMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\stdClass $user, string $telefone,  string $senha, string $tipo)
    {
        $this->user = $user;
        $this->telefone = $telefone;
        $this->senha = $senha;
        $this->tipo = $tipo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Cadastrado');
        $this->to($this->user->email, $this->user->name);

        return $this->markdown('mail.cadMail',[
            'user' => $this->user,
            'telefone' => $this->telefone,
            'senha' => $this->senha,
            'tipo' => $this->tipo,
        ]);
    }
}
