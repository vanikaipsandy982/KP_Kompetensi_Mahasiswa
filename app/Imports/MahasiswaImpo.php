<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;

class MahasiswaImpo implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mahasiswa([
            'id' => $row[0],
            'nrp' => $row[1],
            'nama_mahasiswa' => $row[2],
            'alamat_mahasiswa' => $row[3],
            'jeniskel_mahasiswa' => $row[4],
            'email_mahasiswa' => $row[5],
            'telp_mahasiswa' => $row[6],
            'tanggal_masuk' => $row[7],
            'nama_orangtua' => $row[8],
            'alamat_orangtua' => $row[9],
            'created_at' => $row[10],
            'updated_at' => $row[11],
            'fk_id_prodi' => $row[12],
            'fk_id_user' => $row[13],
//            'fk_id_kelompok' => $row[14],
        ]);
    }
}
