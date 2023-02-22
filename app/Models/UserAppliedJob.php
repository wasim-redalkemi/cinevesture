<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAppliedJob extends Model
{
    use HasFactory,SoftDeletes;

    public function jobDetails()
    {
        return $this->belongsTo(UserJob::class,'job_id');
    }
}
