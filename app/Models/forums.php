<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class forums extends Model
{
    protected $table="forums";
    protected $fillable=[
        "artikel",
        "berita",
    ];
    public function forum_user(){
        return $this->belongsTo('App\Models\Users','id_users');
    }
}
