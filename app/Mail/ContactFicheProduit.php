<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactFicheProduit extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($informations, $annonce)
    {
        $this->informations = $informations;
        $this->annonce = $annonce;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $informations = $this->informations;
        $annonce = $this->annonce;
        return $this->view('emails.ContactFicheProduit', compact('informations', 'annonce'));
    }
}
