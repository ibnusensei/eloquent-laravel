<?php

namespace App\Imports;

use App\Models\City;
use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportUser implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // create country if not exist
        $country = Country::firstOrCreate([
            'name' => $row['country'], 
            'code' => strtoupper(substr($row['country'], 0, 2))
        ]);

        // create city if not exist
        $city = City::where('name', $row['city'])->first();
        if (!$city) {
            $city = City::create([
                'name' => $row['city'],
                'country_id' => $country->id,
            ]);
        }

        // create user first or create
        $user = User::firstOrCreate([
            'email' => $row['email'],
        ], [
            'name' => $row['name'],
            'password' => Hash::make('password'),
            'city_id' => $city->id,
            'country_id' => $country->id,
        ]);

        return $user;
    }

    public function headingRow(): int
    {
        return 1;
    }
}
