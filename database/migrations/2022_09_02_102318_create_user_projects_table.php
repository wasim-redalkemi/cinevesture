<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_projects', function (Blueprint $table) {
            $table->id();
            $table->string('user_id',20);
            $table->enum('project_step',['0','1','2','3','4','5'])->default('0');
            $table->enum('project_verified',['0','1'])->default('0');
            $table->enum('save_type',['draft','published'])->nullable();
            $table->string('project_name',255);
            $table->string('project_type_id',20);
            $table->enum('listing_project_as',['individual','organization']);
            $table->string('country_id',20);
            $table->string('language_type',20);
            $table->string('location',255)->nullable();
            $table->string('category_id',20)->nullable();
            $table->float('duration')->nullable();
            $table->float('total_budget');
            $table->float('financing_secured');
            $table->string('logline',500);
            $table->string('synopsis',1000);
            $table->string('director_statement',1000);
            $table->string('project_stage_id',20);
            $table->string('stage_of_funding_id',20)->nullable();
            $table->string('crowdfund_link',255)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }
  		
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_projects');
    }
}
