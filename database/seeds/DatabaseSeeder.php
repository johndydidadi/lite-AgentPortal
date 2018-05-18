<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'firstname' => 'johndy',
            'lastname' =>'punay',
            'email' => 'johndy_punay@gmail.com',
            'username' => 'admin',
            'password' => 'admin',
            'role' => 'Admin'
        ]);
    }
}
