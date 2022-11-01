<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $query = "INSERT INTO `master_states` (`id`, `name`) VALUES
        ('1', 'Andhra Pradesh'),
        ('2', 'Arunachal Pradesh'),
        ('3', 'Assam'),
        ('4', 'Bihar'),
        ('5', 'Chhattisgarh '),
        ('6', 'Goa'),
        ('7', 'Gujarat'),
        ('8', 'Haryana'),
        ('9', 'Himachal Pradesh'),
        ('10', 'Jharkhand'),
        ('11', 'Karnataka '),
        ('12', 'Kerala'),
        ('13', 'Madhya Pradesh'),
        ('14', 'Maharashtra '),
        ('15', 'Manipur'),
        ('16', 'Meghalaya '),
        ('17', 'Mizoram'),
        ('18', 'Nagaland'),
        ('19', 'Odisha'),
        ('20', 'Punjab'),
        ('21', 'Rajasthan'),
        ('22', 'Sikkim'),
        ('23', 'Tamil Nadu'),
        ('24', 'Telangana'),
        ('25', 'Tripura'),
        ('26', 'Uttar Pradesh'),
        ('27', 'Uttarakhand'),
        ('28', 'West Bengal'),
        ('29', 'Andaman & Nicobar Islands'),
        ('30', 'Chandigarh'),
        ('31', 'Dadra & Nagar Haveli'),
        ('32', 'Daman & Diu'),
        ('33', 'Delhi'),
        ('34', 'Lakshadweep'),
        ('35', 'Jammu & Kashmir'),
        ('36', 'Ladakh'),
        ('37', 'Puducherry')";
        
        DB::unprepared($query);
    }
}
