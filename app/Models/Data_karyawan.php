<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_karyawan extends Model
{
    protected $table="Data_karyawan";
    protected $fillable=[
        "id_karyawan",
        "nama_karyawan",
        "jeniskelamin_karyawan",
        "alamat_karyawan",
        "notelp_karyawan",
        "agama",
        "tgl_lahir",
        "email_karyawan",
        "tgl_masuk_karyawan"
    ];
    public function karyawan_jabatan(){
        return $this->hasOne('App\Models\Jabatan','id_jabatan');
    }

    public function karyawan_mentor(){
        return $this->belongsTo('App\Models\Chief_Mentor');
    }
    public function datakaryawan_user(){
        return $this->hasOne('App\Models\Users','id_users');
    }
}
