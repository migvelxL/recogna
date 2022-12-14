<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $alocacao;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($alocacao, string $email, string $nome)
    {
        $this->alocacao = $alocacao;
        $this->email = $email;
        $this->nome = $nome;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Desalocamento de máquina');
        $this->to($this->email, $this->nome);

        // $this->to($this->user->email, $this->user->name);
        // return $this->from('recognalab@gmail.com')
        //             ->subject('Desalocamento de máquina')
        //             ->to($this->email, $this->nome)
        //             ->view('mail.dynamic_email_template')
        //             ->with('alocacao', $this->alocacao, 'nome',  $this->nome, 'email', $this->email);
        return $this->markdown('mail.dynamic_email_template', [
            'alocacao' => $this->alocacao,
            'nome' => $this->nome,
            'email' => $this->email
        ]);
    }
}
