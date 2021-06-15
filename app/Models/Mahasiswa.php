<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = "mahasiswa";
    public $fillable=[
        "nrp",
        "nama_mahasiswa",
        "alamat_mahasiswa",
        "jeniskel_mahasiswa",
        "email_mahasiswa",
        "telp_mahasiswa",
        "tanggal_masuk",
        "nama_orangtua",
        "alamat_orangtua",
        "fk_id_prodi",
        "fk_id_user"
    ];

    public function mahasiswaProdi(){
        return $this->belongsTo('App\Models\Prodi','fk_id_prodi');
    }
    public function mahasiswaJadwalmentoring(){
        return $this->hasMany('App\Models\Jadwal_Mentoring','fk_id_mahasiswa');
    }
    public function mahasiswaUser(){
        return $this->belongsTo('App\Models\User','fk_id_user');
    }
}
