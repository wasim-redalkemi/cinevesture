<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterGenderPronounsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_gender_pronouns')->insert([
            ['gender_pronouns' => 'He/Him/His'],
            ['gender_pronouns' => 'She/Her/Hers'],
            ['gender_pronouns' => 'They/Them/Theirs'],
            ['gender_pronouns' => 'Ze/Hir/Hirs'],
            ['gender_pronouns' => 'Prefer Not To Say'],
        ]);
    }
}
