<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_states')->insert([
            [
                'name' => 'Dehli(NCR)',
            ],
            [
                'name' => 'Uttar Pradesh',
            ],
            [
                'name' => 'Chennai',
            ]
        ]);
    }
}
