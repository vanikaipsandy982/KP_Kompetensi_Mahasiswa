<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table="Jabatan";
    protected $fillable=[
        "id_jabatan",
        "nama_jabatan"
    ];

    public function jabatan_karyawan(){
        return $this->belongsTo('App\Models\Data_karyawan');
    }

}
