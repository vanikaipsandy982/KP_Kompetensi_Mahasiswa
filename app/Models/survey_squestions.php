<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class survey_squestions extends Model
{
    protected $table="survey_squestions";
    protected $fillable=[
        "question",
        "id_survey",
    ];

    public function surveyquestion_survey(){
        return $this->belongsTo('App\Models\survey','fk_id_survey');
    }
    public function surveyquestion_hasilsurveys(){
        return $this->hasMany('App\Models\hasil_survey','fk_id_squestion');
    }

}
