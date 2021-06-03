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
                'id_prodi'=>72,
                'nama_prodi'=>'Teknik Informatika',
                'nama_fakultas'=>'Teknologi Informasi'
            ],
            [
                'id_prodi'=>73,
                'nama_prodi'=>'Sistem Informasi',
                'nama_fakultas'=>'Teknologi Informasi'
            ]
        ];
        foreach ($data as $value){
            $prodi = new \App\Models\Prodi();
            $prodi->id_prodi = $value['id_prodi'];
            $prodi->nama_prodi = $value['nama_prodi'];
            $fakultas = \App\Models\Fakultas::where('nama_fakultas','=',$value['nama_fakultas'])->first();
            $prodi->fk_id_fakultas=$fakultas->id;
            $prodi->save();
        }
    }
}
