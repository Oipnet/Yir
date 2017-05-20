<?php

namespace App\Listeners;

use App\Mail\RegisteredUser;
use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class CreateUserListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        // on envoi le mail en utilisant la class mail RegisterdUser ( celle qui envoi le token d'inscription )
      //  dd($event->user);
        Mail::to($event->user->email)->send(new RegisteredUser($event->user));
    }
}
