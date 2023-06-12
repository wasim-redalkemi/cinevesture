<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionOrder extends Model
{
    use HasFactory;
    protected $table ="subscription_orders";
    
    public function plan()
    {
        return $this->belongsTo(Plans::class,'plan_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
