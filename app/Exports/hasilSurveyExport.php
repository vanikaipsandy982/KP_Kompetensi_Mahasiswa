<?php

namespace App\Exports;

use App\Models\hasil_survey;
use App\Models\survey_squestions;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class hasilSurveyExport implements FromCollection,WithMapping,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
//        $hasilSurvey= DB::table('hasil_surveys')
//            ->select('survey_squestions.id',
//            'surveys.survey_name', 'survey_squestions.question', 'surveys.id',
//            'survey_squestions.id AS nomor','hasil_surveys.skor_kepuasan','hasil_surveys.skor_kemampuan',
//            'hasil_surveys.selisih', 'hasil_surveys.rata_rata', 'hasil_surveys.keterangan')
//            ->join('surveys', 'survey_squestions.id_survey', '=', 'surveys.id')
//            ->join('hasil_surveys', 'survey_squestions.id', '=', 'hasil_surveys.fk_id_squestion')
//            ->where('survey_squestions.id_survey','=','surveys.id')
//            ->get();
        $pertanyaan = hasil_survey::select('hasil_surveys.skor_kepuasan','surveys.id','hasil_surveys.fk_id_survey',
            'hasil_surveys.skor_kemampuan',
            'survey_squestions.question',
            'surveys.survey_name',
            'hasil_surveys.selisih',
            'hasil_surveys.rata_rata',
            'hasil_surveys.keterangan')
            ->join('surveys','hasil_surveys.fk_id_survey','=','surveys.id')
            ->join('survey_squestions','hasil_surveys.fk_id_squestion','=','survey_squestions.id')
            ->where('hasil_surveys.id','>',41)
            ->get();
        return $pertanyaan;
    }

    public function headings(): array
    {
        return[
            "ID",
            "Survey Name",
            "Area Pengembangan",
            "skor_kemampuan",
            "skor_kepuasan",
            "Selisih",
            "Keterangan",
            "RATA RATA"
        ];
    }

    public function map($hasilSurvey): array
    {
        return[
            $hasilSurvey->id,
            $hasilSurvey->survey_name,
            $hasilSurvey->question,
            $hasilSurvey->skor_kemampuan,
            $hasilSurvey->skor_kepuasan,
            $hasilSurvey->selisih,
            $hasilSurvey->keterangan,
            $hasilSurvey->rata_rata,

        ];    }
}
