<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index()
    {
        return view('survey.isiSurvey');
    }
    public function Category1()
    {
        return view('survey.surveyCat1');
    }
}
