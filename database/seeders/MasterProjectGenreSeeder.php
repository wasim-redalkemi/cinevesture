<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterProjectGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_project_genres')->insert([
            [
                'name' => 'Action & Adventure',
            ],
            [
                'name' => 'Animation',
            ],
            [
                'name' => 'Award Winners',
            ],
            [
                'name' => 'Biography',
            ],
            [
                'name' => 'Comedy',
            ],
            [
                'name' => 'Children',
            ],
            [
                'name' => 'Crime',
            ],
            [
                'name' => 'Dark Humour',
            ],
            [
                'name' => 'Dystopia',
            ],
            [
                'name' => 'Fantasy',
            ],
            [
                'name' => 'Film Noir',
            ],
            [
                'name' => 'Historical/ Period Film',
            ],
            [
                'name' => 'Horror',
            ],
            [
                'name' => 'Magical Realism',
            ],
            [
                'name' => 'Romance',
            ],
            [
                'name' => 'Magical Realism',
            ],
            [
                'name' => 'Sports',
            ],
            [
                'name' => 'Spy',
            ],
            [
                'name' => 'Suspense/ Mystery',
            ],
            [
                'name' => 'Thriller',
            ],
            [
                'name' => 'Western',
            ],
            [
                'name' => 'Other',
            ]
        ]);
    }
}
