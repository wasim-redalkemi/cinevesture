<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInvitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_invities', function (Blueprint $table) {
            $table->id();
            $table->string('user_id',20);
            $table->string('user_organization_id',20)->nullable();
            $table->string('email',80)->nullable();
            $table->enum('accepted',['1','0'])->default('0');
            $table->enum('organization_creater',['1','0'])->default('0');

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
        Schema::dropIfExists('user_invities');
    }
}
