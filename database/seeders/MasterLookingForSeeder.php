<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterLookingForSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $query = "INSERT INTO master_looking_fors (id, name) VALUES
        ('1', 'Distribution'),
        ('2', 'Film Festival Programmers'),
        ('3', 'Funds'),
        ('4', 'Mentor/Consultant'),
        ('5', 'Talent/Crew/Organisation'),
        ('6', 'World Sales'),
        ('7', 'Investors'),
        ('8', 'Partners'),
        ('9', 'People to Hire'),
        ('10', 'Companies to Hire'),
        ('11', 'Marketing & Sales'),
        ('12', 'Event Management/Event Organisation'),
        ('13', 'Sponsorship'),
        ('14', 'Collaborations'),
        ('15', 'Other')";

        DB::unprepared($query);
    }
}
