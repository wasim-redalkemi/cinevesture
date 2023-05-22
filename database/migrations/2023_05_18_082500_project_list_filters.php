<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProjectListFilters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_list_filters', function (Blueprint $table) {
            $table->id();
            $table->string('list_id',20);
            $table->string('category_id',255)->nullable();
            $table->string('genre_id',255)->nullable();
            $table->string('language_id',255)->nullable();
            $table->string('location_id',255)->nullable();
            $table->enum('recommendation',["0","1"])->default("0");
            $table->enum('favorite',["0","1"])->default("0");
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
        Schema::dropIfExists('list_filters');
    }
}
