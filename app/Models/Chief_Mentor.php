<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chief_Mentor extends Model
{
    protected $table = "chief_mentor";
    protected $fillable =[
        "catatan_mentor",
        "fk_id_karyawan",
    ];
    public function mentorKaryawan(){
        return $this->belongsTo('App\Models\Data_karyawan','fk_id_karyawan');
    }
    public function mentorKelompok(){
        return $this->hasMany('App\Models\Pengelompokan','fk_id_chief_mentor');
    }
}
