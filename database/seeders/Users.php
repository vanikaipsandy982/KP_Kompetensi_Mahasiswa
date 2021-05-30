<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Users extends Seeder
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
                'username'=>'123',
                'password'=>'123',
                'id_role'=>'1'
            ],
        ];
        foreach ($data as $value){
            $user = new \App\Models\Users();
            $user->username = $value['username'];
            $user->password = $value['password'];
            $user->id_role = $value['id_role'];
            $user->save();
        }
    }
}
