<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserOrganisationLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_organisation_locations', function (Blueprint $table) {
            $table->id();
            $table->string('user_id',20);
            $table->string('country_id',20);

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
        Schema::dropIfExists('user_organisation_locations');
    }
}
