<?php

namespace App\Http\Controllers;
use App\Models\Fakultas;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index()
    {
        $fakultas = Fakultas::all();
        $prodi = Prodi::all();
        $faculty = Prodi::select('Fakultas.nama_fakultas', 'Prodi.id','Prodi.id_prodi', 'Prodi.nama_prodi')
            ->join('Fakultas', 'Prodi.fk_id_fakultas', '=', 'Fakultas.id')
            ->get();
        return view('prodi.index', compact('prodi', 'fakultas', 'faculty'));
    }

    public function store(Request $request){
        $request->validate([
            'kodeProdi' => 'required',
            'namaProdi' => 'required'
        ]);

        $prodi = new Prodi;
        $prodi->fk_id_fakultas = $request->selectedFakultas;
        $prodi->id_prodi = $request->kodeProdi;
        $prodi->nama_prodi = $request->namaProdi;
        $prodi->save();
        return redirect('/listProdi')->with('message', 'Data Program Studi Berhasil Di Input');
    }

    public function edit($id)
    {
        $prod = Prodi::find($id);
        $fkl = Fakultas::select('Fakultas.id',
            'Fakultas.nama_fakultas',
            'Prodi.nama_prodi',
            'Prodi.id AS ProdiID',
            'Fakultas.id AS FakultasID',
            )
            ->join('Prodi', 'Prodi.fk_id_fakultas', '=', 'Fakultas.id')
            ->where('Prodi.id', '=', $id)
            ->get();
        $fakultas = Fakultas::all();
        return view('prodi.edit', compact('fakultas', 'prod', 'fkl'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'kode_prodi_baru' => 'required',
            'nama_prodi_baru' => 'required',
        ]);
        Prodi::where('id', $id)
            ->update([
                'id_prodi' => $request->kode_prodi_baru,
                'nama_prodi' => $request->nama_prodi_baru,
                'fk_id_fakultas' => $request->selected_fakultas_prodi_baru,
            ]);
        return redirect('/listProdi')->with('message', 'Data Program Studi Berhasil Di Update');
    }

    public function delete($id){
        $prodi = Prodi::find($id);
        $prodi -> delete();
        return redirect('/listProdi')->with('message', 'Data Program Studi Berhasil Di Hapus');
    }
}
