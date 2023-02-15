<?php

namespace App\Console\Commands;

use App\Events\JobOpeningClosed;
use App\Models\JobOpening;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CloseJobOpenings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'job-opening:close';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Close job openings that have reached their application deadline.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        JobOpening::query()
            ->where('deadline', '<=', now())
            ->where('is_closed', false)
            ->lazyById(50)
            ->each(function ($job_openeing) {
                $job_openeing->update(['is_closed' => true]);
                JobOpeningClosed::dispatch($job_openeing);
            });
    }
}
