<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubscription extends Model
{
    use HasFactory;

    protected $table = 'user_subcriptions';

    public function user()
    {
        return $this->belongsTo(user::class,'user_id','id');
    }

}
