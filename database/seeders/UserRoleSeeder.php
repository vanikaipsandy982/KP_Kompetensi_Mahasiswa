<?php

namespace Database\Seeders;

use App\Models\role;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
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
                'user_role'=>'superadmin'
            ],
            [
                'username'=>'111',
                'password'=>'111',
                'user_role'=>'user'

            ]
        ];
        foreach ($data as $value){
            $user = new \App\Models\Users();
            $user->username = $value['username'];
            $user->password = $value['password'];
            $role = role::where('name','=',$value['user_role'])->first();
            $user->fk_id_role = $role->id;
            $user->save();
        }
    }
}
