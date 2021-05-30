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
                'survey_name'=>'test survey'
            ]
        ];
        foreach ($data as $value) {
            $survey = new \App\Models\survey();
            $survey->survey_name = $value['survey_name'];
            $survey->save();
        }
    }
}
