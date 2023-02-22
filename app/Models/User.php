<?php

namespace App\Models;
use App\Http\Controllers\Helper\OtpUtilityController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\VerifyOTPForgetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable,SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'name', 'email', 'password', 'parent_user_id',
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
        return $this->belongsTo(MasterCountry::class,'country_id');
    }

    public function skill()
    {
        return $this->belongsToMany(MasterSkill::class,UserSkill::class,'user_id','skill_id');
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
        $collect->put('first_name', ucFirst($this->first_name));
        // $this->notify(new VerifyOtp($collect));
        $this->notify(new VerifyOTPForgetPassword($collect));

    }

    public function organization(){
        return $this->hasOne(UserOrganisation::class, 'user_id');
    }

    public function invites(){
        return $this->hasOne(UserInvite::class, 'user_id');
    }

    public function getSubcription()
    {
        return $this->hasOne(UserSubscription::class, 'user_id');
    }
    public function appliedJobs()
    {
        return $this->hasMany(UserAppliedJob::class,'user_id');
    }

    public function isfavouriteProfile(){
        return $this->hasOne(UserFavouriteProfile::class, 'profile_id');
    }

    // public function userPlan(){
    //     return $this->belongsToMany(UserSubscription::class, 'plan_id', 'user_id');
    // }
    public function membership(){
        return $this->belongsToMany(Plans::class,UserSubscription::class,'user_id','plan_id');
    }
}
