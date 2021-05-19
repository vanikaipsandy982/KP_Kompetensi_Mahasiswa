<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class permissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'permission_id'=>'222551',
                'name'=>'admin',
                'created_at'=>'09-09-2018',
                'updated_at'=>'23-04-2021'
            ],
        ];
        foreach($data as $value){
            $permissions = new \App\Models\permissions();
            $permissions->permission_id = $value['permission_id'];
            $permissions->name = $value['name'];
            $permissions->created_at = $value['created_at'];
            $permissions->updated_at = $value['updated_at'];
            $permissions->save;
        }
    }
}
