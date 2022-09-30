<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_languages')->insert([
            [
                'name' => 'Hindi',
            ],
            [
                'name' => 'English',
            ]
        ]);
    }
}
