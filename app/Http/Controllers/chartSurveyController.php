<?php

namespace App\Http\Controllers;

use App\Models\hasil_survey;
use Illuminate\Http\Request;

class chartSurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("/survey.chartSurvey");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hasilsurvey()
    {
        $sumRatKem=0;
        $sumRatKep=0;
        $counting=0;
        $pertanyaan = hasil_survey::select('hasil_surveys.skor_kepuasan','surveys.id','hasil_surveys.fk_id_survey',
            'hasil_surveys.skor_kemampuan',
            'survey_squestions.question',
            'surveys.survey_name',
            'hasil_surveys.selisih',
            'hasil_surveys.rata_rata',
            'hasil_surveys.keterangan')
            ->join('surveys','hasil_surveys.fk_id_survey','=','surveys.id')
            ->join('survey_squestions','hasil_surveys.fk_id_squestion','=','survey_squestions.id')
            ->where('hasil_surveys.id','<',43)
            ->where('hasil_surveys.id','>',1)
            ->get();
        return view('survey.chartSurvey',compact('pertanyaan','sumRatKem','sumRatKep','counting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
