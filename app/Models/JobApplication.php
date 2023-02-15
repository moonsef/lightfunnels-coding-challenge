<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function job_opening()
    {
        return $this->belongsTo(JobOpening::class, 'job_openings_id');
    }

    public function applied_by()
    {
        return $this->belongsTo(User::class, 'applied_by_id');
    }
}
