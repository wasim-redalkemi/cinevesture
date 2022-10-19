<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserOrganisationServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_organisation_services', function (Blueprint $table) {
            $table->id();
            $table->string('organisation_id',20);
            $table->string('services_id',20);

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
        Schema::dropIfExists('user_organisation_services');
    }
}
