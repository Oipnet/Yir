<?php

namespace App\Providers;

use App\Listeners\ShowAnnonce;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class IncrementHitListener
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
     * @param  ShowAnnonce  $event
     * @return void
     */
    public function handle(ShowAnnonce $event)
    {
        //
    }
}
