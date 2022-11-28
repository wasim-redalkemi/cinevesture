<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPlanModuleOperationRelation extends Model
{
    use HasFactory;

    protected $table = 'master_plan_modules_operation_relations';

    public function getModule()
    {
        return $this->hasOne(MasterPlanModule::class,'id','module_id');
    }

    public function getOperation()
    {
        return $this->hasOne(MasterPlanOperation::class,'id','action_id');
    }
}
