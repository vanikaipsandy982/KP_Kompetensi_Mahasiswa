<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    protected $table = "Fakultas";
    protected $fillable = [
        "nama_fakultas"
    ];

    public function fakultas_prodi(){
        return $this->hasMany('App\Models\Prodi','id_fakultas');
    }
}
