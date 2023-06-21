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
             `status`,
             `description`)
             values
            --  ('1', 'stripe','1','Free','USD','0.00','non-recurring','m','0','30','active','Great for those who want to get themselves in front of the right people in the industry'),
                --    ('2', 'stripe','1','Free','INR','0.00','non-recurring','m','0','30','active','Great for those who want to get themselves in front of the right people in the industry'),
                   ('3', 'stripe','1','Free','INR','0.00','non-recurring','y','0','3650','active','Great for those who want to get themselves in front of the right people in the industry'),
                   ('4', 'stripe','1','Free','USD','0.00','non-recurring','y','0','3650','active','Great for those who want to get themselves in front of the right people in the industry'),
                   ('5', 'stripe','1','Basic','USD','110','non-recurring','y','0','365','active','Great for those working on a project close to their heart while the hustle goes on'),
                --    ('6', 'stripe','1','Basic','USD','9.99','non-recurring','m','0','30','active','Great for those working on a project close to their heart while the hustle goes on'),
                --    ('7', 'stripe','1','Basic','INR','790','non-recurring','m','0','30','active','Great for those working on a project close to their heart while the hustle goes on'),
                   ('8', 'stripe','1','Basic','INR','9000','non-recurring','y','0','365','active','Great for those working on a project close to their heart while the hustle goes on'),
                --    ('9', 'stripe','1','Pro','INR','1190','non-recurring','m','0','30','active','Great for those who have a lot going on and need the right tools to get it all moving forward'),
                   ('10', 'stripe','1','Pro','INR','14000','non-recurring','y','0','365','active','Great for those who have a lot going on and need the right tools to get it all moving forward'),
                --    ('11', 'stripe','1','Pro','USD','14.99','non-recurring','m','0','30','active','Great for those who have a lot going on and need the right tools to get it all moving forward'),
                   ('12', 'stripe','1','Pro','USD','171','non-recurring','y','0','365','active','Great for those who have a lot going on and need the right tools to get it all moving forward'),
                --    ('13', 'stripe','1','Enterprise','INR','3190','non-recurring','m','7','30','active','Great for organisations to be able to help their team find the right resources and build a network'),
                   ('14', 'stripe','1','Enterprise','INR','38000','non-recurring','y','0','365','active','Great for organisations to be able to help their team find the right resources and build a network'),
                --    ('15', 'stripe','1','Enterprise','USD','39.99','non-recurring','m','0','30','active','Great for organisations to be able to help their team find the right resources and build a network'),
                   ('16', 'stripe','1','Enterprise','USD','464','non-recurring','y','0','365','active','Great for organisations to be able to help their team find the right resources and build a network')";

        DB::unprepared($query);
    }
}
