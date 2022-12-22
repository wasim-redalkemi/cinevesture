<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_qualifications', function (Blueprint $table) {
            $table->id();
            $table->string('user_id',20);
            $table->string('institue_name',500)->nullable();
            $table->string('degree_name',500)->nullable();
            $table->string('field_of_study',50)->nullable();
            $table->year('start_year')->nullable();
            $table->year('end_year')->nullable();
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
        Schema::dropIfExists('user_qualifications');
    }
}
