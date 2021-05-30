<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_karyawan extends Model
{
    protected $table="Data_karyawan";
    protected $fillable=[
        "nama_karyawan",
        "jeniskelamin_karyawan",
        "alamat_karyawan",
        "notelp_karyawan",
        "agama",
        "tgl_lahir",
        "email_karyawan"
    ];
    public function karyawan_jabatan(){
        return $this->belongsTo('App\Models\Jabatan','id_jabatan');
    }

    public function karyawan_mentor(){
        return $this->hasMany('App\Models\Chief_Mentor','fk_id_karyawan');
    }
    public function datakaryawan_user(){
        return $this->belongsTo('App\Models\Users','id_user');
    }
}
