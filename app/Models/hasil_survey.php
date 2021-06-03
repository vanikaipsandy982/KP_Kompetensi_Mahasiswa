<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hasil_survey extends Model
{
    protected $table="hasil_surveys";
    protected $fillable=[
        "rata_rata",
        "id_user",
    ];
    public function hasilsurvey_survey(){
        return $this->belongsTo('App\Models\survey','id_survey');
    }
    public function hasilsurvey_squestions(){
        return $this->belongsTo('App\Models\survey_squestions','id_squestion');
    }
    public function hasilsurvey_user(){
        return $this->belongsTo('App\Models\users','users_id');
    }
}
