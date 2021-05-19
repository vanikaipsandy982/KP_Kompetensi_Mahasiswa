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
                'id_users'=>'2810012',
                'username'=>'testusername',
                'password'=>'test123',
                'email_verified'=>'28-01-2019',
                'created_at'=>'28-01-2019',
                'updated_at'=>'01-02-2020'
            ],
        ];
        foreach ($data as $value){
            $user = new \App\Models\Users();
            $user->id_users = $value['id_users'];
            $user->username = $value['username'];
            $user->password = $value['password'];
            $user->email_verified = $value['email_verified'];
            $user->created_at = $value['created_at'];
            $user->update_at = $value['update_at'];
            $user->save;
        }
    }
}
