<?php

namespace Database\Seeders;

use App\Models\Country;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // make 10 country from faker
        $faker = Factory::create();
        for ($i = 0; $i < 100; $i++) {
            Country::create([
                'name' => $faker->country,
                'code' => $faker->countryCode,
            ]);
        }
        
    }
}
