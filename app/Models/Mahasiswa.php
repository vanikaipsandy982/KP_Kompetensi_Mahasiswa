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
        "alamat_orangtua"
    ];

    public function mahasiswa_prodi(){
        return $this->belongsTo('App\Models\Prodi','id_prodi');
    }
    public function mahasiswa_jadwalmentoring(){
        return $this->hasMany('App\Models\Jadwal_Mentoring','id_mahasiswa');
    }
    public function mahasiswa_user(){
        return $this->belongsTo('App\Models\Users','id_user');
    }
}
