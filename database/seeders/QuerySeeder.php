<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('query')->insert([
           [ 'first_name'=>'Rahul',
            'last_name'=>'kumar',
            'email'=>'rahul@gmail.com',
            'subject'=>'feedback',
            'message'=>'OK gook'
            
        ],[
            'first_name'=>'ajay',
            'last_name'=>'kumar',
            'email'=>'ajay@gmail.com',
            'subject'=>'feedback',
            'message'=>'OK gook'
            
        ],
        [
            'first_name'=>'vivak',
            'last_name'=>'kumar',
            'email'=>'vivak@gmail.com',
            'subject'=>'feedback',
            'message'=>'OK gook'
            
            
        ]
    ]);
    }
}
