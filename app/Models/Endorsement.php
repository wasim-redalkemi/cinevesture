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
    public function endorsementJob()
    {
        return $this->hasOne(UserJob::class,'id','from');

    }
}
