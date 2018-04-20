<?php

use Illuminate\Database\Seeder;
use App\Developer;

class DevelopersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
 
        // Create 10 developer records
        for ($i = 0; $i < 10; $i++) {
            Developer::create([
                'firstName' => $faker->name,
                'lastName' => $faker->name,
                'username' => $faker->username,
                'password' => $faker->password,
                'role' => $faker->title,
            ]);
        }
    }
}
