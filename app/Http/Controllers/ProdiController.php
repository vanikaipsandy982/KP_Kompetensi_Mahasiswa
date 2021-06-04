<?php

namespace App\Http\Controllers;
use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index()
    {
        $fakultas = Fakultas::all();
        $prodi = Prodi::all();
        return view('prodi.index', compact('prodi', 'fakultas'));
    }
}
