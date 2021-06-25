<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\Types\Nullable;

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
              'nama_kelompok'=>'test kelompok1',
              'catatan_mentor'=>'test',
              'nomor_kelompok'=>1
          ],
          [
              'nama_kelompok'=>'test kelompok2',
              'catatan_mentor'=>'test2',
              'nomor_kelompok'=>2
          ]
        ];
        foreach($data as $value){
            $pengelompokan = new \App\Models\Pengelompokan();
            $pengelompokan->nama_kelompok = $value['nama_kelompok'];
            $pengelompokan->nomor_kelompok = $value['nomor_kelompok'];
            $mentor = \App\Models\Chief_Mentor::where('catatan_mentor','=',$value['catatan_mentor'])->first();
            $pengelompokan->fk_id_chief_mentor=$mentor->id;
            $pengelompokan->save();
        }
    }
}
