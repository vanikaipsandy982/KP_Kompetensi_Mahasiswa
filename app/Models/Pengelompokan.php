<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengelompokan extends Model
{
    protected $table = "Pengelompokan";
    protected $fillable=[
        "id_kelompok",
        "nama_kelompok"
    ];
    public function kelompok_jadwalmentoring(){
        return $this->hasMany('App\Models\Jadwal_Mentoring','id_jadwalmentoring');
    }
}
