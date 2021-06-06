<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HasilSurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
                [
                    'keterangan'=>'test keterangan',
                    'skor_kepuasan'=>5,
                    'skor_kemampuan'=>10,
                    'selisih'=>2,
                    'rata_rata'=>20,
                    'username'=>'123',
                    'survey_name'=>'DEVELOPING COMPETENCE',
                    'question'=>'Kemampuan dalam menghadapi evaluasi belajar (kuis/UTS/UAS) secara umum'
                ]
            ];
            foreach($data as $value) {
                $hasilsurvey = new \App\Models\hasil_survey();
                $hasilsurvey->rata_rata = $value['rata_rata'];
                $hasilsurvey->keterangan = $value['keterangan'];
                $hasilsurvey->selisih = $value['selisih'];
                $hasilsurvey->skor_kepuasan = $value['skor_kepuasan'];
                $hasilsurvey->skor_kemampuan = $value['skor_kemampuan'];
                $survey = \App\Models\survey::where('survey_name','=',$value['survey_name'])->first();
                $hasilsurvey->fk_id_survey=$survey->id;
                $survey_squestion = \App\Models\survey_squestions::where('question','=',$value['question'])->first();
                $hasilsurvey->fk_id_squestion=$survey_squestion->id;
                $user = \App\Models\Users::where('username','=',$value['username'])->first();
                $hasilsurvey->fk_id_user=$user->id;
                $hasilsurvey->save();
            }
    }
}
