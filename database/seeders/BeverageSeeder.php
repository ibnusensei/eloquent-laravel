<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BeverageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // make 10 beverage items
        $beverage = ['Coca-Cola', 'Sprite', 'Fanta', 'Pepsi', 'Mountain Dew', 'Coca-Cola Zero', 'Sprite Zero', 'Fanta Zero', 'Pepsi Zero'];
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 9; $i++) {
            \App\Models\Beverage::create([
                'name' => $beverage[$i],
                'description' => $faker->sentence,
                'image' => $faker->imageUrl(),
                'price' => $faker->numberBetween(100, 1000),
            ]);
        }
    }
}
