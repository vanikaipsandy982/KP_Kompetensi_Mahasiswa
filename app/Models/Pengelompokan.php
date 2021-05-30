<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengelompokan extends Model
{
    protected $table = "Pengelompokan";
    protected $fillable=[
        "nama_kelompok"
    ];
    public function kelompok_jadwalmentoring(){
        return $this->hasMany('App\Models\Jadwal_Mentoring','id_kelompok');
    }

    public function kelompok_mentor(){
        return $this->belongsTo('App\Models\Chief_Mentor','id_chief_mentor');
    }
}
