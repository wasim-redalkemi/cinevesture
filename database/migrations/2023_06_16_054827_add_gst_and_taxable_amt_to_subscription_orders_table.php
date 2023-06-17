<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGstAndTaxableAmtToSubscriptionOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscription_orders', function (Blueprint $table) {
            $table->string('taxable')->nullable()->after('plan_amount');
            $table->string('gst')->nullable()->after("taxable");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscription_orders', function (Blueprint $table) {
            //
        });
    }
}
