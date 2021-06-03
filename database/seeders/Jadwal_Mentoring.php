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
                'catatan'=>'test catatan',
                'jadwal'=>'Kamis',
                'nrp'=>'1872006',
                'nama_kelompok'=>'test kelompok1'
            ],
            [
                'catatan'=>'test catatan 2',
                'jadwal'=>'Jumat',
                'nrp'=>'1872011',
                'nama_kelompok'=>'test kelompok1'
            ]
        ];
        foreach($data as $value){
            $jadwal_mentoring = new \App\Models\Jadwal_Mentoring();
            $jadwal_mentoring->catatan = $value['catatan'];
            $jadwal_mentoring->jadwal = $value['jadwal'];
            $mahasiswa = \App\Models\Mahasiswa ::where('nrp','=',$value['nrp'])->first();
            $jadwal_mentoring->fk_id_mahasiswa=$mahasiswa->id;
            $kelompok = \App\Models\Pengelompokan::where('nama_kelompok','=',$value['nama_kelompok'])->first();
            $jadwal_mentoring->fk_id_kelompok=$kelompok->id;
            $jadwal_mentoring->save();
        }
    }
}
