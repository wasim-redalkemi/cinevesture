<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class IncreaseAboutLimitToUserOrganisationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_organisation', function (Blueprint $table) {
            //
        });
        DB::statement("ALTER TABLE user_organisations MODIFY COLUMN about text(10000)");
        DB::statement("ALTER TABLE users MODIFY COLUMN about text(10000)");
        DB::statement("ALTER TABLE user_jobs MODIFY COLUMN description text(10000)");
        DB::statement("ALTER TABLE user_qualifications MODIFY COLUMN description text(10000)");
        DB::statement("ALTER TABLE user_experiences MODIFY COLUMN description text(10000)");
        DB::statement("ALTER TABLE user_portfolios MODIFY COLUMN description text(10000)");
        DB::statement("ALTER TABLE user_projects MODIFY COLUMN synopsis text(10000)");
        DB::statement("ALTER TABLE user_projects MODIFY COLUMN director_statement text(10000)");
        DB::statement("ALTER TABLE user_projects MODIFY COLUMN logline varchar(5000)");


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_organisation', function (Blueprint $table) {
            //
        });
    }
}
