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
                'forum_id'=>'444302',
                'artikel'=>'test artikel',
                'berita'=>'test berita',
                'created_at'=>'29-09-2020',
                'updated_at'=>'15-12-2020',
                'id_user_survey'=>'158999',
                'users_id'=>'2810012'
            ]
        ];
        foreach($data as $value){
            $forum = new \App\Models\forums();
            $forum->forum_id = $value['forum_id'];
            $forum->artikel = $value['artikel'];
            $forum->berita = $value['berita'];
            $forum->created_at = $value['created_at'];
            $forum->update_at = $value['updated_at'];
            $forum->id_user_survey = $value['id_user_survey'];
            $forum->users_id = $value['users_id'];
            $forum->save;
        }
    }
}
