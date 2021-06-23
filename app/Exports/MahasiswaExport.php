<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class MahasiswaExport implements FromCollection,WithMapping,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $mahasiswa = DB::table('mahasiswa')
            ->join('Prodi', 'mahasiswa.fk_id_prodi', '=', 'Prodi.id')
            ->join('Fakultas', 'Prodi.fk_id_fakultas', '=', 'Fakultas.id')
            ->SELECT('mahasiswa.*',
                'Prodi.id as idProdi',
                'Prodi.nama_prodi as NamaProdi',
                'Fakultas.id as idFakultas',
                'Fakultas.nama_fakultas as NamaFakultas')->get();
        return $mahasiswa;
    }

    public function headings(): array
    {
        return[
            'NRP',
            'Nama',
            'Email',
            'Jenis Kelamin',
            'Alamat Mahasiswa',
            'Telepon Mahasiswa',
            'Fakultas',
            'Program Studi',
            'Tanggal Masuk',
            'Nama Orangtua',
            'Alamat Orangtua',
        ];
    }

    public function map($mahasiswa): array
    {
        return[
            $mahasiswa->nrp,
            $mahasiswa->nama_mahasiswa,
            $mahasiswa->email_mahasiswa,
            $mahasiswa->jeniskel_mahasiswa,
            $mahasiswa->alamat_mahasiswa,
            $mahasiswa->telp_mahasiswa,
            $mahasiswa->NamaFakultas,
            $mahasiswa->NamaProdi,
            $mahasiswa->tanggal_masuk,
            $mahasiswa->nama_orangtua,
            $mahasiswa->alamat_orangtua,
        ];
    }
}
