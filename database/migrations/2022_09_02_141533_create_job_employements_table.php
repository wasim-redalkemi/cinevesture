<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobEmployementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_employements', function (Blueprint $table) {
            $table->id();
            $table->string('job_id',20);
            $table->string('employment_id',20);
            
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
        Schema::dropIfExists('job_employements');
    }
}
