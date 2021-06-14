<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table="users";
    protected $fillable=[
        "username",
        "password",
        "fk_id_role"
    ];
    public function userKaryawan(){
        return $this->hasOne('App\Models\Data_karyawan','fk_id_user');
    }
    public function userMahasiswa(){
        return $this->hasOne('App\Models\Mahasiswa','fk_id_user');
    }
    public function userRole(){
        return $this->belongsTo('App\Models\role','fk_id_role');
    }
    public function userForum(){
        return $this->hasMany('App\Models\forums','fk_id_user');
    }
    public function user_hasil_surveys(){
        return $this->hasMany('App\Models\hasil_survey','fk_id_user');
    }
}
