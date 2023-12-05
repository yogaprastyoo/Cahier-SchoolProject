<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Order extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'no_order',
        'nama_kasir',
        'grand_total',
        'pembayaran',
        'kembalian',
    ];


    public function orderProduct()
    {
        return $this->hasMany(OrderProduct::class, 'order_id', 'id');
    }

    public function toSearchableArray()
    {
        return [
            'no_order' => $this->no_order,
            'nama_kasir' => $this->nama_kasir,
            'created_at' => $this->created_at,
        ];
    }
}
