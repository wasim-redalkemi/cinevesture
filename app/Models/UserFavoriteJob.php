<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavoriteJob extends Model
{
    use HasFactory;
    public function jobDetails()
    {
        return $this->belongsTo(UserJob::class,'job_id')->withTrashed();
    }
}
