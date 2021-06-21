<?php

namespace Database\Seeders;

use App\Models\role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            ],
            [
                'username'=>'1872011',
                'password'=>'1872011',
                'user_role'=>'mentor'
            ],
            [
                'username'=>'dosen',
                'password'=>'dosen',
                'user_role'=>'dosen'
            ]
        ];
        foreach ($data as $value){
            $user = new \App\Models\User();
            $user->username = $value['username'];
            $user->password = Hash::make($value['password']);
            $role = role::where('name','=',$value['user_role'])->first();
            $user->fk_id_role = $role->id;
            $user->save();
        }
    }
}
