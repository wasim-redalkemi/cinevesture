<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DescriptionIncreaseLimitDateForUserQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_qualifications', function (Blueprint $table) {
            //
        });
        DB::statement("ALTER TABLE user_qualifications MODIFY COLUMN description VARCHAR(4000)");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_qualifications', function (Blueprint $table) {
            //
        });
    }
}
