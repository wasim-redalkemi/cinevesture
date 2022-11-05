<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectGenre extends Model
{
    use HasFactory;

    public function genre()
    {
        return $this->hasMany(MasterProjectGenre::class,'id','project_id');

    }
}
