<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnvioDoc extends Mailable
{
    use Queueable, SerializesModels;

    public $datos;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($datos, $subject)
    {
        $this->datos = $datos;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.prueba')
                    ->subject($this->subject);
    }
}
