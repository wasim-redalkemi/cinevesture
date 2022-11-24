<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserJob extends Model
{
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
}
