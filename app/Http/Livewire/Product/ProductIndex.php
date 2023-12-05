<?php

namespace App\Http\Livewire\Product;

use Exception;
use App\Models\Product;
use Livewire\Component;
use App\Models\Transaction;
use App\Models\OrderProduct;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;

class ProductIndex extends Component
{

    public $search;
    public $productId = 0;
    public $nama_product;
    public $kode_product;
    public $harga_product;
    protected $listeners = ['StoreProduct'];


    protected $queryString = ['search'];


    public function selectProductId($productId)
    {
        $this->productId = $productId;

        if ($this->productId == 0) {
            session()->flash('error', 'Tidak dapat mengedit produk ini. Produk tidak tersedia.');
        }
        $product = Product::find($this->productId);
        if ($product) {
            $this->productId = $product->id;
            $this->nama_product = $product->nama_product;
            $this->kode_product = $product->kode_product;
            $this->harga_product = $product->harga_product;
        } else {
            session()->flash('error', 'Tidak dapat mengedit produk ini. Produk tidak tersedia.');
        }
    }

    public function deleteProduct()
    {

        if ($this->productId == 0) {
            return;
        }
        $product = Product::find($this->productId);
        if (OrderProduct::where('product_id', $this->productId)->exists() || Transaction::where('product_id', $this->productId)->exists()) {
            session()->flash('error', 'Tidak dapat menghapus produk ini. Produk terkait dengan satu atau lebih invoice.');
            return;
        }
        $product->delete();
        $this->productId = 0;
        session()->flash('success', "Produk " . $product->nama_product . " Berhasil Dihapus");
    }

    public function updateProduct()
    {
        try {
            $this->validate([
                "nama_product" => "required|min:3",
                "kode_product" => "required|min:4",
                "harga_product" => "required|min:3",
            ]);

            $product = Product::findOrFail($this->productId);
            $product->update([
                "nama_product" => $this->nama_product,
                "kode_product" => $this->kode_product,
                "harga_product" => $this->harga_product,
            ]);
            session()->flash('success', 'Produk Berhasil Diperbarui menjadi ' . $this->nama_product);
        } catch (QueryException $exception) {
            $errorMessage = $exception->getMessage();

            if (strpos($errorMessage, 'Duplicate entry') !== false) {
                preg_match("/Duplicate entry '(.+)' for key/", $errorMessage, $matches);
                $namaProduk = $matches[1];
                session()->flash('error', $namaProduk . ' sudah ada. Harap gunakan kode atau nama yang berbeda.');
            } else {
                session()->flash('error', $errorMessage);
            }
        }
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->nama_product = "";
        $this->kode_product = "";
        $this->harga_product = "";
    }

    public function StoreProduct($product)
    {
        session()->flash('success', 'Product ' . $product['nama_product'] . ' | ' . $product['kode_product'] . ' Berhasil Ditambahkan');
    }

    public function render()
    {

        if ($this->search === null || $this->search === "") {
            $products = Product::latest()->paginate(10);
        } else {
            $products = Product::search($this->search)->paginate(10);
        }

        return view('livewire.product.product-index', compact('products'));
    }
}
