<?php


namespace App\Http\Controllers;


use App\Models\Chief_Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChiefMentorController extends Controller
{
    public function index()
    {
        $chief_mentor = Chief_Mentor::all();
        return view('chiefmentor.index',compact('chief_mentor'));
    }

    public function store(Request $request){
        $request->validate([
            'catatanMentor' => 'required'
        ]);

        $chief_mentor = new Chief_Mentor;
        $chief_mentor->catatan_mentor = $request->catatanMentor;
        $chief_mentor->save();
        return redirect('/listChief')->with('message', 'Catatan Berhasil Di Input');
    }

    public function update($id, Request $request){
        Chief_Mentor::find($id)
            ->update([
                'catatan_mentor'=> $request->catatanMentorBaru
            ]);
        return redirect('/listChief')->with('message', 'Catatan Berhasil Di Update');
    }

    public function delete($id){
        $chief_mentor = Chief_Mentor::find($id);
        $chief_mentor -> delete();
        return redirect('/listChief')->with('message', 'Berhasil Di Hapus');
    }
}
