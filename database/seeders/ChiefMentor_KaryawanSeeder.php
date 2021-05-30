<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ChiefMentor_KaryawanSeeder extends Seeder
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
                'id_jabatan'=>'125120',
                'karyawan_chiefMentor'=>[
                    [
                        'catatan_mentor'=>'test'
                    ]
                ]
            ],
        ];
        foreach ($data as $value)   {
            $Karyawan = new \App\Models\Data_karyawan();
            $Karyawan->id_karyawan=$value['id_karyawan'];
            $Karyawan->nama_karyawan=$value['nama_karyawan'];
            $Karyawan->email_karyawan=$value['email_karyawan'];
            $Karyawan->tgl_lahir=$value['tgl_lahir'];
            $Karyawan->alamat_karyawan=$value['alamat_karyawan'];
            $Karyawan->notelp_karyawan=$value['notelp_karyawan'];
            $Karyawan->agama=$value['agama'];
            $Karyawan->jeniskelamin_karyawan=$value['jeniskelamin_karyawan'];
            $Karyawan->id_jabatan=$value['id_jabatan'];
            $Karyawan->save();
            foreach ($value['karyawan_chiefMentor'] as $value_Child){
                $mentor = new \App\Models\Chief_Mentor();
                $mentor->catatan_mentor=$value_Child['catatan_mentor'];
                $mentor->id_karyawan=$Karyawan->id;
                $mentor->save();
            }
        }
    }
}
