<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengelompokan extends Model
{
    protected $table = "pengelompokan";
    protected $fillable=[
        "fk_id_chief_mentor",
        "nama_kelompok"
    ];
    public function kelompokJadwalmentoring(){
        return $this->hasMany('App\Models\Jadwal_Mentoring','fk_id_kelompok');
    }

    public function kelompokMentor(){
        return $this->belongsTo('App\Models\Chief_Mentor','fk_id_chief_mentor');
    }
}
