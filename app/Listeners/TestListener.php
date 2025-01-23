<?php

namespace App\Listeners;

use App\Models\User;
use App\Jobs\TestJob;
use App\Events\TestEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TestEvent $event): void
    {
        logger('Test Event Fired');
        dump($event->user);
        dispatch(new TestJob($event->user));
    }
}
