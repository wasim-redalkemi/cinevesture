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
        $query = "insert into `master_organisation_services` (`id`, `name`) values('1', 'Acting Institute'),
        ('2', 'Advertising Services'),
        ('3', 'Animal Provides for Shooting'),
        ('4', 'Animation Film Production Services'),
        ('5', 'Audio Visual Production Services'),
        ('6', 'Camera Hire'),
        ('7', 'Casting Services'),
        ('8', 'Catering Services'),
        ('9', 'Cinematography Services'),
        ('10', 'Costume Rental / Supplier'),
        ('11', 'COVID Health & Safety'),
        ('12', 'Crowd Provider / Manager'),
        ('13', 'Dance Troop Company'),
        ('14', 'Distribution & Sales'),
        ('15', 'Dubbing Studios'),
        ('16', 'Editing Services'),
        ('17', 'Financial Advisors'),
        ('18', 'Lights & Grip Hire'),
        ('19', 'Legal'),
        ('20', 'Marketing & PR'),
        ('21', 'Medical Services'),
        ('22', 'Music Video Production Services'),
        ('23', 'Musical Recordings'),
        ('24', 'Visual Effects Services'),
        ('25', 'Photography Services / Still Photography'),
        ('26', 'Post Production Services'),
        ('27', 'Production Equipment Hire'),
        ('28', 'Security Services'),
        ('29', 'Sound Recordings'),
        ('30', 'Talent Agency'),
        ('31', 'Theatre Owner'),
        ('32', 'Transport Hire'),
        ('33', 'Vehicle Providers'),
        ('34', 'Other')";

        DB::unprepared($query);
    }
}
