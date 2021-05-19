<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Data_Karyawan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
          [
              'id_karyawan'=>'4288191',
              'nama_karyawan'=>'Muhammad Azeez Maree',
              'email_karyawan'=>'azeeza@gmail.com',
              'tgl_lahir'=>'29-01-2000',
              'alamat_karyawan'=>'test alamat',
              'notelp_karyawan'=>'8130123922',
              'agama'=>'islam',
              'jeniskelamin_karyawan'=>'pria',
              'tgl_masuk_karyawan'=>'25-01-2018',
              'id_jabatan'=>'125120'
          ],
        ];
        foreach($data as $value){
            $data_karyawan = new \App\Models\Data_karyawan();
            $data_karyawan->id_karyawan = $value['id_karyawan'];
            $data_karyawan->nama_karyawan = $value['nama_karyawan'];
            $data_karyawan->email_karyawan = $value['email_karyawan'];
            $data_karyawan->tgl_lahir = $value['tgl_lahir'];
            $data_karyawan->alamat_karyawan = $value['alamat_karyawan'];
            $data_karyawan->notelp_karyawan = $value['notelp_karyawan'];
            $data_karyawan->agama = $value['agama'];
            $data_karyawan->jeniskelamin_karyawan = $value['jeniskelamin_karyawan'];
            $data_karyawan->tgl_masuk_karyawan = $value['tgl_masuk_karyawan'];
            $data_karyawan->id_jabatan = $value['id_jabatan'];
            $data_karyawan->save;
        }
    }
}
