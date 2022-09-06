<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobWorkSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_work_spaces', function (Blueprint $table) {
            $table->id();
            $table->string('job_id',20);
            $table->string('workspace_id',20);

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
        Schema::dropIfExists('job_work_spaces');
    }
}
