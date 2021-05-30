<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class survey extends Model
{
    protected $table="Survey";
    protected $fillable=[
        "survey_name",
    ];

    public function survey_user(){
        return $this->belongsTo('App\Models\Users','id_users');
    }
    public function survey_surveyquestion(){
        return $this->hasMany('App\Models\survey_squestions','id_survey');
    }
    public function surveyquestion_survey(){
        return $this->belongsTo('App\Models\hasil_survey','id_survey');
    }
}
