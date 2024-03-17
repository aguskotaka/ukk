<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales_Detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_code',
        'product_code',
        'total_product',
        'sub_total',
    ];

    public function sales()
    {
        return $this->belongsTo(Sales::class, 'sale_code');
    }
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_code');
    }
}
