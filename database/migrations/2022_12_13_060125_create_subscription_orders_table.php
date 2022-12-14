<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->nullable();
            $table->string('payment_intent')->nullable();
            $table->string('plan_id');
            $table->string('plan_time',3)->nullable();
            $table->string('plan_time_quntity')->nullable();
            $table->string('plan_name');
            $table->double('plan_amount');
            $table->string('currency',20);
            $table->enum('status',["pending","success","error"])->default("pending");
            $table->string('user_id',40);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscription_orders');
    }
}
