<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chief_Mentor extends Model
{
    protected $table = "Chief_Mentor";
    protected $fillable =[
        "catatan_mentor",
    ];
    public function mentor_karyawan(){
        return $this->belongsTo('App\Models\Data_karyawan','fk_id_karyawan');
    }
    public function mentor_kelompok(){
        return $this->hasMany('App\Models\Pengelompokan','id_chief_mentor');
    }
}
