<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterGenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_genders')->insert([
            ['gender' => 'Male'],
            ['gender' => 'Female'],
            ['gender' => 'Non-Binary'],
            ['gender' => 'Transgender'],
            ['gender' => 'Gender Non-confirming'],
            ['gender' => 'Prefer Not To Say'],
        ]);
    }
}
