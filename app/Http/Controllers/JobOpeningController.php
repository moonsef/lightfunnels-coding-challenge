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
            ->latest('id')
            ->get();

        return Inertia::render("JobOpening/Index", compact('job_openings'));
    }

    public function create()
    {
        return Inertia::render("JobOpening/Create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'deadline' => 'required|after:today',
        ]);

        JobOpening::query()
            ->create([
                'title' => $request->title,
                'location' => $request->location,
                'deadline' => $request->deadline,
                'createdby_id' => auth()->user()->id
            ]);

        return to_route('job_opening.index');
    }
}
