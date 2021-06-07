<?php

namespace App\Http\Controllers;

use App\Models\Jadwal_Mentoring;
use Illuminate\Support\Facades\DB;


class AdminJadwalController extends Controller
{
    public function index()
    {
        $jadwal_mentoring = Jadwal_Mentoring::all();
        return view('mentoring.adminjadwal',compact('jadwal_mentoring'));
    }
}
