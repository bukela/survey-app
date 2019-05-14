<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Role::class)->create([
            'name' => 'Super Admin',
            'code' => 'super-admin',
        ]);

        factory(\App\Role::class)->create([
            'name' => 'Manager',
            'code' => 'manager',
        ]);

        factory(\App\Role::class)->create([
            'name' => 'Doctor',
            'code' => 'doctor',
        ]);
    }
}
