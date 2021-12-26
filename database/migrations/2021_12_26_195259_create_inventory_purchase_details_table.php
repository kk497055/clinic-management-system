<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryPurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_purchase_details', function (Blueprint $table) {
            $table->id();
            $table->integer('inventory_id');
            $table->integer('quantity');
            $table->integer('purchase_id');
            $table->double('unit_price');
            $table->double('discount');
            $table->double('gross_line_total');
            $table->double('net_line_total');
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
        Schema::dropIfExists('inventory_purchase_details');
    }
}
