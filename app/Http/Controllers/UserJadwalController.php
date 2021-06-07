<?php

namespace App\Http\Controllers;

use App\Models\Jadwal_Mentoring;
use Illuminate\Http\Request;

class UserJadwalController extends Controller
{
    public function index()
    {
        $jadwal_mentoring = Jadwal_Mentoring::all();
        return view('mentoring.userjadwal',compact('jadwal_mentoring'));
    }
}
