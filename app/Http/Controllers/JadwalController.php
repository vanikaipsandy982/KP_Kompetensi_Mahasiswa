<?php

namespace App\Http\Controllers;

use App\Models\Jadwal_Mentoring;
use App\Models\Mahasiswa;
use App\Models\Pengelompokan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class JadwalController extends Controller
{
    public function index()
    {
        $jadwal_mentoring = Jadwal_Mentoring::all();
        $pengelompokan = Pengelompokan::all();
        $mahasiswa = Mahasiswa::all();
        return view('mentoring.jadwal',compact('jadwal_mentoring', 'pengelompokan', 'mahasiswa'));
    }

    public function store(Request $request){
        $request->validate([
            'jadwalTambah' => 'required',
            'keteranganTambah' => 'required'
        ]);

        $jadwal_mentoring = new Jadwal_Mentoring();
        $jadwal_mentoring->jadwal = $request->jadwalTambah;
        $jadwal_mentoring->keterangan = $request->keteranganTambah;
        $pengelompokan = Pengelompokan::where('id', '=', $request->nama_kelompok)->first();
        $jadwal_mentoring->fk_id_kelompok = $pengelompokan->id;
        $mahasiswa = Mahasiswa::where('id', '=', $request->nama_mahasiswa)->first();
        $jadwal_mentoring->fk_id_mahasiswa = $mahasiswa->id;
        $jadwal_mentoring->save();
        return redirect('/listJadwal')->with('message', 'Data Berhasil di Update !');
    }

    public function update(Request $request){
        Jadwal_Mentoring::find($request->jadwalEdit)
            ->update([
                'jadwalTambah' => $request->jadwalBaru,
                'keteranganTambah' => $request->keteranganBaru
            ]);
        return redirect()->back()->with('message', 'Jadwal Berhasil di Update');
    }

    public function delete($id){
        $jadwal_mentoring = Jadwal_Mentoring::find($id);
        $jadwal_mentoring -> delete();
        return redirect('/listJadwal')->with('message', 'Jadwal berhasil di Hapus');
    }


}
