<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserJob extends Model
{
    use SoftDeletes; 
    use HasFactory;

    public function jobSkills()
    {
        return $this->belongsToMany(MasterSkill::class,JobSkill::class,'job_id','skill_id');
    }
    public function jobEmployements()
    {
        return $this->belongsToMany(MasterEmployement::class,JobEmployement::class,'job_id','employment_id');
    }
    public function jobWorkSpaces()
    {
        return $this->belongsToMany(Workspace::class,JobWorkSpace::class,'job_id','workspace_id');
    }
    public function jobLocation()
    {
        return $this->hasOne(MasterCountry::class,'id','location_id');
    }
    public function jobOrganisation()
    {
        return $this->hasManyThrough(UserOrganisation::class,User::class,'id','user_id','user_id');
    }
    public function user()
    {
        return $this->hasMany(User::class,'id','user_id');
    }

    public function favorite()
    {
        return $this->hasOne(UserFavoriteJob::class,'job_id')->where("user_id",auth()->id());
    }
    
    public function applied()
    {
        return $this->hasOne(UserAppliedJob::class,'job_id')->where("user_id",auth()->id());
    }

    public function jobCreater(){
        return $this->belongsTo(User::class,'user_id');
    }

}
