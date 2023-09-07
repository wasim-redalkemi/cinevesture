<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DescriptionIncreaseLimitDateForUserJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_jobs', function (Blueprint $table) {
            //
        });
        DB::statement("ALTER TABLE user_jobs MODIFY COLUMN description VARCHAR(6000)");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_jobs', function (Blueprint $table) {
            //
        });
    }
}
