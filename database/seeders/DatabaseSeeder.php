<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RolePermissionSeeder::class);
        $this->call(UserRoleSeeder::class);
        $this->call(Jabatan::class);
        $this->call(ChiefMentor_KaryawanSeeder::class);
        $this->call(Fakultas::class);
        $this->call(Prodi::class);
        $this->call(MahasiswaSeeder::class);
        $this->call(Pengelompokan::class);
        $this->call(Jadwal_Mentoring::class);
        $this->call(forum::class);
        $this->call(Survey_squestions::class);
    }
}
