<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_karyawan extends Model
{
    protected $table="data_karyawan";
    protected $fillable=[
        "id_karyawan",
        "nama_karyawan",
        "jeniskelamin_karyawan",
        "alamat_karyawan",
        "notelp_karyawan",
        "agama",
        "tgl_lahir",
        "email_karyawan",
        "fk_id_jabatan",
        "fk_id_user"
    ];
    public function karyawanJabatan(){
        return $this->belongsTo('App\Models\Jabatan','fk_id_jabatan');
    }

    public function karyawanMentor(){
        return $this->hasMany('App\Models\Chief_Mentor','fk_id_karyawan');
    }
    public function karyawanUser(){
        return $this->belongsTo('App\Models\User','fk_id_user');
    }
}
