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
            ['name' => 'Assamese',],
            ['name' => 'Bengali'],
            ['name' => 'Bodo'],
            ['name' => 'Dogri'],
            ['name' => 'Gujarati',],
            ['name' => 'Hindi'],
            ['name' => 'Kannada'],
            ['name' => 'Kashmiri'],
            ['name' => 'Konkani',],
            ['name' => 'Maithili'],
            ['name' => 'Malayalam'],
            ['name' => 'Manipuri'],
            ['name' => 'Marathi',],
            ['name' => 'Nepali'],
            ['name' => 'Odia'],
            ['name' => 'Punjabi'],
            ['name' => 'Sanskrit',],
            ['name' => 'Santhali'],
            ['name' => 'Tamil'],
            ['name' => 'Telugu'],
            ['name' => 'Urdu',],
            ['name' => 'Sindhi'],
            ['name' => 'Chinese'],
            ['name' => 'Spanish'],
            ['name' => 'English'],
            ['name' => 'Portuguese'],
            ['name' => 'Russian'],
            ['name' => 'Japanese'],
            ['name' => 'Yue Chinese'],
            ['name' => 'Vietnamese'],
            ['name' => 'Turkish'],
            ['name' => 'Wu Chinese'],
            ['name' => 'Korean'],
            ['name' => 'French'],
            ['name' => 'German'],
            ['name' => 'Javanese'],
            ['name' => 'Italian'],
            // ['name' => 'French'],
        ]);
    }
}
