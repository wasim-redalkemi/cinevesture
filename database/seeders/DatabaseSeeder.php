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
        $this->call([UserSeeder::class,MasterSkillSeeder::class,MasterLanguageSeeder::class,MasterCountrySeeder::class,MasterStateSeeder::class,MasterProjectTypeSeeder::class,MasterLookingForSeeder::class,MasterOrganisationTypeSeeder::class,MasterOrganisationServiceSeeder::class,MasterProjectCategorySeeder::class,MasterProjectGenreSeeder::class,AgeRangeSeeder::class,ProjectStageSeeder::class,ProjectStageOfFundingSeeder::class,MasterEmploymentTypeSeeder::class,MasterWorkspaceSeeder::class,ProjectListSeeder::class,QuerySeeder::class,MasterPlanSeeder::class,MasterPlanModuleSeeder::class,MasterPlanModuleOperationSeeder::class,MasterPlanActionSeeder::class,MasterGenderSeeder::class,MasterGenderPronounsSeeder::class]);
    }
}
