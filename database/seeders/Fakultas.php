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
        ];
        foreach($data as $value){
            $fakultas = new \App\Models\Fakultas();
            $fakultas->nama_fakultas = $value['nama_fakultas'];
            $fakultas->save();
        }
    }
}
