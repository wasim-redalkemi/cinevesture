<?php

namespace App\Models;

use App\Http\Controllers\Helper\OtpUtilityController;
use App\Http\Controllers\OtpController;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\InvoicePaid;
use Laravel\Cashier\Billable;
use App\Notifications\ResetPasswordNotification;
use App\Notifications\VerifyOtp;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function country()
    {
        return $this->hasOne(MasterCountry::class, 'id', 'country_id');
    }

    public function skill()
    {
        return $this->hasMany(UserSkill::class, 'user_id');
    }

    public function language()
    {
        return $this->hasMany(UserLanguage::class, 'user_id');
    }

    public function sendPasswordResetNotification($token)
    {
        $otp = OtpUtilityController::createOtp($this, 'F',$token); // F for Forgot pasword
        $collect  = collect();
        $collect->put('otp', $otp);
        $this->notify(new VerifyOtp($collect));
    }
    public function organization()
    {
        return $this->hasOne(UserOrganisation::class, 'user_id', 'id');
    }
}
