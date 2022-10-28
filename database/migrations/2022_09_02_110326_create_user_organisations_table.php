<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserOrganisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_organisations', function (Blueprint $table) {
            $table->id();
            $table->string('user_id',20)->nullable();
            $table->string('logo',500)->nullable();
            $table->string('name',255)->nullable();
            $table->string('type',20)->nullable();
            $table->string('location_in',50)->nullable();
            $table->string('about',500)->nullable();
            $table->enum('available_to_work_in',['virtually','physically'])->nullable();
            $table->string('imdb_profile',255)->nullable();
            $table->string('linkedin_profile',255)->nullable();
            $table->string('website',255)->nullable();
            $table->string('intro_video_link',255)->nullable();
            $table->integer('team_size')->nullable();

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
        Schema::dropIfExists('user_organisations');
    }
}
