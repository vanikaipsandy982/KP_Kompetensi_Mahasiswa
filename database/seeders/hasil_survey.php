<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class hasil_survey extends Seeder
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
                'id'=>'55612',
                'rata_rata'=>'2929qaa',
                'created_at'=>'21-02-2018',
                'updated_at'=>'15-02-2019',
                'cat_squestions_id'=>'52811229',
                'survey_id'=>'12999'
            ]
        ];
        foreach ($data as $value) {
            $hasil_survey = new \App\Models\hasil_survey();
            $hasil_survey->id = $value['id'];
            $hasil_survey->rata_rata = $value['rata_rata'];
            $hasil_survey->created_at = $value['21-02-2018'];
            $hasil_survey->updated_at = $value['15-02-2019'];
            $hasil_survey->cat_squestions_id = $value['cat_squestions_id'];
            $hasil_survey->survey_id = $value['survey_id'];
            $hasil_survey->save;
        }
    }
}
