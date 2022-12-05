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
        $query=  "INSERT INTO `master_plan_modules_operation_relations`
        (`id`,
         `plan_id`,
         `module_id`,
         `action_id`,
         `limit`)
         VALUES ('1', '1','1','1',null),
                ('2', '1','1','2',null),
                ('3', '1','1','3',null),
                ('4', '1','1','4',null),
                ('5', '1','2','11',null),
                ('6', '1','3','14',null),

                ('7', '2','1','1',null),
                ('8', '2','1','2',null),
                ('9', '2','1','3',null),
                ('10', '2','1','4',null),
                ('11', '2','1','5',null),

                ('12', '2','2','10','1'),

                ('13', '2','3','12',null),

                ('14', '3','1','1',null),
                ('15', '3','1','2',null),
                ('16', '3','1','3',null),
                ('17', '3','1','4',null),
                ('18', '3','1','5',null),
                ('19', '3','1','6',null),

                ('20', '3','2','10','5'),

                ('21', '3','3','12',null),
                ('22', '3','3','15','3'),

                ('23', '4','1','1','null'),
                ('24', '4','1','2','null'),
                ('25', '4','1','3','null'),
                ('26', '4','1','4','null'),
                ('27', '4','1','5','null'),
                ('28', '4','1','6','null'),
                ('29', '4','1','7','2'),
                ('30', '4','1','8','null'),

                ('31', '4','2','9','null'),
                ('32', '4','3','12','null'),
                ('33', '4','3','13','null')";
        
        DB::unprepared($query);
    }
}
