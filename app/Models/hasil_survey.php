<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hasil_survey extends Model
{
    protected $table="hasil_survey";
    protected $fillable=[
        "rata_rata",
    ];
    public function surveyquestion_survey(){
        return $this->hasMany('App\Models\survey','id_survey');
    }
}
