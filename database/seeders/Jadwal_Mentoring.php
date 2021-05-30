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
                'jadwal'=>'Kamis'
            ],
            [
                'catatan'=>'test catatan 2',
                'jadwal'=>'Jumat'
            ]
        ];
        foreach($data as $value){
            $jadwal_mentoring = new \App\Models\Jadwal_Mentoring();
            $jadwal_mentoring->catatan = $value['catatan'];
            $jadwal_mentoring->jadwal = $value['jadwal'];
            $jadwal_mentoring->save();
        }
    }
}
