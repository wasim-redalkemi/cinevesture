<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterPlanModuleOperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
        $query=  "INSERT INTO `cinevesture`.`master_plan_modules_operation_relations`
        (`id`,
         `plan_id`,
         `module_id`,
         `action_id`,
         `limit`)
         VALUES ('1', '1','1','1',null),
                ('2', '1','1','2',null),
                ('3', '1','1','3',null),
                ('4', '1','1','4',null),

                ('5', '1','2','10',null),

                ('6', '1','3','13',null),

                ('7', '2','1','1',null),
                ('8', '2','1','2',null),
                ('9', '2','1','3',null),
                ('10', '2','1','4',null),

                ('11', '2','2','10',null),

                ('12', '2','3','13',null)
                ";
        
        DB::unprepared($query);
    }
}
