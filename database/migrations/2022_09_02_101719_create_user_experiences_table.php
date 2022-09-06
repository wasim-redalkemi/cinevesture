<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('user_id',20);
            $table->string('job_title',100);
            $table->string('comapny',255);
            $table->string('country_id',20);
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('employement_type_id',20);
            $table->string('description',1000)->nullable();

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
        Schema::dropIfExists('user_experiences');
    }
}
