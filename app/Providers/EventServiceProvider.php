<?php

namespace App\Providers;

use App\Listeners\CreateUserListener;
use App\Listeners\ShowAnnonce;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            CreateUserListener::class,
        ],
        'App\Events\ShowAnnonce' => [
            'App\Listeners\IncrementHitListerner',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
