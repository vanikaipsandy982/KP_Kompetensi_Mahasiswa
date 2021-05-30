<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $table="rolePermissionSeeder";
    protected $fillable=[
        "name"
    ];

    public function role_user(){
        return $this->hasMany('App\Models\Users','id_role');
    }
    public function role_permission(){
        return $this->belongsToMany(permissions::class, 'role_has_permissions', 'id_permission', 'id_role');

    }
}
