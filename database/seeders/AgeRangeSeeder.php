<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgeRangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('age_range')->insert([
            ['range' => '18 - 24'],
            ['range' => '25 - 29'],
            ['range' => '30 - 34'],
            ['range' => '35 - 39'],
            ['range' => '40 - 44'],
            ['range' => '45 - 49'],
            ['range' => '50 - 54'],
            ['range' => '55 - 59'],
            ['range' => '60+'],
        ]);
    }
}
