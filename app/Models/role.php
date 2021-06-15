<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $table="role";
    protected $fillable=[
        "name"
    ];

    public function roleUser(){
        return $this->hasMany('App\Models\User','fk_id_role');
    }
    public function rolePermission(){
        return $this->belongsToMany(permissions::class, 'role_has_permissions', 'fk_id_permission', 'fk_id_role');

    }
}
