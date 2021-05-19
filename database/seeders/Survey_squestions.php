<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Survey_squestions extends Seeder
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
                'id'=>'444521',
                'question'=>'test',
                'created_at'=>'08-07-2016',
                'updated_at'=>'08-02-2017',
                'cat_squestions_id'=>'512249'
            ]
        ];
        foreach ($data as $value) {
            $survey_squestions = new \App\Models\survey_squestions();
            $survey_squestions->id = $value['id'];
            $survey_squestions->question = $value['question'];
            $survey_squestions->created_at = $value['created_at'];
            $survey_squestions->updated_at = $value['update_at'];
            $survey_squestions->cat_squestions_id = $value ['512249'];
            $survey_squestions->save;
        }
    }
}
