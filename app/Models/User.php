<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table="users";

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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
