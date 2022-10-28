<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterOrganisationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_organisation_types')->insert([
            [
                'name' => 'Private Company',
            ],
            [
                'name' => 'Public Company',
            ],
            [
                'name' => 'LLP',
            ],
            [
                'name' => 'Joint Venture',
            ],
            [
                'name' => 'Commission',
            ],
            [
                'name' => 'Proprietorship',
            ],
            [
                'name' => 'Others',
            ]
        ]);
    }
}
