<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmsTable extends Migration
{

    public function up()
    {
        Schema::create('farms', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('breeder');
            $table->string('breeder_phone')->nullable();
            $table->string('gas')->nullable();
            $table->string('air_sys')->nullable();
            $table->string('light_sys')->nullable();
            $table->string('drink_sys')->nullable();
            $table->string('water')->nullable();
            $table->string('water_tank')->nullable();
            $table->string('septic_tank')->nullable();
            $table->string('filtration')->nullable();
            $table->string('carcass')->nullable();
            $table->string('losses_pit')->nullable();
            $table->string('seeds')->nullable();
            $table->string('seeds_transfer')->nullable();
            $table->string('form_area')->nullable();
            $table->string('cooling_sys')->nullable();
            $table->string('generator')->nullable();
            $table->string('power_alert')->nullable();
            $table->string('air_alert')->nullable();
            $table->string('cctv')->nullable();
            $table->string('weighbridge')->nullable();
            $table->string('input_quarantine')->nullable();
            $table->string('fences')->nullable();
            $table->string('metrazh')->nullable();
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
        Schema::dropIfExists('farms');
    }
}
