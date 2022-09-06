<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_genres', function (Blueprint $table) {
            $table->id();
            $table->string('project_id',20);
            $table->string('gener_id',20);
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_genres');
    }
}
