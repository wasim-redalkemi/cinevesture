<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganisationServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organisation_services')->insert([
            [
                'name' => 'Acting Institute ',
            ],
            [
                'name' => 'Advertising Services',
            ],
            [
                'name' => 'Animal Provides for Shooting',
            ],
            [
                'name' => 'Animation Film Production Services',
            ],
            [
                'name' => 'Audio Visual Production Services',
            ],
            [
                'name' => 'Camera Hire',
            ],
            [
                'name' => 'Casting Services',
            ],
            [
                'name' => 'Catering Services',
            ],
            [
                'name' => 'Cinematography Services',
            ],
            [
                'name' => 'Costume Rental / Supplier',
            ],
            [
                'name' => 'COVID Health & Safety',
            ],
            [
                'name' => 'Crowd Provider / Manager',
            ],
            [
                'name' => 'Dance Troop Company',
            ],
            [
                'name' => 'Distribution & Sales',
            ],
            [
                'name' => 'Dubbing Studios',
            ],
            [
                'name' => 'Editing Services',
            ],
            [
                'name' => 'Financial Advisors',
            ],
            [
                'name' => 'Lights & Grip Hire',
            ],
            [
                'name' => 'Legal',
            ],
            [
                'name' => 'Marketing & PR',
            ],
            [
                'name' => 'Medical Services',
            ],
            [
                'name' => 'Music Video Production Services',
            ],
            [
                'name' => 'Musical Recordings',
            ],
            [
                'name' => 'Visual Effects Services',
            ],
            [
                'name' => 'Photography Services / Still Photography',
            ],
            [
                'name' => 'Post Production Services',
            ],
            [
                'name' => 'Production Equipment Hire',
            ],
            [
                'name' => 'Security Services',
            ],
            [
                'name' => 'Sound Recordings',
            ],
            [
                'name' => 'Talent Agency',
            ],
            [
                'name' => 'Theatre Owner',
            ],
            [
                'name' => 'Transport Hire',
            ],
            [
                'name' => 'Vehicle Providers',
            ],
            [
                'name' => 'Other',
            ]
        ]);
    }
}
