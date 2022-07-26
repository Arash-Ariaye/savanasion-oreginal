<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('breeder');
            $table->string('period_date');

            $table->string('t_talafat_s1')->nullable();
            $table->string('v_talafat_s1')->nullable();

            $table->string('t_talafat_s2')->nullable();
            $table->string('v_talafat_s2')->nullable();

            $table->string('t_talafat_s3')->nullable();
            $table->string('v_talafat_s3')->nullable();

            $table->string('t_talafat_s4')->nullable();
            $table->string('v_talafat_s4')->nullable();

            $table->string('t_talafat_s5')->nullable();
            $table->string('v_talafat_s5')->nullable();

            $table->string('t_talafat_s6')->nullable();
            $table->string('v_talafat_s6')->nullable();

            $table->string('dan_masrafi_s1')->nullable();
            $table->string('ave_vazn_s1')->nullable();
            $table->string('app_nori_s1')->nullable();
            $table->string('dan_cat_s1')->nullable();


            $table->string('dan_masrafi_s2')->nullable();
            $table->string('ave_vazn_s2')->nullable();
            $table->string('app_nori_s2')->nullable();
            $table->string('dan_cat_s2')->nullable();


            $table->string('dan_masrafi_s3')->nullable();
            $table->string('ave_vazn_s3')->nullable();
            $table->string('app_nori_s3')->nullable();
            $table->string('dan_cat_s3')->nullable();


            $table->string('dan_masrafi_s4')->nullable();
            $table->string('ave_vazn_s4')->nullable();
            $table->string('app_nori_s4')->nullable();
            $table->string('dan_cat_s4')->nullable();


            $table->string('dan_masrafi_s5')->nullable();
            $table->string('ave_vazn_s5')->nullable();
            $table->string('app_nori_s5')->nullable();
            $table->string('dan_cat_s5')->nullable();


            $table->string('dan_masrafi_s6')->nullable();
            $table->string('ave_vazn_s6')->nullable();
            $table->string('app_nori_s6')->nullable();
            $table->string('dan_cat_s6')->nullable();


            $table->string('daro')->nullable();
            $table->string('vaksan')->nullable();
            $table->string('avr_v_koshtar')->nullable();
            $table->string('t_send_koshtargah')->nullable();
            $table->string('description')->nullable();
            $table->string('description2')->nullable();
            $table->string('type_Sickness')->nullable();
            $table->string('medicines')->nullable();
            $table->string('therapy')->nullable();
            $table->string('vitamin')->nullable();
            $table->string('age');
            $table->string('dan_stop_time');

            $table->string('expert');
            $table->string('tarikh');

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
        Schema::dropIfExists('daily_reports');
    }
}
