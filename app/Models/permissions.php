<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permissions extends Model
{
    protected $table="permissions";
    protected $fillable=[
        "permission_id",
        "name",
        "created_at",
        "updated_at"
    ];

    public function permission_role(){
        return $this->belongsToMany(role::class, 'role_has_permissions', 'role', 'role_id', 'permission_id');

        return $this->belongsTo('App\Models\role');
    }
}
