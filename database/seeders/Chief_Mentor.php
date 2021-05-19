<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Chief_Mentor extends Seeder
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
                'id_chief_mentor'=>'7138428',
                'catatan_mentor'=>'test',
                'tgl_masuk_chief_mentor'=>'26-05-2017',
                'tgl_keluar_chief_mentor'=>'26-09-2020',
                'id_karyawan'=>'8158182'
            ],
        ];
        foreach($data as $value){
            $chief_mentor = new \App\Models\Chief_Mentor();
            $chief_mentor->$value = ['id_chief_mentor'];
            $chief_mentor->$value = ['catatan_mentor'];
            $chief_mentor->$value = ['tgl_masuk_chief_mentor'];
            $chief_mentor->$value = ['tgl_keluar_chief_mentor'];
            $chief_mentor->$value = ['id_karyawan'];
            $chief_mentor->save;
        }
    }
}