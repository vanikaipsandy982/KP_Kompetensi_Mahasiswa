<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_surveys', function (Blueprint $table) {
            $table->id();
            $table->integer('fk_id_user');
            $table->integer('fk_id_survey');
            $table->integer('fk_id_squestion');
            $table->integer('skor_kepuasan');
            $table->integer('skor_kemampuan');
            $table->integer('selisih');
            $table->integer('rata_rata');
            $table->string('keterangan');
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
        Schema::dropIfExists('hasil_surveys');
    }
}
