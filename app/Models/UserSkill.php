<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSkill extends Model
{
    use HasFactory;
    public function getSkills()
    {
        return $this->belongsTo(MasterSkill::class,'skill_id');
    }
}
