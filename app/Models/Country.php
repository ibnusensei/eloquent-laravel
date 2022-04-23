<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'code'];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function users()
    {
        return $this->hasManyThrough(
            User::class, 
            City::class, 
            'country_id', 
            'city_id'
        );
    }

}

