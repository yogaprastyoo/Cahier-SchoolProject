<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'nama_product',
        'kode_product',
        'harga_product'
    ];

    public function toSearchableArray()
    {
        return [
            'nama_product' => $this->nama_product,
            'kode_product' => $this->kode_product,
            'harga_product' => $this->harga_product,
        ];
    }
}
