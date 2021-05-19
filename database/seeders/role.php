<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class role extends Seeder
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
                'name'=>'test'
            ]
        ];
        foreach ($data as $value) {
            $role = new \App\Models\role();
            $role->role_id = $value['role_id'];
            $role->name = $value['name'];
            $role->save;
        }
    }
}
