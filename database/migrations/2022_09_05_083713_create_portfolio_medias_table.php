<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfolioMediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolio_medias', function (Blueprint $table) {
            $table->id();
            $table->string('portfolio_id',20);
            $table->enum('file_type',['image','video']);
            $table->string('file_link',500);

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
        Schema::dropIfExists('portfolio_medias');
    }
}
