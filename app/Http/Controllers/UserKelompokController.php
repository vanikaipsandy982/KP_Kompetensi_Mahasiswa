<?php

namespace App\Http\Controllers;

use App\Models\Pengelompokan;
use Illuminate\Http\Request;

class UserKelompokController extends Controller
{
    public function index()
    {
        $pengelompokan = Pengelompokan::all();
        return view('mentoring.userkelompok', compact('pengelompokan'));
    }
}
