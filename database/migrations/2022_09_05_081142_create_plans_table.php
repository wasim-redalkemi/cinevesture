<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->enum('platform',['rp','stripe'])->default('stripe');
            $table->string('platform_plan_id',500);
            $table->string('plan_name',500);
            $table->enum('currency',['USD','INR','EUR']);
            $table->float('plan_amount',8,2);
            $table->enum('plan_type',['recurring','non-recurring']);
            $table->enum('plan_time',['m','y','m_with_free_trail','y_with_free_trail']);
            $table->integer('free_trail_days')->nullable();
            $table->integer('plan_time_quntity');
            $table->enum('status',['active','inactive']);
            $table->string('description',500);

            // $table->string('project_category',100);
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
        Schema::dropIfExists('plans');
    }
}
