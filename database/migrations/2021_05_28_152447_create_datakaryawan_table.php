<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatakaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Data_karyawan', function (Blueprint $table) {
            $table->id();
            $table->double('id_karyawan');
            $table->string('nama_karyawan');
            $table->string('email_karyawan');
            $table->date('tgl_lahir');
            $table->string('alamat_karyawan');
            $table->double('notelp_karyawan');
            $table->string('agama');
            $table->string('jeniskelamin_karyawan');
            $table->timestamps();
            $table->integer('id_jabatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Data_karyawan');
    }
}
