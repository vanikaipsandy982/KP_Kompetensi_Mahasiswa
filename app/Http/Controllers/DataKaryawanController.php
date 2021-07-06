<?php

namespace App\Http\Controllers;

use App\Models\Data_karyawan;
use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataKaryawanController extends Controller
{
    public function index()
    {
        $data_karyawan = Data_karyawan::whereHas('karyawanJabatan',function($query){
            $query->where('nama_jabatan','=','Karyawan');
    })->get();
        $jabatan = Jabatan::where('nama_jabatan','=','Karyawan')->get();
        $user = User::whereHas('userRole',function ($query){
            $query->where('name','=','superadmin');
        })->get();
        return view('data_karyawan.index',compact('data_karyawan','jabatan','user'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'idKaryawan' => 'required',
            'namaKaryawan' => 'required',
            'emailKaryawan' => 'required',
            'tglLahir' => 'required',
            'notelpKaryawan' => 'required',
            'alamatKaryawan' => 'required',
            'agama' => 'required',
            'gender' => 'required'
        ]);

        $data_karyawan = new Data_karyawan();
        $data_karyawan->id_karyawan = $request->idKaryawan;
        $data_karyawan->nama_karyawan = $request->namaKaryawan;
        $data_karyawan->email_karyawan = $request->emailKaryawan;
        $data_karyawan->tgl_lahir = $request->tglLahir;
        $data_karyawan->alamat_karyawan = $request->alamatKaryawan;
        $data_karyawan->notelp_karyawan = $request->notelpKaryawan;
        $data_karyawan->agama = $request->agama;
        $data_karyawan->jeniskelamin_karyawan = $request->gender;
        $jabatan = Jabatan::where('id','=',$request->jabatan)->first();
        $data_karyawan->fk_id_jabatan = $jabatan->id;
        $user = User::where('id','=',$request->user)->first();
        $data_karyawan->fk_id_user = $user->id;
        $data_karyawan->save();
        return redirect('/listKaryawan')->with('message', 'Berhasil Di Input');
    }

    public function update(Request $request){
        Data_karyawan::find($request->editKaryawan)
            ->update([
                'id_karyawan'=> $request->idKaryawanBaru,
                'nama_karyawan'=> $request->namaKaryawanBaru,
                'email_karyawan'=> $request->emailKaryawanBaru,
                'alamat_karyawan'=> $request->alamatKaryawanBaru,
                'notelp_karyawan'=> $request->notelpKaryawanBaru,
                'agama'=> $request->agamaBaru
            ]);
        return redirect()->back()->with('message', 'Berhasil Di Update');
    }

    public function delete($id){
        $data_karyawan = Data_karyawan::find($id);
        $data_karyawan -> delete();
        return redirect('/listKaryawan')->with('message', 'Berhasil Di Hapus');
    }
}
