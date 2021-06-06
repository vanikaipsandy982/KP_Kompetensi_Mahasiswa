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
        $catpertanyaan = survey::all();;
        $pertanyaan = survey_squestions::all();
        return view('survey.surveyCat1',compact('pertanyaan'));
    }
    public function category2()
    {
        $catpertanyaan = survey::all();;
        $pertanyaan = survey_squestions::all();
        return view('survey.surveyCat2',compact('pertanyaan'));
    }
    public function category3()
    {
        $catpertanyaan = survey::all();;
        $pertanyaan = survey_squestions::all();
        return view('survey.surveyCat3',compact('pertanyaan'));
    }
    public function category4()
    {
        $catpertanyaan = survey::all();;
        $pertanyaan = survey_squestions::all();
        return view('survey.surveyCat4',compact('pertanyaan'));
    }
    public function category5()
    {
        $catpertanyaan = survey::all();;
        $pertanyaan = survey_squestions::all();
        return view('survey.surveyCat5',compact('pertanyaan'));
    }
    public function category6()
    {
        $catpertanyaan = survey::all();;
        $pertanyaan = survey_squestions::all();
        return view('survey.surveyCat6',compact('pertanyaan'));
    }
    public function category7()
    {
        $catpertanyaan = survey::all();;
        $pertanyaan = survey_squestions::all();
        return view('survey.surveyCat7',compact('pertanyaan'));
    }
    public function category8()
    {
        $catpertanyaan = survey::all();;
        $pertanyaan = survey_squestions::all();
        return view('survey.surveyCat8',compact('pertanyaan'));
    }
    public function category9()
    {
        $catpertanyaan = survey::all();;
        $pertanyaan = survey_squestions::all();
        return view('survey.surveyCat9',compact('pertanyaan'));
    }
    public function category10()
    {
        $catpertanyaan = survey::all();;
        $pertanyaan = survey_squestions::all();
        return view('survey.surveyCat10',compact('pertanyaan'));
    }
    public function category11()
    {
        $catpertanyaan = survey::all();;
        $pertanyaan = survey_squestions::all();
        return view('survey.surveyCat11',compact('pertanyaan'));
    }
    public function category12()
    {
        $catpertanyaan = survey::all();;
        $pertanyaan = survey_squestions::all();
        return view('survey.surveyCat12',compact('pertanyaan'));
    }
    public function category13()
    {
        $catpertanyaan = survey::all();;
        $pertanyaan = survey_squestions::all();
        return view('survey.surveyCat13',compact('pertanyaan'));
    }
    public function category14()
    {
        $catpertanyaan = survey::all();;
        $pertanyaan = survey_squestions::all();
        return view('survey.surveyCat14',compact('pertanyaan'));
    }
    public function hasilsurvey()
    {
        $catpertanyaan = survey::all();;
        $pertanyaan = survey_squestions::select('survey_squestions.id_survey','surveys.survey_name', 'survey_squestions.question', 'surveys.id', 'survey_squestions.id AS nomor')
            ->join('surveys', 'survey_squestions.id_survey', '=', 'surveys.id')
//            ->where('survey_squestions.id_survey','=','surveys.id')
            ->get();
        return view('survey.hasilsurvey',compact('pertanyaan'));
    }
}
