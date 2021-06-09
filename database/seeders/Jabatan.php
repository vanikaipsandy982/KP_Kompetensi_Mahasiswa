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
                'nama_jabatan'=>'Dosen'
            ],
            [
                'nama_jabatan'=>'Karyawan'
            ]
        ];
        foreach ($data as $value) {
            $jabatan = new \App\Models\Jabatan();
            $jabatan->nama_jabatan = $value['nama_jabatan'];
            $jabatan->save();
        }
    }
}
