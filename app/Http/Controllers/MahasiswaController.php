<?php

namespace App\Http\Controllers;

use App\Exports\MahasiswaExpo;
use App\Exports\MahasiswaExport;
use App\Imports\MahasiswaImpo;
use App\Imports\MahasiswaImport;
use App\Models\Fakultas;
use App\Models\Mahasiswa;
use App\Models\Pengelompokan;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $fakultas = Fakultas::all();
        $prodi = Prodi::all();
        $pengelompokan = Pengelompokan::all();
//        $mahasiswa = Mahasiswa::all();
        $mahasiswa = Mahasiswa::select('mahasiswa.id',
            'mahasiswa.nrp',
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
        return view('mahasiswa.index', compact('mahasiswa', 'fakultas', 'prodi', 'pengelompokan'));
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
        $user = new User();
        $user->username = $request->nrp_mahasiswa_baru;
        $user->password = Hash::make($request->nrp_mahasiswa_baru);
        $user->fk_id_role = 2;
        $user->save();

        $mahasiswa = new Mahasiswa();
        $mahasiswa->nrp = $request->nrp_mahasiswa_baru;
        $mahasiswa->nama_mahasiswa = $request->nama_mahasiswa_baru;
        $mahasiswa->fk_id_prodi = $request->selected_prodi_mahasiswa_baru;
        $mahasiswa->alamat_mahasiswa = $request->alamat_mahasiswa_baru;
        $mahasiswa->jeniskel_mahasiswa = $request->jenkel_mahasiswa_baru;
        $mahasiswa->email_mahasiswa = $request->email_mahasiswa_baru;
        $mahasiswa->telp_mahasiswa = $request->telp_mahasiswa_baru;
        $mahasiswa->tanggal_masuk = $request->tanggal_masuk_mahasiswa_baru;
        $mahasiswa->nama_orangtua = $request->ortu_mahasiswa_baru;
        $mahasiswa->alamat_orangtua = $request->alamat_ortu_mahasiswa_baru;
        $mahasiswa->fk_id_user = $user->id;
        $mahasiswa->save();

        return redirect('/listMahasiswa')->with('message', 'Data Mahasiswa Berhasil Di Input');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mhs = Mahasiswa::find($id);
        $mahasiswa = Mahasiswa::select('mahasiswa.id', 'Prodi.id AS ProdiID', 'Fakultas.id AS FakultasID',
            'mahasiswa.nrp',
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
            ->where('mahasiswa.id', '=', $id)
            ->get();
        $fakultas = Fakultas::all();
        $prodi = Prodi::all();
        return view('mahasiswa.edit', compact('mhs', 'mahasiswa', 'fakultas', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
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
            'alamat_ortu_mahasiswa_baru' => 'required'
        ]);

        Mahasiswa::where('id', $id)
            ->update([
                'nrp' => $request->nrp_mahasiswa_baru,
                'nama_mahasiswa' => $request->nama_mahasiswa_baru,
                'email_mahasiswa' => $request->email_mahasiswa_baru,
                'telp_mahasiswa' => $request->telp_mahasiswa_baru,
                'alamat_mahasiswa' => $request->alamat_mahasiswa_baru,
                'jeniskel_mahasiswa' => $request->jenkel_mahasiswa_baru,
                'tanggal_masuk' => $request->tanggal_masuk_mahasiswa_baru,
                'nama_orangtua' => $request->ortu_mahasiswa_baru,
                'alamat_orangtua' => $request->alamat_ortu_mahasiswa_baru,
                'fk_id_prodi' => $request->selected_prodi_mahasiswa_baru,
            ]);
        return redirect('/listMahasiswa')->with('message', 'Data Mahasiswa Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function delete($id)
    {
        $mhs = Mahasiswa::find($id);
        $mhs->delete();
        return redirect('/listMahasiswa')->with('message', 'Data Mahasiswa Berhasil dihapus');
    }

    public function exportz()
    {
        return Excel::download(new MahasiswaExpo, 'mahasiswa.xlsx');
    }

    public function import(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();

        $path = $file->move('file_mahasiswa',$nama_file);

        // import data
        $import = Excel::import(new MahasiswaImpo, public_path('/file_mahasiswa/'.$nama_file));

        Storage::delete($path);

        if($import){
            return redirect('/listMahasiswa')->with('message', 'Data Mahasiswa Berhasil Di Import');
        }else{
            return redirect('/listMahasiswa')->with('message', 'Data Mahasiswa Gagal Di Import');
        }
    }
}
