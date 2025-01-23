<?php

namespace App\Jobs;

use App\Models\User;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use App\Notifications\TestNotification;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Notification;

class TestJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public User $user)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->user->email)->send(new TestMail($this->user));

        $this->user->notify(new TestNotification($this->user));

        Notification::send($this->user, new TestNotification($this->user));
    }
}
