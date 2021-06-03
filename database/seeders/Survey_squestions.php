<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Survey_squestions extends Seeder
{
    public static function get()
    {
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
                'survey_name'=>'DEVELOPING COMPETENCE',
                'squestions'=>[
                    ['question'=>'Kemampuan dalam menghadapi evaluasi belajar (kuis/UTS/UAS) secara umum'],
                    ['question'=>'Ketrampilan belajar  (study techniques)'],
                    ['question'=>'Kemampuan memahami bahan kuliah'],
                    ['question'=>'Kemampuan membuat catatan materi kuliah'],
                    ['question'=>'Kemampuan mengerjakan soal ujian'],
                    ['question'=>'Kemampuan berpikir kritis'],
                    ['question'=>'Terlibat dalam kegiatan kampus'],
                    ['question'=>'Kemampuan memulai pertemanan'],
                    ['question'=>'Keterampilan berkomunikasi'],
                    ['question'=>'Kemampuan membina relasi dengan lawan jenis/berpacaran'],
                ],
            ],
            [
                'survey_name'=>'MANAGING EMOTION',
                'squestions'=>[
                    ['question'=>'Kemampuan menyelesaikan konflik'],
                    ['question'=>'Kemampuan mengungkapkan perasaan tanpa menyakiti orang lain'],
                    ['question'=>'Kemampuan mengendalikan amarah'],
                    ['question'=>'Kemampuan mengatasi tekanan'],
                ],
            ],
        ];
        foreach ($data as $value) {
            $survey = new \App\Models\survey();
            $survey->survey_name = $value['survey_name'];
            $survey->save();
            foreach ($value['squestions'] as $valuesquestion){
                $value_squestion = new \App\Models\survey_squestions();
                $value_squestion->question = $valuesquestion['question'];
                $value_squestion->id_survey = $survey->id;
                $value_squestion->save();
            }
        }
    }
}
