<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_lists')->insert([
            'list_name' => 'carousel',
            'list_status' => 'publish',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
