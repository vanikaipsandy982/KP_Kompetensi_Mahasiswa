<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Prodi extends Seeder
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
                'id_fakultas'=>1,
                'nama_prodi'=>'Teknik Informatika'
            ],
            [
                'id_fakultas'=>2,
                'nama_prodi'=>'Sistem Informasi'
            ]
        ];
        foreach ($data as $value){
            $prodi = new \App\Models\Prodi();
            $prodi->id_fakultas = $value['id_fakultas'];
            $prodi->nama_prodi = $value['nama_prodi'];
            $prodi->save();
        }
    }
}
