<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('user_id',20);
            $table->string('title',100);
            $table->string('company_name',255);
            $table->string('description',500);
            $table->enum('Promote',['1','0'])->default('0');
            $table->string('location_id',30);
            $table->enum('save_type',['draft','published','unpublished'])->nullable();
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
        Schema::dropIfExists('user_jobs');
    }
}
