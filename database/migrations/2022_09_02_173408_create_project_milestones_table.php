<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectMilestonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_milestones', function (Blueprint $table) {
            $table->id();
            $table->string('project_id',20);
            $table->string('description',500);
            $table->float('budget');
            $table->timestamp('traget_date');
            $table->enum('complete',['0','1'])->default('0')->nullable();

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
        Schema::dropIfExists('project_milestones');
    }
}
