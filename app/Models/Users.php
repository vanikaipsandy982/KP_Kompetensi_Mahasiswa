<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table="Users";
    protected $primaryKey="id_users";
    protected $fillable=[
        "id_users",
        "username",
        "password",
        "email_verified_at",
        "created_at",
        "updated_at"
    ];
    public function user_datakaryawan(){
        return $this->belongsTo('App\Models\Data_karyawan');
    }

    public function user_role(){
        return $this->hasMany('App\Models\role','id_role');
    }
    public function user_forum(){
        return $this->hasMany('App\Models\forums','forum_id');
    }
    public function user_survey(){
        return $this->hasMany('App\Models\survey','id_survey');
    }
}
