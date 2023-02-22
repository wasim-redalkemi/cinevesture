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
        return $this->belongsTo(MasterPlanModule::class,'module_id');
    }

    public function getOperation()
    {
        return $this->belongsTo(MasterPlanOperation::class,'action_id');
    }
}
