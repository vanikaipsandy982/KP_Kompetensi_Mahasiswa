<?php

namespace App\Http\Controllers;

use App\Models\Data_karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataKaryawanController extends Controller
{
    public function index()
    {
        $data_karyawan = Data_karyawan::whereHas('karyawanJabatan',function($query){
            $query->where('nama_jabatan','=','Karyawan');
    })->get();
        return view('data_karyawan.index',compact('data_karyawan'));
    }
}
