<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class survey_squestions extends Model
{
    protected $table="survey_squestions";
    protected $fillable=[
        "id_question",
        "question",
        "created_at",
        "updated_at"
    ];

    public function surveyquestion_survey(){
        return $this->belongsTo('App\Models\survey');
    }
}
