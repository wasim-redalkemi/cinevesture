<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endorsement extends Model
{
    use HasFactory;

    public function endorsementCreater()
    {
        return $this->belongsTo(User::class,'from');

    }
    public function endorsementorganisation()
    {
        return $this->belongsTo(UserOrganisation::class,'from','user_id');

    }
}
