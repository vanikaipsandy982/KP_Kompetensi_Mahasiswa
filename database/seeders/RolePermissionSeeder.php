<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
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
                'name'=>'superadmin',
                'role_permission'=>
                    [
                        ['name' =>'akses data survey'],
                        ['name'=>'akses data mahasiswa'],
                        ['name'=>'isi survey']
                    ]
            ],
            [
                'name'=>'user',
                'role_permission'=>
                    [
                        ['name'=>'isi survey']
                    ]
            ],

            [
                'name'=>'mentor',
                'role_permission'=>
                    [
                        ['name'=>'isi survey']
                    ]
            ]
        ];
        foreach ($data as $value) {
            $role = new \App\Models\role();
            $role->name = $value['name'];
            $role->save();
            foreach ($value['role_permission'] as $value_child){
                $permissions = new \App\Models\permissions();
                $permissions->name =$value_child['name'];
                $permissions->save();
                $role->rolePermission()->attach($permissions->id);
            }
        }
    }
}
