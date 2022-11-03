<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProject extends Model
{
    use HasFactory;
    // public function category()
    // {
    //     return $this->hasOne(Phone::class);
    // }
    public function user()
    {
        return $this->hasOne(user::class,'id','user_id');
    }
}
