<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectMediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_medias', function (Blueprint $table) {
            $table->id();
            $table->string('project_id', 20);
            $table->enum('file_type', ['image', 'video', 'pdf']);
            $table->string('file_link', 500);
            $table->string('media_info',5000)->nullable();
            $table->enum('is_default_marked', ['0', '1'])->default('0');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_medias');
    }
}
