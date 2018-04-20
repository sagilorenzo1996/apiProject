<?php

use Illuminate\Database\Seeder;
use App\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
 
        // Create 20 Task records
        for ($i = 0; $i < 20; $i++) {
            Task::create([
                'developerId' => $faker->randomNumber(1),
                'projectId' => $faker->randomNumber(1),
                'date' => $faker->date,
                'hours' => $faker->randomNumber(1),
                'overtime' => $faker->randomNumber(1),
                'description' => $faker->paragraph,
            ]);
        }
    }
}
