<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectLookingForsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_looking_fors', function (Blueprint $table) {
            $table->id();
            $table->string('project_id',20);
            $table->string('look_for_id',20);

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
        Schema::dropIfExists('project_looking_fors');
    }
}
