<?php

namespace App\Models;

use Database\Seeders\MasterPlanModuleOperationSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
    use HasFactory;
    protected $table = 'plans';

    public function getRelationalData()
    {
        return $this->hasMany(MasterPlanModuleOperationRelation::class,'plan_id');
    }

}
