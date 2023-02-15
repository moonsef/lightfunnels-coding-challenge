<?php

namespace App\Jobs;

use App\Mail\ApplicationReceived;
use App\Models\JobApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ProcessAppliedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public int $job_opening_id,
        public int $applied_by_id
    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $job_application = JobApplication::query()
            ->create([
                'job_openings_id' => $this->job_opening_id,
                'applied_by_id' => $this->applied_by_id,
            ]);

        Mail::to($job_application->job_opening->created_by->email)
            ->send(new ApplicationReceived($job_application->applied_by));
    }
}
