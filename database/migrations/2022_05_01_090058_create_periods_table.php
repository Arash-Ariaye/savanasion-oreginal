<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodsTable extends Migration
{

    public function up()
    {
        Schema::create('periods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tarikh_start');
            $table->string('tarikh_end')->nullable();
            $table->string('cat_start');
            $table->string('cat_end')->nullable();
            $table->string('breeder');
            $table->string('dr');
            $table->string('expert');
            $table->string('bed');
            $table->string('v_joje');
            $table->string('t_joje');
            $table->string('joje_keshi');
            $table->string('farm_madar');
            $table->string('soye');
            $table->string('sen_gale_madar');

            $table->string('t_joje_s1');
            $table->string('t_joje_s2')->nullable();
            $table->string('t_joje_s3')->nullable();
            $table->string('t_joje_s4')->nullable();
            $table->string('t_joje_s5')->nullable();
            $table->string('t_joje_s6')->nullable();

            $table->string('sex_joje_s1');
            $table->string('sex_joje_s2')->nullable();
            $table->string('sex_joje_s3')->nullable();
            $table->string('sex_joje_s4')->nullable();
            $table->string('sex_joje_s5')->nullable();
            $table->string('sex_joje_s6')->nullable();

            $table->string('sln');

            $table->string('azmayesh_ab')->nullable();
            $table->string('dan_baghimande')->nullable();
            $table->string('v_morgh_tah_salon')->nullable();
            $table->string('t_morgh_tah_salon')->nullable();
            $table->integer('status')->default('1');

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('periods');
    }
}
