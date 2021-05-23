<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index()
    {
        $prodi = DB::table('Prodi')->get();
        return view('survey.isiSurvey',['prodi' => $prodi]);
    }
}
