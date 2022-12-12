<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectListProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_lists_projects')->insert([
            [ 'project_id'=>'2',
             'list_id'=>'3',
             'created_at'=>now(),
            
             
        ],
            [ 'project_id'=>'3',
             'list_id'=>'3',
             'created_at'=>now(),
             
             
        ],
            [ 'project_id'=>'2',
             'list_id'=>'2',
             'created_at'=>now(),
             
             
        ],
            [ 'project_id'=>'4',
             'list_id'=>'1',
             'created_at'=>now(),
             
             
        ],
    ]);
        }
    
}
