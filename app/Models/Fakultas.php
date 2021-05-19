<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    protected $table = "Fakultas";
    protected $fillable = [
        "id_fakultas",
        "nama_fakultas"
    ];

    public function fakultas_prodi(){
        return $this->belongsTo('App\Models\Prodi');
    }
}
