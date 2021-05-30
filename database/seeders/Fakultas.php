<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Fakultas extends Seeder
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
                'nama_fakultas'=>'Teknologi Informasi'
            ],
            [
                'nama_fakultas'=>'Kedokteran'
            ],
            [
                'nama_fakultas'=>'Psikologi'
            ],
            [
                'nama_fakultas'=>'Bahasa dan Budaya'
            ],
            [
                'nama_fakultas'=>'Ekonomi'
            ],
            [
                'nama_fakultas'=>'Seni Rupa dan Desain'
            ],
            [
                'nama_fakultas'=>'Hukum'
            ],
            [
                'nama_fakultas'=>'Kedokteran Gigi'
            ]
        ];
        foreach($data as $value){
            $fakultas = new \App\Models\Fakultas();
            $fakultas->nama_fakultas = $value['nama_fakultas'];
            $fakultas->save();
        }
    }
}
