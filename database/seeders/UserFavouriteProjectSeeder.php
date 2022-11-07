<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserFavouriteProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_favourite_projects')->insert([
            [
                'user_id' => 1,
                'project_id' => 1,
            ],
            [
                'user_id' => 2,
                'project_id' => 2,
            ],
            [
                'user_id' => 3,
                'project_id' => 3,
            ],
        ]);
    }
}
