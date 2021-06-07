<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengelompokan;

class AdminKelompokController extends Controller
{
    public function index()
    {
        $pengelompokan = Pengelompokan::all();
        return view('mentoring.adminkelompok', compact('pengelompokan'));
    }
}
