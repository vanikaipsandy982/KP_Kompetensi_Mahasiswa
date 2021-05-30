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
                'nama_jabatan'=>'test jabatan'
            ]
        ];
        foreach ($data as $value) {
            $jabatan = new \App\Models\Jabatan();
            $jabatan->nama_jabatan = $value['nama_jabatan'];
            $jabatan->save();
        }
    }
}
