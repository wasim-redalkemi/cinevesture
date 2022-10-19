<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterOrganisationServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_organisation_services')->insert([
            [
                'name' => 'Service1',
            ],
            [
                'name' => 'Service2',
            ],
            [
                'name' => 'Service3',
            ]            
        ]);
    }
}
