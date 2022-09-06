<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectStageOfFundingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_stage_of_fundings', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);

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
        Schema::dropIfExists('project_stage_of_fundings');
    }
}
