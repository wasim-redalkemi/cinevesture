<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterCountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_countries')->insert([
            [
                'name' => 'India',
                'country_code' => '+91',
            ],
            [
                'name' => 'Iceland',
                'country_code' => '+354',
            ],
            [
                'name' => 'Singapore',
                'country_code' => '+65',
            ]
        ]);
    }
}
