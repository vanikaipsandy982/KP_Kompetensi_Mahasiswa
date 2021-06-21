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
                'nrp'=>'1872006',
                'nama_mahasiswa'=>'Michael Widjajahalim',
                'alamat_mahasiswa'=>'Komplek taman burung A2/37',
                'jeniskel_mahasiswa'=>'Pria',
                'email_mahasiswa'=>'1872006@maranatha.ac.id',
                'telp_mahasiswa'=>'08123456789',
                'tanggal_masuk'=>'12-07-2018',
                'nama_orangtua'=>'Ahoey Gunawan',
                'alamat_orangtua'=>'Komplek taman burung A2/37',
                'nama_prodi'=>'Teknik Informatika',
                'username'=>'123'
            ],
            [
                'nrp'=>'1872011',
                'nama_mahasiswa'=>'Stephen Candra',
                'alamat_mahasiswa'=>'Jl Griyatama 2 no 9',
                'jeniskel_mahasiswa'=>'Pria',
                'email_mahasiswa'=>'1872011@maranatha.ac.id',
                'telp_mahasiswa'=>'08198765432',
                'tanggal_masuk'=>'12-07-2018',
                'nama_orangtua'=>'Suwarni',
                'alamat_orangtua'=>'Jl Griyatama 2 no 9',
                'nama_prodi'=>'Teknik Informatika',
                'username'=>'123'
            ]
        ];
        foreach ($data as $value){
            $mahasiswa = new \App\Models\Mahasiswa();
            $mahasiswa->nrp = $value['nrp'];
            $mahasiswa->nama_mahasiswa = $value['nama_mahasiswa'];
            $mahasiswa->alamat_mahasiswa = $value['alamat_mahasiswa'];
            $mahasiswa->jeniskel_mahasiswa = $value['jeniskel_mahasiswa'];
            $mahasiswa->email_mahasiswa = $value['email_mahasiswa'];
            $mahasiswa->telp_mahasiswa = $value['telp_mahasiswa'];
            $mahasiswa->tanggal_masuk = $value['tanggal_masuk'];
            $mahasiswa->nama_orangtua = $value['nama_orangtua'];
            $mahasiswa->alamat_orangtua = $value['alamat_orangtua'];
            $prodi = \App\Models\Prodi::where('nama_prodi','=',$value['nama_prodi'])->first();
            $mahasiswa->fk_id_prodi=$prodi->id;
            $user = \App\Models\User::where('username','=',$value['username'])->first();
            $mahasiswa->fk_id_user=$user->id;
            $mahasiswa->save();
        }
    }
}
