<?php

namespace App\Exports;

use App\Models\hasil_survey;
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
        $hasilSurvey = DB::table('hasil_surveys')
            ->join('surveys', 'survey_squestions.id_survey', '=', 'surveys.id')
            ->join('hasil_surveys', 'survey_squestions.id', '=', 'hasil_surveys.fk_id_squestion')
            ->SELECT('survey_squestions.id_survey',
                'surveys.survey_name', 'survey_squestions.question', 'surveys.id',
                'survey_squestions.id AS nomor','hasil_surveys.skor_kepuasan','hasil_surveys.skor_kemampuan',
                'hasil_surveys.selisih', 'hasil_surveys.rata_rata', 'hasil_surveys.keterangan')->get();
        return $hasilSurvey;
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
            $hasilSurvey->nomor,
            $hasilSurvey->survey_name,
            $hasilSurvey->question,
            $hasilSurvey->skor_kemampuan,
            $hasilSurvey->skor_kepuasan,
            $hasilSurvey->selisih,
            $hasilSurvey->keterangan,
            $hasilSurvey->rata_rata,

        ];
    }
}
