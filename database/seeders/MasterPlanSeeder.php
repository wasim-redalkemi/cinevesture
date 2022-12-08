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
                   ('2', 'stripe','1','Free','INR','0','non-recurring','m','0','1','active'),
                   ('3', 'stripe','1','Free','INR','0','non-recurring','y','0','1','active'),
                   ('4', 'stripe','1','Free','USD','0','non-recurring','y','0','1','active'),
                   ('5', 'stripe','1','Basic','USD','99','non-recurring','y','0','3','active'),
                   ('6', 'stripe','1','Basic','USD','9.99','non-recurring','m','7','4','active'),
                   ('7', 'stripe','1','Basic','INR','790','non-recurring','m','7','4','active'),
                   ('8', 'stripe','1','Basic','INR','7900','non-recurring','y','7','4','active'),
                   ('9', 'stripe','1','Pro','INR','1190','non-recurring','m','7','4','active'),
                   ('10', 'stripe','1','Pro','INR','11900','non-recurring','y','7','4','active'),
                   ('11', 'stripe','1','Pro','USD','14.99','non-recurring','m','7','4','active'),
                   ('12', 'stripe','1','Pro','USD','149','non-recurring','y','7','4','active'),
                   ('13', 'stripe','1','Enterprise','INR','3190','non-recurring','m','7','4','active'),
                   ('14', 'stripe','1','Enterprise','INR','31900','non-recurring','y','7','4','active'),
                   ('15', 'stripe','1','Enterprise','USD','39.99','non-recurring','m','7','4','active'),
                   ('16', 'stripe','1','Enterprise','USD','399','non-recurring','y','7','4','active')";

        DB::unprepared($query);
    }
}
