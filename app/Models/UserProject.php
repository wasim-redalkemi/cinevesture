<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProject extends Model
{
    use HasFactory;

    public function projectImage()
    {
        return $this->hasOne(ProjectMedia::class,'project_id','id');

    }
}
