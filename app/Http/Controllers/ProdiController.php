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
//        $result = Prodi::with('prodiFakultas')->get();
        $prodi = Prodi::with('prodiFakultas')->get();
//        $result->all();
        return view('prodi.index', compact('prodi', 'fakultas'));
    }

    public function store(Request $request){
        $request->validate([
            'kodeProdi' => 'required',
            'namaProdi' => 'required'
        ]);

        $prodi = new Prodi;
        $fakultas = Fakultas::where('id','=',$request->fakultasSelected)->first();
        $prodi->fk_id_fakultas = $fakultas->id;
        $prodi->id_prodi = $request->kodeProdi;
        $prodi->nama_prodi = $request->namaProdi;
        $prodi->save();
        return redirect('/listProdi')->with('message', 'Data Program Studi Berhasil Di Input');
    }

    public function update(Request $request, $id){
        Prodi::where('id', $id)
            ->update([
                'nama_prodi'=> $request->namaProdiBaru
            ]);
        return redirect('/listProdi')->with('message', 'Data Program Studi Berhasil Di Update');
    }
}
