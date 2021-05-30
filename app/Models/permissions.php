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

    public function permission_role(){
        return $this->belongsToMany(role::class, 'role_has_permissions', 'id_role', 'id_permission');

    }
}
