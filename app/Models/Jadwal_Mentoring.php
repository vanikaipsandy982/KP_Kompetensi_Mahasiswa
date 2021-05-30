<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal_Mentoring extends Model
{
    protected $table = "Jadwal_Mentoring";
    protected $fillable =[
        "catatan",
        "jadwal"

    ];
    public function jadwalmentoring_mahasiswa(){
        return $this->belongsTo('App\Models\Mahasiswa','id_mahasiswa');
    }
    public function jadwalmentoring_kelompok(){
        return $this->belongsTo('App\Models\Pengelompokan','id_kelompok');
    }
}
