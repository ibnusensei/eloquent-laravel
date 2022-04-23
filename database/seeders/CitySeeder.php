<?php

namespace Database\Seeders;

use App\Models\City;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        // create 200 cities
        for ($i = 0; $i < 200; $i++) {
            City::create([
                'name' => $faker->city,
                'country_id' => rand(1, 100),
            ]);
        }
    }
}
