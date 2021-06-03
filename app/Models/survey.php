<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class survey extends Model
{
    protected $table="surveys";
    protected $fillable=[
        "surveys_name",
    ];

    public function survey_surveyquestion(){
        return $this->hasMany('App\Models\survey_squestions','fk_id_survey');
    }
    public function survey_hasilsurvey(){
        return $this->hasMany('App\Models\hasil_survey','fk_id_survey');
    }
}
