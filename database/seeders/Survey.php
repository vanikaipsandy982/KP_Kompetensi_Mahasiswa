<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Survey extends Seeder
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
                'id_survey'=>'25511',
                'survey_name'=>'test survey',
                'created_at'=>'12-02-2017',
                'updated_at'=>'25-05-2018'
            ]
        ];
        foreach ($data as $value) {
            $survey = new \App\Models\survey();
            $survey->id_survey = $value['id_survey'];
            $survey->survey_name = $value['survey_name'];
            $survey->created_at = $value['created_at'];
            $survey->updated_at = $value['updated_at'];
            $survey->save;
        }
    }
}
