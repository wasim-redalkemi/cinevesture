<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $query = "insert into `plans` (`id`, `platform`,`platform_plan_id`,`plan_name`,`currency`,`plan_amount`,`plan_type`,`plan_time`,`free_trail_days`,`plan_time_quntity`,`status`) 
        // values('1', 'stripe','1','Free','USD','0','non-recurring','m','7','1','active'),
        // ('2', 'stripe','1','Free','INR','0','non-recurring','m',7,'1','active'),
        // ";
        $query = "INSERT INTO `plans`
            (`id`,
             `platform`,
             `platform_plan_id`,
             `plan_name`,
             `currency`,
             `plan_amount`,
             `plan_type`,
             `plan_time`,
             `free_trail_days`,
             `plan_time_quntity`,
             `status`)
             values('1', 'stripe','1','Free','USD','0','non-recurring','m','0','1','active'),
                   ('2', 'stripe','1','Free','INR','0','non-recurring','m','0','1','active')";
        DB::unprepared($query);
    }
}
