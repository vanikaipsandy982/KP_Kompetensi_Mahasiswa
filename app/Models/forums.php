<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class forums extends Model
{
    protected $table="forums";
    protected $fillable=[
        "forum_id",
        "artikel",
        "berita",
        "created_at",
        "updated_at"
    ];
    public function forum_user(){
        return $this->belongsTo('App\Models\Users');
    }
}
