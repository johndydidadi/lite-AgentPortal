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
        	'firstname' => 'John Dy',
            'middlename' => 'o',
            'lastname' => 'Punay',
            'email' => 'johndy_punay@gmail.com',
            'username' => 'admin',
            'password' => 'admin'
        ]);
    }
}
