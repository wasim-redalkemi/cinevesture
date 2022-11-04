<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterProjectCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_project_categories')->insert([
            [
                'name' => 'Features',
            ],
            [
                'name' => 'Series',
            ],
            [
                'name' => 'Documentaries',
            ],
            [
                'name' => 'Shorts',
            ],
            [
                'name' => 'Remake Rights',
            ],
            [
                'name' => 'Book Adaptation Rights',
            ],
            [
                'name' => 'Gaming',
            ]
        ]);
    }
}
