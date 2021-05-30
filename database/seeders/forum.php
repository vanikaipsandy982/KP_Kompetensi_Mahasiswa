<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class forum extends Seeder
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
                'artikel'=>'test artikel',
                'berita'=>'test berita',
                'id_user_survey'=>'158999',
                'users_id'=>'2810012'
            ]
        ];
        foreach($data as $value){
            $forum = new \App\Models\forums();
            $forum->artikel = $value['artikel'];
            $forum->berita = $value['berita'];
            $forum->id_user_survey = $value['id_user_survey'];
            $forum->users_id = $value['users_id'];
            $forum->save();
        }
    }
}
