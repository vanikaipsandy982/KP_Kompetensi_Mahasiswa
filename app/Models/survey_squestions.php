<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class survey_squestions extends Model
{
    protected $table="Survey_squestions";
    protected $fillable=[
        "question",
    ];

    public function surveyquestion_survey(){
        return $this->belongsTo('App\Models\survey','id_survey');
    }

}
