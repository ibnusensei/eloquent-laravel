<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserCountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 
        $users = User::all();
        foreach ($users as $user) {
            $user->country_id = rand(1, 100);
            $user->save();
        }
    }
}
