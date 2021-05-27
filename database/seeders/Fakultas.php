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
                'id_fakultas'=>'1',
                'nama_fakultas'=>'Teknologi Informasi'
            ],
            [
                'id_fakultas'=>'2',
                'nama_fakultas'=>'Kedokteran'
            ],
            [
                'id_fakultas'=>'3',
                'nama_fakultas'=>'Psikologi'
            ],
            [
                'id_fakultas'=>'4',
                'nama_fakultas'=>'Bahasa dan Budaya'
            ],
            [
                'id_fakultas'=>'5',
                'nama_fakultas'=>'Ekonomi'
            ],
            [
                'id_fakultas'=>'6',
                'nama_fakultas'=>'Seni Rupa dan Desain'
            ],
            [
                'id_fakultas'=>'7',
                'nama_fakultas'=>'Hukum'
            ],
            [
                'id_fakultas'=>'8',
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
