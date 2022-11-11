<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectStageOfFundingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $query = "INSERT INTO project_stage_of_fundings (id, name) VALUES
        ('1', 'Pre-seed'),
        ('2', 'Seed'),
        ('3', 'Series A'),
        ('4', 'Series B'),
        ('5', 'Series C')";

        DB::unprepared($query);
    }
   
}
