<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class role_has_permissions extends Seeder
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
                'role_id'=>'11444',
                'permission_id'=>'222551'
            ]
        ];
        foreach($data as $value){
            $role_id = new \App\Models\role();
            $permission_id = new \App\Models\permissions();
            $role_id->role_id = $value['role_id'];
            $permission_id->permission_id = $value['permission_id'];
            $role_id->save;
            $permission_id->save;
        }
    }
}
