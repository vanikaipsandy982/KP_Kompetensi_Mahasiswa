<?php

namespace App\Http\Controllers;

use App\Models\Chief_Mentor;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\Pengelompokan;
use Psy\Util\Json;

class KelompokController extends Controller
{
    public function index()
    {
        $pengelompokan = Pengelompokan::all();
        $chief_mentor = Chief_Mentor::all();
        return view('mentoring.kelompok', compact('pengelompokan', 'chief_mentor'));
    }

    public function get(Request $request)
    {
        $pengelompokan = Pengelompokan::with('kelompokMahasiswa')->where('id', '=', $request->id)->first();
        return response()->json($pengelompokan);
    }


    public function store(Request $request){
        $request->validate([
           'namaKelompok'=> 'required'
        ]);

        $pengelompokan = new Pengelompokan();
        $pengelompokan->nama_kelompok = $request->namaKelompok;
        $chief_mentor = Chief_Mentor::where('id','=', $request->fk_chiefMentor)->first();
        $pengelompokan->fk_id_chief_mentor = $chief_mentor->id;
        $pengelompokan->save();
        return redirect('/listKelompok')->with('message', 'Data berhasil di input');
    }

    public function update(Request $request){
        $kelompok = Pengelompokan::find($request->editKelompok);
        $kelompok->update([
                'nama_kelompok'=> $request->kelompokBaru
            ]);
        return redirect()->back()->with('message', 'Kelompok berhasil di Update');
    }

    public function delete($id){
        $pengelompokan = Pengelompokan::find($id);
        $pengelompokan->delete();
        return redirect('/listKelompok')->with('message', 'Data Berhasil di Hapus');
    }
}

