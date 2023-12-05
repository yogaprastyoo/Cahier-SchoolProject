<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return view('pages.transaction.index');
    }

    public function invoices()
    {
        $orders = Order::with('orderProduct')->orderBy('created_at', 'desc')->get();
        return view('pages.transaction.invoices.invoice-index', compact('orders'));
    }

    public function invoiceShow($no_order)
    {
        $order = Order::where('no_order', $no_order)->with('orderProduct')->firstOrFail();
        return view('pages.transaction.invoices.invoice-show', compact('order'));
    }
    public function invoiceTes($no_order)
    {
        $order = Order::where('no_order', $no_order)->with('orderProduct')->firstOrFail();
        return view('pages.transaction.invoices.invoice-tes', compact('order'));
    }
}
