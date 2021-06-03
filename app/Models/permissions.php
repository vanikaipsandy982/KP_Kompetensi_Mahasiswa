<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permissions extends Model
{
    protected $table="permissions";
    protected $fillable=[
        "name"
    ];

    public function permissionRole(){
        return $this->belongsToMany(role::class, 'role_has_permissions', 'fk_id_role', 'fk_id_permission');

    }
}
