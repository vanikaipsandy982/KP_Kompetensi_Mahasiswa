<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = "prodi";
    protected $fillable = [
        "id_prodi",
        "nama_prodi",
        "fk_id_fakultas"

    ];

    public function prodiMahasiswa(){
        return $this->hasMany('App\Models\Mahasiswa','fk_id_prodi');
    }
    public function prodiFakultas(){
        return $this->belongsTo('App\Models\Fakultas','fk_id_fakultas');
    }
}
