<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AboutIncreaseLimitDateForUserOrganisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_organisations', function (Blueprint $table) {
            //
        });
        DB::statement("ALTER TABLE user_organisations MODIFY COLUMN about VARCHAR(2000)");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_organisations', function (Blueprint $table) {
            //
        });
    }
}
