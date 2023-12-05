<?php

namespace App\Http\Livewire\Transaction;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use App\Models\Transaction;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TransactionIndex extends Component
{
    public $product_id;
    public $pembayaran;
    public $search;

    // Add Product to Cart
    public function submit()
    {
        $this->validate([
            "product_id" => "required|unique:transactions",
        ]);
        $transaction = Transaction::create([
            'product_id' => $this->product_id,
            'qty' => 1,
            'total' => DB::table('products')->where('id', $this->product_id)->value('harga_product')
        ]);

        session()->flash('message', "Produk " . $transaction->product->nama_product . " Berhasil Ditambahkan Ke Dalam Keranjang");
        $this->deleteInput();
    }

    // Reset Form Input After Submit
    public function deleteInput()
    {
        $this->product_id = null;
    }

    // Add Qty product in Cart
    public function increment($id)
    {
        $transaction = Transaction::find($id);
        $transaction->update([
            'qty' => $transaction->qty + 1,
            'total' => $transaction->product->harga_product * ($transaction->qty + 1)
        ]);

        session()->flash('message', "QTY Produk " . $transaction->product->nama_product . " Berhasil Ditambahkan");
    }

    // Reduce Qty product in Cart
    public function decrement($id)
    {
        $transaction = Transaction::find($id);
        if ($transaction->qty > 1) {
            $transaction->update([
                'qty' => $transaction->qty - 1,
                'total' => $transaction->product->harga_product * ($transaction->qty - 1)

            ]);
            session()->flash('message', "QTY Produk " . $transaction->product->nama_product . " Berhasil Dikurangi");
        }
    }

    // Reduce Product in Cart
    public function deleteTransaction($id)
    {
        $transaction = Transaction::find($id);
        if (!$transaction == null) {
            $transaction->delete();
            // DB::table('transactions')->truncate();
            session()->flash('message', "Produk " . $transaction->product->nama_product . " Berhasil Dihapus Dari Keranjang");
        }
    }

    // Create Save Invoice
    public function saveBill()
    {
        $transaction = Transaction::get();
        if ($transaction->count() > 0) {
            $this->validate([
                'pembayaran' => "required"
            ]);
            $order = Order::create([
                'no_order' => $this->generateUniqueNoOrder(),
                'nama_kasir' => Auth::user()->name,
                'grand_total' => $transaction->sum('total'),
                'pembayaran' => $this->pembayaran,
                'kembalian' => $this->pembayaran - $transaction->sum('total')
            ]);

            foreach ($transaction as $value) {
                $product = [
                    'order_id' => $order->id,
                    'product_id' => $value->product_id,
                    'qty' => $value->qty,
                    'total' => $value->total
                ];
                $orderProduct = OrderProduct::create($product);
            }
            DB::table('transactions')->truncate();
            session()->flash('message', "Transaction Berhasil Disimpan");
            return redirect()->to('/invoice/' . $order->no_order);
        } else {
            session()->flash('error', "Keranjang anda masih kosong");
        }
    }

    public function render()
    {
        return view('livewire.transaction.transaction-index', [
            'products' => Product::orderBy('nama_product', 'asc')->select('id', 'nama_product')->get(),
            'transactions' => Transaction::get(),
        ]);
    }

    public function generateUniqueNoOrder()
    {
        do {
            $code = 'OD-' . date('dmy') . rand(1111, 9999);
        } while (Order::where("no_order", "=", $code)->first());

        return $code;
    }
}
