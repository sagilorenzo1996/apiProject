<?php

use Illuminate\Database\Seeder;
use App\Manager;

class ManagersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
 
        // Create 10 Manager records
        for ($i = 0; $i < 10; $i++) {
            Manager::create([
                'firstName' => $faker->name,
                'lastName' => $faker->name,
                'username' => $faker->username,
                'password' => $faker->password,
            ]);
        }
    }
}
