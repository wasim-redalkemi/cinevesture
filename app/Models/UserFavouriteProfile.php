<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavouriteProfile extends Model
{
    use HasFactory;
    public function profiles()
    {
        return $this->hasOne(User::class,'id','profile_id');
    }
}
