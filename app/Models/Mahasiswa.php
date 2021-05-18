<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = "mahasiswa";
    public $fillable=[
        "id_mahasiswa",
        "nama_mahasiswa",
        "alamat_mahasiswa",
        "jeniskel_mahasiswa",
        "email_mahasiswa",
        "telp_mahasiswa",
        "tanggal_masuk",
        "nama_orangtua",
        "alamat_orangtua"
    ];

    public function mahasiswa_prodi(){
        return $this->hasOne('App\Models\Prodi','id_prodi');
    }
    public function jadwalmentoring_mahasiswa(){
        return $this->belongsTo('App\Models\Jadwal_Mentoring');
    }
}
