<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
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
                'id_mahasiswa'=>'1872006',
                'nama_mahasiswa'=>'Michael Widjajahalim',
                'alamat_mahasiswa'=>'Komplek taman burung A2/37',
                'jeniskel_mahasiswa'=>'Laki-laki',
                'email_mahasiswa'=>'1872006@maranatha.ac.id',
                'telp_mahasiswa'=>'08123456789',
                'tanggal_masuk'=>'12-07-2018',
                'nama_orangtua'=>'Ahoey Gunawan',
                'alamat_orangtua'=>'Komplek taman burung A2/37'
            ],
            [
                'id_mahasiswa'=>'1872011',
                'nama_mahasiswa'=>'Stephen Candra',
                'alamat_mahasiswa'=>'Jl Griyatama 2 no 9',
                'jeniskel_mahasiswa'=>'Laki-laki',
                'email_mahasiswa'=>'1872011@maranatha.ac.id',
                'telp_mahasiswa'=>'08198765432',
                'tanggal_masuk'=>'12-07-2018',
                'nama_orangtua'=>'Suwarni',
                'alamat_orangtua'=>'Jl Griyatama 2 no 9'
            ]
        ];
        foreach ($data as $value){
            $mahasiswa = new \App\Models\Mahasiswa();
            $mahasiswa->id_mahasiswa = $value['id_mahasiswa'];
            $mahasiswa->nama_mahasiswa = $value['nama_mahasiswa'];
            $mahasiswa->alamat_mahasiswa = $value['alamat_mahasiswa'];
            $mahasiswa->jeniskel_mahasiswa = $value['jeniskel_mahasiswa'];
            $mahasiswa->email_mahasiswa = $value['email_mahasiswa'];
            $mahasiswa->telp_mahasiswa = $value['telp_mahasiswa'];
            $mahasiswa->tanggal_masuk = $value['tanggal_masuk'];
            $mahasiswa->nama_orangtua = $value['nama_orangtua'];
            $mahasiswa->alamat_orangtua = $value['alamat_orangtua'];
            $mahasiswa->save;
        }
    }
}
