<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterPlanActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $query = "insert into `master_plan_operations` (`id`, `name`,`url_key`) values('1', 'Create Profile','profile-create'),
        ('2', 'Search Profile','profile-show'),
        ('3', 'View profiles','profile-public-show'),
        ('4', 'Save profiles','profile-save'),
        ('5', 'Contact People','contact-user-mail-store'),
        ('6', 'Ability to endorse others','endorse-user-mail-store'),
        ('7', 'Additional memberships','create-team'),
        ('8', 'Create Organisation','organisation-create'),
        ('9', 'Create Unlimited Projects','project-overview'),
        ('10', 'Create Project','project-overview'),
        ('11', 'View All Listed Projects','project-public-view'),
        ('12', 'Apply For Unlimited Jobs','apply-job'),
        ('13', 'Unlimited Job Posts','job-create'),
        ('14', 'View Listed Jobs','posted-job'),
        ('15', 'Job Posts','job-create')"; 

        DB::unprepared($query);
    }
}
