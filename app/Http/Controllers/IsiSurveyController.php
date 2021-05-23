<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IsiSurveyController extends Controller
{
    public function index()
    {
        $fakultas = DB::table('Fakultas')->get();
        $prodi = DB::table('Prodi')->get();
        $catsurvey = DB::table('Survey')->get();
        return view('survey.isiSurvey',['fakultas' => $fakultas,'prodi' => $prodi,'catsurvey'=> $catsurvey]);
    }
}
