<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        // 'orderable_id',
        // 'orderable_type',
        'price',
    ];

    public function orderable()
    {
        return $this->morphTo();
    }
}
