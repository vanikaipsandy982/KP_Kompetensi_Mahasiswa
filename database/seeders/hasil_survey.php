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
                'rata_rata'=>'2929qaa'
            ]
        ];
        foreach ($data as $value) {
            $hasil_survey = new \App\Models\hasil_survey();
            $hasil_survey->rata_rata = $value['rata_rata'];
            $hasil_survey->save();
        }
    }
}
