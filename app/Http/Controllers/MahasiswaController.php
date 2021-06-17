<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
//        $mahasiswa = Mahasiswa::all();
        $fakultas = Fakultas::all();
        $prodi = Prodi::all();
        $mahasiswa = Mahasiswa::select('mahasiswa.nrp',
            'mahasiswa.nama_mahasiswa',
            'Fakultas.nama_fakultas',
            'Prodi.nama_prodi',
            'mahasiswa.alamat_mahasiswa',
            'mahasiswa.jeniskel_mahasiswa',
            'mahasiswa.email_mahasiswa',
            'mahasiswa.telp_mahasiswa',
            'mahasiswa.tanggal_masuk',
            'mahasiswa.nama_orangtua',
            'mahasiswa.alamat_orangtua')
            ->join('Prodi', 'mahasiswa.fk_id_prodi', '=', 'Prodi.id')
            ->join('Fakultas', 'Prodi.fk_id_fakultas', '=', 'Fakultas.id')
            ->get();
        return view('mahasiswa.index', compact('mahasiswa', 'fakultas', 'prodi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return
     */
    public function create()
    {
        $fakultas = Fakultas::all();
        $prodi = Prodi::all();
        return view('mahasiswa.create', compact('fakultas', 'prodi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'nrp_mahasiswa_baru' => 'required',
            'nama_mahasiswa_baru' => 'required',
            'alamat_mahasiswa_baru' => 'required',
            'jenkel_mahasiswa_baru' => 'required',
            'tanggal_masuk_mahasiswa_baru' => 'required',
            'email_mahasiswa_baru' => 'required',
            'telp_mahasiswa_baru' => 'required',
            'ortu_mahasiswa_baru' => 'required',
            'alamat_ortu_mahasiswa_baru' => 'required',
        ]);
        $mahasiswa = new Mahasiswa;
        $mahasiswa->nrp = $request->nrp_mahasiswa_baru;
        $mahasiswa->nama_mahasiswa = $request->nama_mahasiswa_baru;
        $mahasiswa->email_mahasiswa = $request->email_mahasiswa_baru;
        $mahasiswa->telp_mahasiswa = $request->telp_mahasiswa_baru;
        $mahasiswa->alamat_mahasiswa = $request->alamat_mahasiswa_baru;
        $mahasiswa->jeniskel_mahasiswa = $request->jenkel_mahasiswa_baru;
        $mahasiswa->nama_orangtua = $request->ortu_mahasiswa_baru;
        $mahasiswa->tanggal_masuk = $request->tanggal_masuk_mahasiswa_baru;
        $mahasiswa->alamat_orangtua = $request->alamat_ortu_mahasiswa_baru;
        $mahasiswa->fk_id_prodi = $request->selected_prodi_mahasiswa_baru;
        $mahasiswa->save();

        return redirect('/listMahasiswa')->with('message', 'Data Mahasiswa Berhasil Di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
