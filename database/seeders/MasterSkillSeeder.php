<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_skills')->insert([
            [
                'name' => 'Acting',
            ],
            [
                'name' => 'Dancing',
            ],
            [
                'name' => 'Singing',
            ]
        ]);
    }
}
