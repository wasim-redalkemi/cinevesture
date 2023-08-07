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
                'name' => 'Action',
            ],
            [
                'name' => 'Adult',
            ],
            [
                'name' => 'Adventure',
            ],
            [
                'name' => 'Animation',
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
                'name' => 'Dark Humor',
            ],
            [
                'name' => 'Drama',
            ],
            [
                'name' => 'Dystopia',
            ],
            [
                'name' => 'Family',
            ],
            [
                'name' => 'Fantasy',
            ],
            [
                'name' => 'Film Noir',
            ],
            [
                'name' => 'Historical/Period',
            ],
            [
                'name' => 'Horror',
            ],
            [
                'name' => 'Magic Realism/Mystery',
            ],
            [
                'name' => 'Music',
            ],
            [
                'name' => 'Musical',
            ],
            [
                'name' => 'News',
            ],
            [
                'name' => 'Reality TV',
            ],
            [
                'name' => 'Romance',
            ],
            [
                'name' => 'Science Fiction',
            ],
            [
                'name' => 'Sports',
            ],
            [
                'name' => 'Spy',
            ],
            [
                'name' => 'Suspense',
            ],
            [
                'name' => 'Talk Show',
            ],
            [
                'name' => 'Thriller',
            ],
            [
                'name' => 'War',
            ],
            [
                'name' => 'Western',
            ],
            [
                'name' => 'Other',
            ],
        ]);
    }
}
