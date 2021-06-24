<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nrp')->unique();
            $table->string('nama_mahasiswa');
            $table->string('alamat_mahasiswa');
            $table->string('jeniskel_mahasiswa');
            $table->string('email_mahasiswa');
            $table->string('telp_mahasiswa')->unique();
            $table->date('tanggal_masuk');
            $table->string('nama_orangtua');
            $table->string('alamat_orangtua');
            $table->timestamps();
            $table->integer('fk_id_prodi')->nullable();
            $table->integer('fk_id_user')->nullable();
            $table->integer('fk_id_kelompok')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa');
    }
}
