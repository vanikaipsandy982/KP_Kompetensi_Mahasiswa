<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FakultasController extends Controller
{
    public function index()
    {
        $fakultas = DB::table('Fakultas')->get();
        return view('survey.isiSurvey',['fakultas' => $fakultas]);
    }
}
