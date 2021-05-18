<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chief_Mentor extends Model
{
    protected $table = "Chief_Mentor";
    protected $fillable =[
        "id_chief_mentor",
        "catatan_mentor",
        "tgl_masuk_chief_mentor",
        "tgl_keluar_chief_mentor"
    ];
    public function mentor_karyawan(){
        return $this->hasOne('App\Models\Data_karyawan','id_karyawan');
    }
}
