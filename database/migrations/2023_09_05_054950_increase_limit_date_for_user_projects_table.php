<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class IncreaseLimitDateForUserProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_projects', function (Blueprint $table) {
            // $table->string('logline', 2000);
            // $table->string('synopsis', 4000);
            // $table->string('director_statement', 5000);
        });
        DB::statement("ALTER TABLE user_projects MODIFY COLUMN logline VARCHAR(2000)");
        DB::statement("ALTER TABLE user_projects MODIFY COLUMN synopsis VARCHAR(4000)");
        DB::statement("ALTER TABLE user_projects MODIFY COLUMN director_statement VARCHAR(5000)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_projects', function (Blueprint $table) {
            
        });
    }
}
