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
        $query = "insert into `master_plan_operations` (`id`, `name`,`url_key`) values('1', 'Create profile','profile-create'),
        ('2', 'Search profile','profile-show'),
        ('3', 'View profiles','profile-public-show'),
        ('4', 'Save profiles','profile-save'),
        ('5', 'Contact people','contact-user-mail-store'),
        ('6', 'Ability to endorse others','endorse-user-mail-store'),
        ('7', 'Additional # memberships','create-team'),
        ('8', 'Create organisation','organisation-create'),
        ('9', 'Create unlimited projects','project-overview'),
        ('10', 'Create # project','project-overview'),
        ('11', 'View all listed projects','project-public-view'),
        ('12', 'Apply for unlimited jobs','apply-job'),
        ('13', 'Unlimited job posts','job-create'),
        ('14', 'View lsted jobs','posted-job'),
        ('15', 'Create # Active jobs posts','job-create')"; 

        DB::unprepared($query);
    }
}
