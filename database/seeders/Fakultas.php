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
                'id_fakultas'=>'TI',
                'nama_fakultas'=>'Teknologi Informasi'
            ],
            [
                'id_fakultas'=>'FK',
                'nama_fakultas'=>'Kedokteran'
            ],
            [
                'id_fakultas'=>'PSY',
                'nama_fakultas'=>'Psikologi'
            ],
            [
                'id_fakultas'=>'FBB',
                'nama_fakultas'=>'Bahasa dan Budaya'
            ],
            [
                'id_fakultas'=>'ECO',
                'nama_fakultas'=>'Ekonomi'
            ],
            [
                'id_fakultas'=>'FSRD',
                'nama_fakultas'=>'Seni Rupa dan Desain'
            ],
            [
                'id_fakultas'=>'LAW',
                'nama_fakultas'=>'Hukum'
            ],
            [
                'id_fakultas'=>'FKG',
                'nama_fakultas'=>'Kedokteran Gigi'
            ]
        ];
        foreach($data as $value){
            $fakultas = new \App\Models\Fakultas();
            $fakultas->id_fakultas = $value['id_fakultas'];
            $fakultas->nama_fakultas = $value['nama_fakultas'];
            $fakultas->save;
        }
    }
}
