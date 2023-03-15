<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdateStatusEnumIncativeToInactiveVotesToUserSubciptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_subcriptions', function (Blueprint $table) {
            //
        });
        DB::statement("ALTER TABLE user_subcriptions MODIFY COLUMN status ENUM('active','inactive')");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_subcriptions', function (Blueprint $table) {
            //
        });
    }
}
