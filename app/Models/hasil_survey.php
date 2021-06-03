<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hasil_survey extends Model
{
    protected $table="hasil_surveys";
    protected $fillable=[
        "rata_rata",
        "fk_id_user"
    ];
    public function hasilsurvey_survey(){
        return $this->belongsTo('App\Models\survey','fk_id_survey');
    }
    public function hasilsurvey_squestions(){
        return $this->belongsTo('App\Models\survey_squestions','fk_id_squestion');
    }
    public function hasilsurvey_user(){
        return $this->belongsTo('App\Models\users','fk_id_user');
    }
}
