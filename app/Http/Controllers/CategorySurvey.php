<?php

namespace App\Http\Controllers;

use App\Models\hasil_survey;
use App\Models\survey;
use App\Models\survey_squestions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CategorySurvey extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catpertanyaan = survey::all();;
        $pertanyaan = survey_squestions::all();
        return view('survey.categorySurvey',compact('pertanyaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $survey = survey::all();;
        $hasilSurvey= new hasil_survey();
        $surveySquestions= new survey_squestions();

        $pertanyaan = survey_squestions::select('survey_squestions.id_survey',
            'surveys.survey_name', 'survey_squestions.question', 'surveys.id',
            'survey_squestions.id AS nomor','hasil_surveys.skor_kepuasan','hasil_surveys.skor_kemampuan',
            'hasil_surveys.selisih', 'hasil_surveys.rata_rata', 'hasil_surveys.keterangan')
            ->join('surveys', 'survey_squestions.id_survey', '=', 'surveys.id')
            ->join('hasil_surveys', 'survey_squestions.id', '=', 'hasil_surveys.fk_id_squestion')
//            ->where('survey_squestions.id_survey','=','surveys.id')
            ->get();
//        for($i=1; $i<=count(); $i++){
//            $hasilSurvey->skor_kemampuan= $request->inlineRadioOptions+$i;
//            $hasilSurvey->survey_name= $pertanyaan->survey_name;
//            $hasilSurvey->question= $pertanyaan->question;
//            $hasilSurvey->keterangan= "-";
//            $hasilSurvey->skor_kepuasan= "-";
//            $hasilSurvey->selisih= "-";
//            $hasilSurvey->rata_rata= "-";
//            $hasilSurvey->username= "123";
//
//        }
        return view('survey.hasilsurvey',compact('pertanyaan'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
