<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProject extends Model
{
    use HasFactory;

    public function projectImage()
    {
        return $this->hasOne(ProjectMedia::class,'project_id','id')->where('file_type','image')->where('is_default_marked','1');
    }
    public function projectOnlyImage()
    {
        return $this->hasMany(ProjectMedia::class,'project_id')->where('file_type','image');
    }
    public function projectOnlyVideo()
    {
        return $this->hasMany(ProjectMedia::class,'project_id')->where('file_type','video');
    }
    public function projectOnlyDoc()
    {
        return $this->hasMany(ProjectMedia::class,'project_id')->where('file_type','doc');
    }

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
   
    public function genres()
    {
        return $this->belongsToMany(MasterProjectGenre::class,ProjectGenre::class,'project_id','gener_id');
    }

    public function projectCategory()
    {
        return $this->belongsToMany(MasterProjectCategory::class,ProjectCategory::class,'project_id','category_id');
    }

    public function projectLookingFor()
    {
        return $this->belongsToMany(MasterLookingFor::class,ProjectLookingFor::class,'project_id','looking_for_id');
    }

    public function projectLanguages()
    {
        return $this->belongsToMany(MasterLanguage::class,ProjectLanguage::class,'project_id','language_id');
    }

    public function projectCountries()
    {
        return $this->belongsToMany(MasterCountry::class,ProjectCountry::class,'project_id','country_id');
    }

    public function projectMilestone()
    {
        return $this->hasMany(ProjectMilestone::class,'project_id');
    }

    public function projectAssociation()
    {
        return $this->hasMany(ProjectAssociation::class,'project_id');
    }
    
    public function projectType()
    {
        return $this->hasOne(ProjectType::class,'id','project_type_id');
    }

    public function projectStageOfFunding()
    {
        return $this->hasOne(ProjectStageOfFunding::class,'id','stage_of_funding_id');
    }
    public function projectStage()
    {
        return $this->hasOne(ProjectStage::class,'id','project_stage_id');
    }
}
