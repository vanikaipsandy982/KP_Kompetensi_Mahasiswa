<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table="Users";
    protected $fillable=[
        "username",
        "password",
        "email_verified_at",
        "id_role"
    ];
    public function user_datakaryawan(){
        return $this->hasOne('App\Models\Data_karyawan','id_user');
    }
    public function user_mahasiswa(){
        return $this->hasOne('App\Models\Mahasiswa','id_user');
    }
    public function user_role(){
        return $this->belongsTo('App\Models\role','id_role');
    }
    public function user_forum(){
        return $this->hasMany('App\Models\forums','id_user');
    }
    public function user_survey(){
        return $this->hasMany('App\Models\survey','id_user');
    }
}
