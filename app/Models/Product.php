<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_code',
        'name',
        'stock',
        'price',
    ];

    public function sales_details()
    {
        return $this->hasMany(Sales::class, 'product_code');
    }
}
