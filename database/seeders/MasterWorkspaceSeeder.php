<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterWorkspaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('workspaces')->insert([
            [
                'name' => "On-site"
            ],
            [
                'name' => "Remote"
            ],
            [
                'name' =>"Hybrid"
            ],
        ]);
    }
}
