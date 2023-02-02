<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endorsement extends Model
{
    use HasFactory;

    public function endorsementCreater()
    {
        return $this->hasOne(User::class,'id','from');

    }
    public function endorsementorganisation()
    {
        return $this->hasOne(UserOrganisation::class,'user_id','from');

    }
}
