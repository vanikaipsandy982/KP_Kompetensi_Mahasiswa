<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class survey extends Model
{
    protected $table="survey";
    protected $fillable=[
        "id_survey",
        "survey_name",
        "created_at",
        "updated_at"
    ];

    public function survey_role(){
        return $this->belongsTo('App\Models\Users');
    }
    public function survey_surveyquestion(){
        return $this->hasMany('App\Models\survey_squestions','id_question');
    }
}
