<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProject extends Model
{
    use HasFactory;

    public function projectImage()
    {
        return $this->hasOne(ProjectMedia::class,'project_id')->where('file_type','image')->where('is_default_marked','1');
    }
    public function projectOnlyImage()
    {
        return $this->hasMany(ProjectMedia::class,'project_id')->where('file_type','image');
    }
    public function projectOnlyVideo()
    {
        return $this->hasMany(ProjectMedia::class,'project_id')->where('file_type','video');
    }
    public function projectMarkVideo()
    {
        return $this->hasMany(ProjectMedia::class,'project_id')->where('file_type','video')->where('is_default_marked','1');
    }
    public function projectOnlyDoc()
    {
        return $this->hasMany(ProjectMedia::class,'project_id')->where('file_type','doc');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
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
        return $this->belongsTo(ProjectType::class,'project_type_id');
    }

    public function projectStageOfFunding()
    {
        return $this->belongsTo(ProjectStageOfFunding::class,'stage_of_funding_id');
    }
    public function projectStage()
    {
        return $this->belongsTo(ProjectStage::class,'project_stage_id');
    }
    public function isfavouriteProject(){
        return $this->belongsTo(UserFavouriteProject::class, 'project_id')->where('user_id',auth()->user()->id);
    }
    public function isfavouriteProjectMain(){
        return $this->hasMany(UserFavouriteProject::class, 'project_id')->where('user_id',auth()->user()->id);
    }
    public function isfavouriteProjectOne(){
        return $this->hasOne(UserFavouriteProject::class, 'project_id')->where('user_id',auth()->user()->id);
    }
}   
