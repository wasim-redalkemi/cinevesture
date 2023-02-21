<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavouriteProject extends Model
{
    use HasFactory;

    public function projects()
    {
        return $this->belongsTo(UserProject::class,'project_id');
    }
}
