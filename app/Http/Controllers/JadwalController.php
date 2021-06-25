<?php

namespace App\Http\Controllers;

use App\Models\Jadwal_Mentoring;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class JadwalController extends Controller
{
    public function index()
    {
        $jadwal_mentoring = Jadwal_Mentoring::all();
        return view('mentoring.jadwal',compact('jadwal_mentoring'));
    }

    public function store(Request $request){
        $request->validate([
            'jadwalTambah' => 'required',
            'keteranganTambah' => 'required'
        ]);

        $jadwal_mentoring = new Jadwal_Mentoring();
        $jadwal_mentoring->jadwal = $request->jadwalTambah;
        $jadwal_mentoring->catatan = $request->keteranganTambah;
        $jadwal_mentoring->save();
        return redirect('/listJadwal')->with('message', 'Data Berhasil di input');
    }

    public function update(Request $request){
        Jadwal_Mentoring::find($request->jadwalEdit)
            ->update([
                'jadwal' => $request->jadwalBaru,
                'catatan' => $request->keteranganBaru
            ]);
        return redirect()->back()->with('message', 'Jadwal Berhasil di Update');
    }

    public function delete($id){
        $jadwal_mentoring = Jadwal_Mentoring::find($id);
        $jadwal_mentoring -> delete();
        return redirect('/listJadwal')->with('message', 'Jadwal berhasil di Hapus');
    }


}
