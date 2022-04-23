<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // make 10 food items
        $food = ['Nasi Goreng', 'Mie Goreng', 'Pizza', 'Burger', 'Sushi', 'Sate', 'Sop', 'Kue'];
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 8; $i++) {
            Food::create([
                'name' => $food[$i],
                'description' => $faker->sentence,
                'image' => $faker->imageUrl(),
                'price' => $faker->numberBetween(100, 1000),
            ]);
        }

    }
}
