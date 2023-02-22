<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavouriteProfile extends Model
{
    use HasFactory;
    public function profiles()
    {
        return $this->belongsTo(User::class,'profile_id');
    }
    public function profileSkills()
    {
        return $this->hasMany(UserSkill::class,'user_id','profile_id');
    }

    public function profileCountry()
    {
        return $this->belongsTo(User::class,'profile_id');
    }
}
