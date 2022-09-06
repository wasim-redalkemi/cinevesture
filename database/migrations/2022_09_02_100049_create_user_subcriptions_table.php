<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSubcriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_subcriptions', function (Blueprint $table) {
            $table->id();
            $table->string('user_id',20);
            $table->string('platform_subscription_id',50);
            $table->string('platform_cutomer_id',50);
            $table->string('plan_id',20);
            $table->float('plan_amount',8,2);
            $table->dateTime('subscription_start_date');
            $table->dateTime('subscription_end_date');
            $table->enum('status',['active','incative'])->nullable();

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
        Schema::dropIfExists('user_subcriptions');
    }
}
