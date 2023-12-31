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
        return $this->belongsTo(MasterCountry::class,'location_id');
    }
    public function jobOrganisation()
    {
        return $this->belongsTo(UserOrganisation::class,'user_id','user_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function favorite()
    {
        return $this->hasOne(UserFavoriteJob::class,'job_id');
    }
    
    public function applied()
    {
        return $this->hasOne(UserAppliedJob::class,'job_id');
    }
    
    public function singleJobApplied()
    {
        return $this->hasMany(UserAppliedJob::class,'job_id');
    }

    public function jobCreater(){
        return $this->belongsTo(User::class,'user_id','id');
    }

}
