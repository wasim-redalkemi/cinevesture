<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DefaultZeroAddInColumnTotalFinancingBudgutToUserProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('user_projects', function (Blueprint $table) {
       
    });
    DB::statement("ALTER TABLE user_projects MODIFY COLUMN total_budget float DEFAULT '0' null ");
    DB::statement("ALTER TABLE user_projects MODIFY COLUMN financing_secured float DEFAULT '0' null");
}

public function down()
{
    Schema::table('user_projects', function (Blueprint $table) {
       
    });
}

}
