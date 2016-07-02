<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker::create();
        foreach (range(1, 20) as $index) {
            DB::table('tasks')->insert([
                "name" => $faker->name,
                "description" => $faker->paragraph,
                "user_id" => rand(1, 5),
                "created_at" => $faker->dateTime,
                'confirmed' => false,
            ]);
        }
    }
}
