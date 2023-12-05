<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class ProductCreate extends Component
{

    public $nama_product;
    public $kode_product;
    public $harga_product;

    // Add New Product
    public function submit()
    {
        $this->validate([
            "nama_product" => "required|unique:products|min:3",
            "kode_product" => "required|unique:products|min:4",
            "harga_product" => "required|min:3",
        ]);

        $product = Product::create([
            'nama_product' => $this->nama_product,
            'kode_product' => $this->kode_product,
            'harga_product' => $this->harga_product,

        ]);

        $this->emit('StoreProduct', $product);
        $this->deleteInput();
    }

    // Reset Form Input After Submit
    public function deleteInput()
    {
        $this->nama_product = null;
        $this->kode_product = null;
        $this->harga_product = null;
    }

    public function render()
    {
        return view('livewire.product.product-create');
    }
}
