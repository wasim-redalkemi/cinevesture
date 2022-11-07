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
    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');

    }

   
    public function genres()
    {
        return $this->belongsToMany(MasterProjectGenre::class,ProjectGenre::class,'project_id','gener_id');

    }
    public function projectCategory()
    {
        return $this->belongsToMany(MasterProjectCategory::class,ProjectCategory::class,'project_id','category_id');

    }
}
