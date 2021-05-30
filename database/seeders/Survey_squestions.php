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
                'question'=>'Berapa 1 tambah 1?'
            ]
        ];
        foreach ($data as $value) {
            $survey_squestions = new \App\Models\survey_squestions();
            $survey_squestions->question = $value['question'];
            $survey_squestions->save();
        }
    }
}
