<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_details', function (Blueprint $table) {
            $table->id('patient_detail_id');
            $table->integer('user_id');
            $table->string('mr_no')->nullable();
            $table->integer('referred_by')->nullable();
            $table->string('major_complaint')->nullable();
            $table->tinyinteger('pain_discomfort')->nullable()->default('0');
            $table->tinyinteger('tooth_filling')->nullable()->default('0');
            $table->tinyinteger('bleeding_gums')->nullable()->default('0');
            $table->tinyinteger('implant_replacement')->nullable()->default('0');
            $table->tinyinteger('aesthetic_concern')->nullable()->default('0');
            $table->tinyinteger('routine_checkup')->nullable()->default('0');
            $table->tinyinteger('previous_medication')->nullable()->default('0');
            $table->tinyinteger('smoking')->nullable()->default('0');
            $table->tinyinteger('blood_pressure')->nullable()->default('0');
            $table->tinyinteger('diabetes')->nullable()->default('0');
            $table->tinyinteger('asthma')->nullable()->default('0');
            $table->tinyinteger('hepatitis')->nullable()->default('0');
            $table->tinyinteger('HIV')->nullable()->default('0');
            $table->tinyinteger('Epilepsy')->nullable()->default('0');
            $table->tinyinteger('heart_trouble')->nullable()->default('0');
            $table->tinyinteger('auto_immune_disease')->nullable()->default('0');
            $table->tinyinteger('pregnancy')->nullable()->default('0');
            $table->string('other')->nullable();
            $table->string('medication_allergies')->nullable();
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
        Schema::dropIfExists('patient_details');
    }
}
