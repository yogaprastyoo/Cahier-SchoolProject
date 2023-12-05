<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        "product_id",
        "qty",
        "total",
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
