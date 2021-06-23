<?php

namespace App\Http\Controllers;

use App\Exports\hasilSurveyExport;
use App\Models\survey;
use App\Models\survey_squestions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SurveyController extends Controller
{
    public function index()
    {
        return view('survey.isiSurvey');
    }
    public function showSurvey()
    {
        $showCat= survey::all();
        return view('survey.editSurvey', compact('showCat')) ;
    }
    public function detailSurvey($id)
    {
        $no=1;
        $judul= survey::select('survey_name','id')
            ->where('id','=',$id)
            ->get();
        $showPertanyaan= survey_squestions::select('survey_squestions.fk_id_survey',
            'surveys.survey_name', 'survey_squestions.question', 'surveys.id',
            'survey_squestions.id AS nomor')
            ->join('surveys', 'survey_squestions.fk_id_survey', '=', 'surveys.id')
            ->where('survey_squestions.fk_id_survey','=', $id)
            -> orderBy('nomor', 'ASC')
            ->get();
        return view('survey.lihatPertanyaan', compact('showPertanyaan','no','judul')) ;
    }
    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required'
        ]);

        $survey_ques = new survey_squestions();
        $survey_ques->fk_id_survey=$request->id;
        $survey_ques->question= $request->pertanyaan;
        $survey_ques->save();
        return redirect('/lihat_survey'.$request->id)->with('message', 'Data Pertanyaan Berhasil Di Input');
    }
    public function delete($nomor,$id){
        $survey_ques = survey_squestions::find($nomor);
        $survey_ques -> delete();
        return redirect('/lihat_survey'.$id)->with('message', 'Data Program Studi Berhasil Di Hapus');
    }
    public function edit($id)
    {
        $sry = survey_squestions::find($id);
        $judul= survey::select('survey_name','id')
            ->where('id','=',$id)
            ->get();
        $updatePertanyaan= survey_squestions::select('survey_squestions.question')
            ->where('id','=', $id)
            ->get();

        return view('survey.updatePertanyaan', compact('updatePertanyaan', 'judul','sry'));
    }
    public function update(Request $request, $id, $nomor)
    {
        $request->validate([
            'txtquestion' => 'required',
        ]);

        survey_squestions::where('id', $id)
            ->update([
                'question' => $request->txtquestion,
            ]);
        return redirect('/lihat_survey'.$nomor)->with('message', 'Data Pertanyaan Berhasil Di Update');
    }
    public function export()
    {
        return Excel::download(new hasilSurveyExport, 'hasilSurvey.xlsx');
    }
}
