<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterPlanModulesOperationRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_plan_modules_operation_relations', function (Blueprint $table) {
            $table->id();
            $table->string('plan_id',30);
            $table->string('module_id',30);
            $table->string('action_id',30);
            $table->integer('limit');
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
        Schema::dropIfExists('master_plan_modules_operation_relations');
    }
}
