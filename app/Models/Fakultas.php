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

    public function fakultasProdi(){
        return $this->hasMany('App\Models\Prodi','fk_id_fakultas');
    }
}
