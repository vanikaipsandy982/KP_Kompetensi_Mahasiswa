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
                'name'=>'admin'
            ],
        ];
        foreach($data as $value){
            $permissions = new \App\Models\permissions();
            $permissions->name = $value['name'];
            $permissions->save();
        }
    }
}
