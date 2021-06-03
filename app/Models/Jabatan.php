<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table="jabatan";
    protected $fillable=[
        "nama_jabatan"
    ];

    public function jabatanKaryawan(){
        return $this->hasMany('App\Models\Data_karyawan','fk_id_jabatan');
    }

}
