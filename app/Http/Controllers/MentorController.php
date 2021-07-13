<?php

namespace App\Http\Controllers;

use App\Models\Data_karyawan;
use App\Models\Fakultas;
use App\Models\Mahasiswa;
use App\Models\Pengelompokan;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fakultas = Fakultas::all();
        $prodi = Prodi::all();
        $pengelompokan = Pengelompokan::all();
        $mahasiswaMentor = Mahasiswa::whereHas('mahasiswaUser',function($query){
            $query->where('fk_id_role','=','3');
        })->get();
        $data_karyawan = Data_karyawan::whereHas('karyawanJabatan',function($query){
            $query->where('nama_jabatan','=','Dosen');
        })->get();
        return view('mentor.index', compact( 'fakultas', 'prodi', 'pengelompokan','mahasiswaMentor','data_karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fakultas = Fakultas::all();
        $prodi = Prodi::all();
        $kelompok = Pengelompokan::all();
        $data_karyawan = Data_karyawan::whereHas('karyawanJabatan',function($query){
            $query->where('nama_jabatan','=','Dosen');
        })->get();
        return view('mentor.create', compact('fakultas', 'prodi','data_karyawan','kelompok'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
            'nama_chief_baru'=>'required',
            'kelompok_baru'=>'required'
        ]);
        $user = new User();
        $user->username = $request->nrp_mahasiswa_baru;
        $user->password = Hash::make($request->nrp_mahasiswa_baru);
        $user->fk_id_role = 3;
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
        $mahasiswa->nama_chief = $request->nama_chief_baru;
        $mahasiswa->fk_id_kelompok = $request->kelompok_baru;
        $mahasiswa->fk_id_user = $user->id;
        $mahasiswa->save();

        return redirect('/listMentor')->with('message', 'Data Mentor Berhasil Di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
        $data_karyawan = Data_karyawan::whereHas('karyawanJabatan',function($query){
            $query->where('nama_jabatan','=','Dosen');
        })->get();
        $kelompok = Pengelompokan::all();
        return view('mentor.edit', compact('mhs', 'mahasiswa', 'fakultas', 'prodi','data_karyawan','kelompok'));
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
            'nama_chief_baru' =>'required',
            'kelompok_baru'=>'required'
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
                'nama_chief'=> $request->nama_chief_baru,
                'fk_id_kelompok'=> $request->kelompok_baru
            ]);
        return redirect('/listMentor')->with('message', 'Data Mentor Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $mhs = Mahasiswa::find($id);
        $mhs->delete();
        return redirect('/listMentor')->with('message', 'Data Mentor Berhasil dihapus');
    }
}
