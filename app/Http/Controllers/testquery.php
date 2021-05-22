<?php

namespace App\Http\Controllers;

use Database\Seeders\Survey_squestions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class testquery extends Controller
{
    function show(){
        $survey = DB::table('Survey_squestions')->get();
        return view('survey.editSurvey',['survey' => $survey]);
    }
}
