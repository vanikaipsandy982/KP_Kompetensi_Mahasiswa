<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Pengelompokan extends Seeder
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
              'id_chief_mentor'=>1,
              'nama_kelompok'=>'test kelompok1'
          ],
        ];
        foreach($data as $value){
            $pengelompokan = new \App\Models\Pengelompokan();
            $pengelompokan->id_chief_mentor=$value['id_chief_mentor'];
            $pengelompokan->nama_kelompok = $value['nama_kelompok'];

            $pengelompokan->save();
        }
    }
}
