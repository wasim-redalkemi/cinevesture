<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectStageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $query = "INSERT INTO project_stages (id, name) VALUES
        ('1', 'Development'),
        ('2', 'Pre-Production'),
        ('3', 'Production'),
        ('4', 'Post-Production'),
        ('5', 'Final Cut'),
        ('6', 'Planning/ Blueprint'),
        ('7', 'Work-in-Progress'),
        ('8', 'Growth & Expansion'),
        ('9', 'Ideation'),
        ('10', 'Validation'),
        ('11', 'Early Traction'),
        ('12', 'Scaling')";

        DB::unprepared($query);
    }
}
