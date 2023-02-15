<?php

namespace App\Events;

use App\Models\JobOpening;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class JobOpeningClosed
{
    use Dispatchable, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(
        public JobOpening $job_opening,
    ) {
    }
}
