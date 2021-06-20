<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class MahasiswaImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $key => $row) {
            if ($key > 1) {
                Mahasiswa::create([
                    'nrp' => $row[1],
                    'nama_mahasiswa' => $row[2],
                    'NamaFakultas' => $row[3],
                    'NamaProdi' => $row[4],
                    'alamat_mahasiswa' => $row[5],
                    'jeniskel_mahasiswa' => $row[6],
                    'email_mahasiswa' => $row[7],
                    'telp_mahasiswa' => $row[8],
                    'tanggal_masuk' => $row[9],
                    'nama_orangtua' => $row[10],
                    'alamat_orangtua' => $row[11],
                ]);
            }
        }
    }
}
