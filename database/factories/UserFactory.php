<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
	$arrayValues = ['Admin', 'Agent'];
    $role = $faker->randomElement($arrayValues);
    if($role == 'Admin'){

		$security = 'admin'.$faker->unique()->numberBetween($min = 1 , $max = 10);


    }else{

    	$security = 'agent'.$faker->unique()->numberBetween($min = 1 , $max = 10);
   
    }

    return [
    		'firstname' => $faker->firstName,
            'middlename' => $faker->lastName,
            'lastname' => $faker->lastName,
            'address' => $faker->address,
            'gender' => 'Male',
            'birth_date' => $faker->dateTimeThisCentury->format('Y-m-d'),
            'contact_number' => $faker->phoneNumber,
            'email' => $faker->email,
            'quota' => '1',
            'username' => $security,
            'password' => $security,
            'role' => $role
    ];
    	

    
    
});