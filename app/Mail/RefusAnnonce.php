<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RefusAnnonce extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $annonces)
    {
        $this->user = $user;
        $this->annonces = $annonces;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = $this->user;
        $annonces = $this->annonces;
        return $this->view('emails.RefusAnnonce', compact('user', 'annonces'));
    }
}
