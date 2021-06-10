<?php

namespace App\Http\Controllers;

use App\Models\Data_karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataDosenController extends Controller
{
    public function index()
    {
        $data_dosen = Data_karyawan::whereHas('karyawanJabatan',function($query){
            $query->where('nama_jabatan','=','Dosen');
        })->get();
        return view('data_dosen.index',compact('data_dosen'));
    }
}
