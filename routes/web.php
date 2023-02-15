<?php

use App\Enums\UserRole;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobOpeningController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        if (auth()->user()->role === UserRole::Employee) {
            return redirect()->route('job_opening.index');
        }

        if (auth()->user()->role === UserRole::JobSeeker) {
            return redirect()->route('job.index');
        }
        abort(403);
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/job-opening', [JobOpeningController::class, 'index'])->name('job_opening.index');
    Route::get('/job-opening/create', [JobOpeningController::class, 'create'])->name('job_opening.create');
    Route::post('/job-opening', [JobOpeningController::class, 'store'])->name('job_opening.store');

    Route::get('/jobs', [JobApplicationController::class, 'index'])->name('job.index');
    Route::post('/jobs', [JobApplicationController::class, 'store'])->name('job.store');
});


require __DIR__ . '/auth.php';
