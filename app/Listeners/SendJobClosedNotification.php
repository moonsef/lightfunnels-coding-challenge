<?php

namespace App\Listeners;

use App\Events\JobOpeningClosed;
use App\Mail\JobClosed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendJobClosedNotification
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
    public function handle(JobOpeningClosed $event): void
    {
        Mail::to($event->job_opening->created_by->email)
            ->send(new JobClosed($event->job_opening->title));
    }
}
