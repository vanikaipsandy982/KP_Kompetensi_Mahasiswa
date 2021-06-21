<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;

class MahasiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return Mahasiswa
     */
    public function model(array $row)
    {
        return new Mahasiswa([
            'nrp' => $row[0],
            'nama_mahasiswa' => $row[1],
            'alamat_mahasiswa' => $row[2],
            'jeniskel_mahasiswa' => $row[3],
            'email_mahasiswa' => $row[4],
            'telp_mahasiswa' => $row[5],
            'tanggal_masuk' => $row[6],
            'nama_orangtua' => $row[7],
            'alamat_orangtua' => $row[8],
            'fk_id_prodi' => $row[9],
            'fk_id_user' => $row[10],
        ]);
    }
}
