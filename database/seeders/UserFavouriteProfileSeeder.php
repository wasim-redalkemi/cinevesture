<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserFavouriteProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_favourite_profiles')->insert([
            [
                'user_id' => 1,
                'profile_id' => 1,
            ],
            [
                'user_id' => 2,
                'profile_id' => 2,
            ],
            [
                'user_id' => 3,
                'profile_id' => 3,
            ],
        ]);
    }
}
