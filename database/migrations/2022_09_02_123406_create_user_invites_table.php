<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInvitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_invites', function (Blueprint $table) {
            $table->id();
            $table->string('user_id',20);
            $table->string('user_organization_id',20);
            $table->string('email',80);
            $table->enum('accepted',['1','0'])->default('0');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**user_invites	id(BigInt)	user_id(varchar 20)	user_organization_id(varchar 20)	email(varchar 80)	accepted(enum(1,0),default 0)	created_at(timestamp)	updated_at(timestamp)										
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_invites');
    }
}
