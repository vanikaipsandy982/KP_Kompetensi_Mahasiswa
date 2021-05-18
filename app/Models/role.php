<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $table="role";
    protected $fillable=[
        "id_role",
        "name"
    ];

    public function role_user(){
        return $this->belongsTo('App\Models\Users');
    }
    public function role_permission(){
        return $this->hasMany('App\Models\permissions','permission_id');
    }
}
