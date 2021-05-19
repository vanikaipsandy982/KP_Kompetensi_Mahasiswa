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
                'nama_prodi'=>'Teknik Informatika'
            ],
            [
                'nama_prodi'=>'Sistem Informasi'
            ]
        ];
        foreach ($data as $value){
            $prodi = new \App\Models\Prodi();
            $prodi->nama_prodi = $value['nama_prodi'];
            $prodi->save;
        }
    }
}
