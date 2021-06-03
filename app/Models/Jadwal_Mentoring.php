<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal_Mentoring extends Model
{
    protected $table = "jadwal_mentoring";
    protected $fillable =[
        "fk_id_mahasiswa",
        "fk_id_kelompok",
        "catatan",
        "jadwal"

    ];
    public function jadwalmentoringMahasiswa(){
        return $this->belongsTo('App\Models\Mahasiswa','fk_id_mahasiswa');
    }
    public function jadwalmentoringKelompok(){
        return $this->belongsTo('App\Models\Pengelompokan','fk_id_kelompok');
    }
}
