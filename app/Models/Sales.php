<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_code',
        'date',
        'total_price',
        'id_user',
        'id_client',
        'pay',
    ];

    public function sales_details()
    {
        return $this->hasMany(Sales_Detail::class,'sale_code');
    }
    public function users()
    {
        return $this->belongsTo(User::class,'id_user');
    }
    public function clients()
    {
        return $this->belongsTo(Client::class,'id_client');
    }
}
