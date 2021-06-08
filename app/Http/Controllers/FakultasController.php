<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FakultasController extends Controller
{
    public function index()
    {
        $fakultas = Fakultas::all();
        return view('fakultas.index',compact('fakultas'));
    }

    public function store(Request $request){
        $request->validate([
            'namaFakultas' => 'required'
        ]);

        $fakultas = new Fakultas;
        $fakultas->nama_fakultas = $request->namaFakultas;
        $fakultas->save();
        return redirect('/listFakultas')->with('message', 'Data Fakultas Berhasil Di Input');
    }

    public function update(Request $request, $id){
        Fakultas::where('id', $id)
            ->update([
               'nama_fakultas'=> $request->namaFakultasBaru
            ]);
        return redirect('/listFakultas')->with('message', 'Data Fakultas Berhasil Di Update');
    }

    public function delete($id){
        $fakultas = Fakultas::find($id);
        $fakultas -> delete();
        return redirect('/listFakultas')->with('message', 'Data Fakultas Berhasil Di Hapus');
    }
}
