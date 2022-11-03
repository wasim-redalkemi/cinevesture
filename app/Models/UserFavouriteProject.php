<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavouriteProject extends Model
{
    use HasFactory;

    public function projects()
    {
        return $this->hasOne(UserProject::class,'id','project_id');
    }
}
