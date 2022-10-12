<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'superuser@mailinator.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'user_type' => 'U',
            'first_name' => 'admin',
            'is_profile_complete' => '0',

            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
