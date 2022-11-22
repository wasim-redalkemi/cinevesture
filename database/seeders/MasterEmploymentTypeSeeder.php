<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterEmploymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employements')->insert([
            [
                'name' => 'Full-time',
            ],
            [
                'name' => 'Contract',
            ],
            [
                'name' => 'Internship',
            ],
            [
                'name' => 'Part-time',
            ]
        ]);
    }
}
