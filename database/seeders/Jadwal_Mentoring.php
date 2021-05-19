<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Jadwal_Mentoring extends Seeder
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
                'id_kelompok'=>'767676',
                'catatan'=>'test catatan'
            ],
            [
                'id_mahasiswa'=>'1872011',
                'id_kelompok'=>'898989',
                'catatan'=>'test catatan 2'
            ]
        ];
        foreach($data as $value){
            $jadwal_mentoring = new \App\Models\Jadwal_Mentoring();
            $jadwal_mentoring->id_mahasiswa = $value['id_mahasiswa'];
            $jadwal_mentoring->id_kelompok = $value['id_kelompok'];
            $jadwal_mentoring->catatan = $value['catatan'];
            $jadwal_mentoring->save;
        }
    }
}
