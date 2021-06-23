<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use App\Models\survey;
use App\Models\survey_squestions;
use App\Models\hasil_survey;
use Illuminate\Http\Request;
use App\Http\Requests\HasilRadioRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Array_;

class IsiSurveyController extends Controller
{
    protected $detailCategory;
    public function __construct()
    {
        $this->detailCategory = ['ASESMEN KEMAMPUAN
                PENGEMBANGAN DIRI MAHASISWA','ASESMEN KEPUASAN
                PENGEMBANGAN DIRI MAHASISWA'];
    }

    public function index()
    {
        $fakultas = Fakultas::all();
        $prodi = Prodi::all();
        return view('survey.isiSurvey',compact('fakultas','prodi'));
    }
    public function category()
    {
        $catpertanyaan = survey::all();
        $detSurvey = $this->detailCategory;
        return view('survey.surveyCat1',compact('catpertanyaan','detSurvey'));
    }


    public function hasilsurvey()
    {
//        $pertanyaan = survey_squestions::select('survey_squestions.id_survey',
//                'surveys.survey_name', 'survey_squestions.question', 'surveys.id',
//                'survey_squestions.id AS nomor','hasil_surveys.skor_kepuasan','hasil_surveys.skor_kemampuan',
//                'hasil_surveys.selisih', 'hasil_surveys.rata_rata', 'hasil_surveys.keterangan')
//            ->join('surveys', 'survey_squestions.id_survey', '=', 'surveys.id')
//            ->join('hasil_surveys', 'survey_squestions.id', '=', 'hasil_surveys.fk_id_squestion')
////            ->where('survey_squestions.id_survey','=','surveys.id')
//            ->get();
        $sumRatKem=0;
        $sumRatKep=0;
        $counting=0;
        $hitung=0;
        $tampungRataRataKem= array();
        $tampungRataRataKep= array();
        $uid= Auth::user()->id;

        $pertanyaan = hasil_survey::select('hasil_surveys.skor_kepuasan','surveys.id','hasil_surveys.fk_id_survey',
            'hasil_surveys.skor_kemampuan',
            'survey_squestions.question',
            'surveys.survey_name',
            'hasil_surveys.selisih',
            'hasil_surveys.rata_rata',
            'hasil_surveys.keterangan')
            ->join('surveys','hasil_surveys.fk_id_survey','=','surveys.id')
            ->join('survey_squestions','hasil_surveys.fk_id_squestion','=','survey_squestions.id')
//            ->where('hasil_surveys.id','<',43)
            ->where('hasil_surveys.fk_id_user','=',$uid)

            ->get();
        return view('survey.hasilsurvey',compact('pertanyaan','sumRatKem',
            'sumRatKep','counting', 'hitung', 'tampungRataRataKem', 'tampungRataRataKep'));
    }

    public function save(Request $request)
    {
//      0 = Kemampuan, 1 = Kepuasan
        $survey = survey::all();;
        foreach ($survey as $valuesurvey){
            foreach ($valuesurvey->survey_surveyquestion as $question){
                $question_id = $question->id;
                $survey_id = $valuesurvey->id;
                if ( $request->input("inlineRadioOptions_{$question_id}_1_{$survey_id}")){
                    $hasilsurvey = new hasil_survey();
                    $hasilsurvey->fk_id_survey= $survey_id;
                    $hasilsurvey->fk_id_squestion= $question_id;
                    $hasilsurvey->fk_id_user= Auth::user()->id;
                    $skor_kepuasan = $request->input("inlineRadioOptions_{$question_id}_1_{$survey_id}");
                    $skor_kemampuan = $request->input("inlineRadioOptions_{$question_id}_0_{$survey_id}");
                    $hasilsurvey->rata_rata= ($skor_kepuasan + $skor_kemampuan);
                    //belum beres
                    $hasilsurvey->skor_kepuasan= $skor_kepuasan;
                    $hasilsurvey->skor_kemampuan= $skor_kemampuan;
                    $hasilsurvey->selisih= $skor_kemampuan-$skor_kepuasan;
                    $hasilsurvey->keterangan= "sudah selesai";
                    $hasilsurvey->save();
                }

            }

        }
        return redirect('/hasilsurvey');
    }
}
