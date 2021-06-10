<?php


namespace App\Http\Controllers;


use App\Models\Chief_Mentor;
use App\Models\Data_karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChiefMentorController extends Controller
{
    public function index()
    {
        $chief_mentor = Chief_Mentor::all();
        $data_karyawan = Data_karyawan::all();
        return view('chiefmentor.index',compact('chief_mentor','data_karyawan'));
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
