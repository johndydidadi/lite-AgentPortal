<?php
use App\Admin;
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
        Admin::create([
            'firstname' => 'admin',
            'middlename' => 'admin',
            'lastname' => 'admin',
            'address' => 'admin',
            'gender' => 'Male',
            'birth_date' => '2018-06-13',
            'contact_number' => '12345678',
            'email' => 'admin@gmail.com',
            'quota' => '11111'
        ]);
        User::create([
            'user_id' => '1',
            'username' => 'admin',
            'password' => 'admin',
            'role' => 'Admin'
        ]);
    }
}
