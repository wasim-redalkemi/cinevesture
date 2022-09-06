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
            $table->enum('platform',['rp'])->default('rp');
            $table->string('platform_plan_id',100);
            $table->string('plan_name',100);
            $table->float('plan_amount',8,2);
            $table->enum('plan_type',['recurring','non-recurring']);
            $table->enum('plan_time',['m','y','m_with_free_trail','y_with_free_trail']);
            $table->integer('plan_time_quntity');
            $table->enum('status',['active','inactive']);
            $table->string('project_category',100);

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
