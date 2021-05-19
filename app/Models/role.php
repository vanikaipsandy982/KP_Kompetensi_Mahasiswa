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
        return $this->hasMany('App\Models\Users');
    }
    public function role_permission(){
        return $this->belongsToMany(permissions::class, 'role_has_permissions', 'permissions', 'permission_id', 'role_id');

        return $this->belongsTo('App\Models\Users');
    }
}
