<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientServiceChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_service_charges', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_visit_id');
            $table->integer('service_category_id');
            $table->double('service_amount');
            $table->tinyinteger('quantity'); // discount needs to be added. potentially more normalization required
            $table->integer('created_by');
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
        Schema::dropIfExists('patient_service_charges');
    }
}
