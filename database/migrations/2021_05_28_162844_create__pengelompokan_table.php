<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengelompokanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengelompokan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelompok');
            $table->integer('nomor_kelompok')->nullable();
            $table->integer('fk_id_chief_mentor')->nullable();
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
        Schema::dropIfExists('pengelompokan');
    }
}
