<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Jabatan extends Seeder
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
                'id_jabatan'=>'125120',
                'nama_jabatan'=>'test jabatan',
                'id_divisi'=>'24921'
            ]
        ];
        foreach ($data as $value) {
            $jabatan = new \App\Models\Jabatan();
            $jabatan->id_jabatan = $value['id_jabatan'];
            $jabatan->id_jabatan = $value['nama_jabatan'];
            $jabatan->id_divisi = $value['id_divisi'];
            $jabatan->save;
        }
    }
}
