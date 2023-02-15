<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOpening extends Model
{
    use HasFactory;


    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i',
        'deadline' => 'datetime:Y-m-d h:i'
    ];

    public function createdby()
    {
        return $this->belongsTo(User::class, 'createdby_id');
    }
}
