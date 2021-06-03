<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use App\Models\survey;
use App\Models\survey_squestions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IsiSurveyController extends Controller
{
    public function index()
    {
        $fakultas = Fakultas::all();
        $prodi = Prodi::all();
        return view('survey.isiSurvey',compact('fakultas','prodi'));
    }
    public function category1()
    {
        $catpertanyaan = survey::all();
        $pertanyaan = survey_squestions::all();
        return view('survey.surveyCat1',compact('pertanyaan'));
    }
}
