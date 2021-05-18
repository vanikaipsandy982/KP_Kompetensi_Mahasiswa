<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hasil_survey extends Model
{
    protected $table="hasil_survey";
    protected $fillable=[
        "id_hasil",
        "rata_rata",
        "created_at",
        "updated_at"
    ];
}