<?php

namespace Database\Seeders;

use App\Models\OrganisationService;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $this->call([UserSeeder::class,OrganisationServiceSeeder::class,AgeRangeSeeder::class,MasterSkillSeeder::class,MasterLanguageSeeder::class,MasterCountrySeeder::class,MasterStateSeeder::class,MasterLookingForSeeder::class]);
    }
}
