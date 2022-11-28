<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterPlanModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $query = "insert into `master_plan_modules` (`id`, `name`) values('1', 'Industry Guide'),
        ('2', 'Projects'),
        ('3', 'Jobs')";

        DB::unprepared($query);
    }
}
