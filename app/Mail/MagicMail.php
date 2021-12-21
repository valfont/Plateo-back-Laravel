<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MagicMail extends Mailable
{
    use Queueable, SerializesModels;

    public $loginToken;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($loginToken)
    {
        $this->loginToken = $loginToken;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('magicmail')->subject("Plateo:Connexion");
    }
}
