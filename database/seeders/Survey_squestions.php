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
            [
                'survey_name'=>'MOVING THROUGH AUTONOMY TOWARD INTERDEPENCY',
                'squestions'=>[
                    ['question'=>'Kemampuan mengatasi rasa rindu kepada keluarga/orangtua'],
                    ['question'=>'Kemampuan mengelola waktu'],
                    ['question'=>'Kemampuan mengelola uang'],
                    ['question'=>'Kemampuan mengatasi tekanan dari teman sebaya'],
                    ['question'=>'Lemampuan menyelesaikan masalah '],
                    ['question'=>'Kemampuan membuat keputusan'],
                    ['question'=>'Pengalaman bekerja'],
                    ['question'=>'Melakukan hobi yang bermanfaat'],
                    ['question'=>'Menjalin hubungan yang baik dengan orangtua'],
                ],
            ],
            [
                'survey_name'=>'DEVELOPING MATURE INTERPERSONAL RELATIONSHIP',
                'squestions'=>[
                    ['question'=>'Kemampuan bekerjasama dalam kelompok'],
                    ['question'=>'Kemampuan dalam memimpin '],
                    ['question'=>'Menjalin relasi dengan sesama jenis'],
                    ['question'=>'Menjalinrelasi dengan lawan jenis'],
                    ['question'=>'Pemahaman tentang prinsip yang berhubungan dengan keintiman secara seksual'],
                    ['question'=>'Kemampuan menolong orang lain '],
                    ['question'=>'Melakukan toleransi dan penghargaan terhadap perbedaan budaya, suku, kepribadian keterbatasan fisik/psikis'],
                ],
            ],
            [
                'survey_name'=>'ESTABLISHING IDENTITY',
                'squestions'=>[
                    ['question'=>'Pemahaman mengenai diri sendiri'],
                    ['question'=>'Kemampuan mengevaluasi diri'],
                    ['question'=>'Penerapan keyakinan akan nilai-nilai religius'],
                    ['question'=>'Penerapan keyakinan akan nilai-nilai hidup pribadi'],
                ],
            ],
            [
                'survey_name'=>'DEVELOPING PURPOSE',
                'squestions'=>[
                    ['question'=>'Kemampuan merencanakan masa depan'],
                    ['question'=>'Menerapkan strategi dalam mencari pekerjaan'],
                    ['question'=>'Keterlibatan dalam bakti sosial'],
                    ['question'=>'Menetapkan tujuan hidup yang jelas'],
                ],
            ],
            [
                'survey_name'=>'DEVELOPING INTEGRITY',
                'squestions'=>[
                    ['question'=>'Berpegang pada komitmen'],
                    ['question'=>'Kemampuan merencanakan dan mencapai tujuan yang telah dibuat'],
                    ['question'=>'Menampilkan cara hidup yang mencerminkan norma dan kepercayaan yang diyakini'],
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
