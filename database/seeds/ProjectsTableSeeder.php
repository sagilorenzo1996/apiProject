<?php

use Illuminate\Database\Seeder;
use App\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
 
        // Create 10 Project records
        for ($i = 0; $i < 10; $i++) {
            Project::create([
                'managerId' => $faker->randomNumber(1),
                'description' => $faker->paragraph,
                'name' => $faker->name,
                'startDate' => $faker->date,
                'endDate' => $faker->date,
            ]);
        }
    }
}
