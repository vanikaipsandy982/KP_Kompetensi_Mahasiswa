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
                'username'=>'123'
            ]
        ];
        foreach($data as $value){
            $forum = new \App\Models\forums();
            $forum->artikel = $value['artikel'];
            $forum->berita = $value['berita'];
            $user = \App\Models\Users::where('username','=',$value['username'])->first();
            $forum->fk_id_user=$user->id;
            $forum->save();
        }
    }
}
