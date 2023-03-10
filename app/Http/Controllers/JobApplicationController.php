<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessAppliedJob;
use App\Models\JobApplication;
use App\Models\JobOpening;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JobApplicationController extends Controller
{
    public function index()
    {
        $jobs = JobOpening::query()
            ->where('is_closed', false)
            ->whereNotIn(
                'id',
                fn ($query) =>
                $query
                    ->select('job_openings_id')
                    ->from('job_applications')
                    ->where('applied_by_id', auth()->user()->id)
            )
            ->get();

        return Inertia::render('Job', compact('jobs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'job_opening_id' => 'required|exists:job_openings,id',
        ]);


        ProcessAppliedJob::dispatch(
            $request->job_opening_id,
            auth()->user()->id,
        );
    }
}
