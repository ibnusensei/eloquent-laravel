<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportUser implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select('users.name', 'email', 'countries.name as country', 'cities.name as city')
            ->join('cities', 'users.city_id', '=', 'cities.id')
            ->join('countries', 'cities.country_id', '=', 'countries.id')
            ->orderBy('users.id', 'desc')
            ->get();
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Country',
            'City',
        ];
    }
}
