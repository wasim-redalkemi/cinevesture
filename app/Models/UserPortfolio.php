<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPortfolio extends Model
{
    use HasFactory;
    public function getPortfolio()
    {
        return $this->hasMany(UserPortfolioImage::class,'portfolio_id');
    }

    public function getPortfolioSkill()
    {
        return $this->belongsToMany(MasterSkill::class,UserPortfolioSpecificSkills::class,'portfolio_id','project_specific_skills_id');
    }
}
