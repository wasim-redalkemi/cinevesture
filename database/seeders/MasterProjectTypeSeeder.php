<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_types')->insert([
            [
                'name' => "Content"
            ],
            [
                'name' => "Infrastructure"
            ],
            [
                'name' =>"Start Up"
            ],
        ]);
    }
}
