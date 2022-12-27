<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('User_projects')->insert(
            [
            "user_id"=>2,
            "project_step"=>1,
            "project_verified"=>1,
            "favorited"=>1,
            "project_verified"=>1,
            "status"=>'draft',
            "project_name"=>'drift',
            "project_type_id"=>2,
            "listing_project_as"=>2,
            "location"=>'delhi',
            "category_id"=>2,
            "duration"=>2,
            "total_budget"=>2,
            "financing_secured"=>2,
            "logline"=>2,
            "total_budget"=>2,
            "director_statement"=>2,
            "project_stage_id"=>2,
            "stage_of_funding_id"=>2,
            "crowdfund_link"=>2,
            "created_at"=>now(),
            

            ],
            [
            "user_id"=>3,
            "project_step"=>1,
            "project_verified"=>1,
            "favorited"=>1,
            "project_verified"=>1,
            "status"=>'draft',
            "project_name"=>'laptop',
            "project_type_id"=>2,
            "listing_project_as"=>2,
            "location"=>'delhi',
            "category_id"=>2,
            "duration"=>2,
            "total_budget"=>2,
            "financing_secured"=>2,
            "logline"=>2,
            "total_budget"=>2,
            "director_statement"=>2,
            "project_stage_id"=>2,
            "stage_of_funding_id"=>2,
            "crowdfund_link"=>2,
            "created_at"=>now(),
            

            ],
            [
            "user_id"=>2,
            "project_step"=>1,
            "project_verified"=>1,
            "favorited"=>1,
            "project_verified"=>1,
            "status"=>'draft',
            "project_name"=>'boat',
            "project_type_id"=>2,
            "listing_project_as"=>2,
            "location"=>'delhi',
            "category_id"=>2,
            "duration"=>2,
            "total_budget"=>2,
            "financing_secured"=>2,
            "logline"=>2,
            "total_budget"=>2,
            "director_statement"=>2,
            "project_stage_id"=>2,
            "stage_of_funding_id"=>2,
            "crowdfund_link"=>2,
            "created_at"=>now(),
            

            ],
            [
            "user_id"=>3,
            "project_step"=>1,
            "project_verified"=>1,
            "favorited"=>1,
            "project_verified"=>1,
            "status"=>'draft',
            "project_name"=>'ola',
            "project_type_id"=>2,
            "listing_project_as"=>2,
            "location"=>'delhi',
            "category_id"=>2,
            "duration"=>2,
            "total_budget"=>2,
            "financing_secured"=>2,
            "logline"=>2,
            "total_budget"=>2,
            "director_statement"=>2,
            "project_stage_id"=>2,
            "stage_of_funding_id"=>2,
            "crowdfund_link"=>2,
            "created_at"=>now(),
            

            ],
        );
    }
}
