<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = "Prodi";
    protected $fillable = [
        "id_prodi",
        "nama_prodi"
    ];

    public function prodi_mahasiswa(){
        return $this->belongsTo('App\Models\Mahasiswa');
    }
    public function prodi_fakultas(){
        return $this->belongsTo('App\Models\Fakultas');
    }
}
