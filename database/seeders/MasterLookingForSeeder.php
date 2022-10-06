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
        DB::table('master_looking_fors')->insert([
            [
                'name' => 'Distribution',
            ],
            [
                'name' => 'Film Festival Participation',
            ],
            [
                'name' => 'Funds',
            ]
        ]);
    }
}
