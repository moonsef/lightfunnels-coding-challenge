<?php

namespace App\Http\Controllers;

use App\Models\JobOpening;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JobOpeningController extends Controller
{
    public function index()
    {
        $job_openings = JobOpening::query()
            ->whereBelongsTo(auth()->user(), 'createdby')
            ->get();

        return Inertia::render("JobOpening/Index", compact('job_openings'));
    }
}
