<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterPlanActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $query = "insert into `master_plan_operations` (`id`, `name`) values('1', 'Create Profile'),
        ('2', 'Search for industry professionals'),
        ('3', 'View profiles'),
        ('4', 'Save profiles'),
        ('5', 'Contact People'),
        ('6', 'Ability to endorse others'),
        ('7', 'Unlimited active projects'),
        ('8', 'Apply for unlimited jobs'),
        ('9', 'Unlimited job posts'),
        ('10', 'View all listed projects'),
        ('11', '1 active project'),
        ('12', '5 active projects'),
        ('13', 'View jobs listed'),
        ('14', '3 active job posts')";
        

        DB::unprepared($query);
    }
}
