<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_has_role extends Model
{
    protected $table="user_has_role";

    public function users_role(){
        return $this->hasMany('App\Model\')
    }
}
