<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'     => 'First Person',
            'email'    => 'first.person@gmail.com',
            'password' => Hash::make('Password123'),
        ]);

        $user->attachRole(Role::where('name', 'admin')->first());
    }
}
