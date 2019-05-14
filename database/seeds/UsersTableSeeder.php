<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = \App\Role::whereCode('super-admin')->first();

        factory(\App\User::class)->create([
            'role_id' => $role->id,
            'name' => 'Super Admin',
            'email' => 'super-admin@domain.com',
            'password' => bcrypt('seCret12#'),
        ]);
    }
}
