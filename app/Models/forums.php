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
        "fk_id_user"
    ];
    public function forumUser(){
        return $this->belongsTo('App\Models\User','fk_id_user');
    }
}
