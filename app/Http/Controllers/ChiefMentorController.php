<?php


namespace App\Http\Controllers;


use App\Models\Chief_Mentor;
use App\Models\Data_karyawan;
use App\Models\Mahasiswa;
use App\Models\Pengelompokan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChiefMentorController extends Controller
{
    public function index()
    {
        $chief_mentor = Chief_Mentor::whereHas('mentorKaryawan',function($query){
            $query->where('fk_id_jabatan','=','1');
        })->get();
        $data_karyawan = Data_karyawan::whereHas('karyawanJabatan',function($query){
            $query->where('nama_jabatan','=','Dosen');
        })->get();
        $pengelompokan = Pengelompokan::all();
        return view('chiefmentor.index',compact('chief_mentor','data_karyawan','pengelompokan'));
    }

    public function get(Request $request)
    {
        $mahasiswa = [];
        $kelompok = Pengelompokan::where('fk_id_chief_mentor', '=', $request->id)->get();
        foreach ($kelompok as $data){
            foreach ($data->kelompokMahasiswa as $data2){
                if ($data2->mahasiswaUser->userRole->name == 'mentor'){
                    array_push($mahasiswa,$data2);
                }
            }
        }
        return response()->json($mahasiswa);
    }

    public function store(Request $request){
        $request->validate([
            'catatanMentor' => 'required'
        ]);

        $chief_mentor = new Chief_Mentor;
        $chief_mentor->catatan_mentor = $request->catatanMentor;
        $data_karyawan = Data_karyawan::where('id','=',$request->karyawan)->first();
        $chief_mentor->fk_id_karyawan = $data_karyawan->id;
        $chief_mentor->save();
        return redirect('/listChief')->with('message', 'Catatan Berhasil Di Input');
    }

    public function update(Request $request){
        Chief_Mentor::find($request->catatanMentorEdit)
            ->update([
                'catatan_mentor'=> $request->catatanMentorBaru
            ]);
        error_log("test");
        return redirect()->back()->with('message', 'Catatan Berhasil Di Update');
    }

    public function delete($id){
        $chief_mentor = Chief_Mentor::find($id);
        $chief_mentor -> delete();
        return redirect('/listChief')->with('message', 'Berhasil Di Hapus');
    }
}
