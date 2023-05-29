<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddEnumValueToProjectListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_lists', function (Blueprint $table) {
            // $table->enum('type',['null','curated','automated'])->default('curated')->after('status');
            DB::statement("ALTER TABLE project_lists MODIFY COLUMN `type` ENUM('null','curated','automated') default 'curated' after `status`");

        });
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_lists', function (Blueprint $table) {
            //
        });
    }
}
