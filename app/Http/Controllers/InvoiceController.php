<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $orders = Order::with('orderProduct')->latest()->get();

        return view('pages.invoice.index', compact('orders'));
    }

    public function show($no_order)
    {
        $order = Order::where('no_order', $no_order)->firstOrFail();
        return view('pages.invoice.show', compact('order'));
    }

    public function print($no_order)
    {
        $order = Order::where('no_order', $no_order)->firstOrFail();
        return view('pages.invoice.print', compact('order'));
    }
}
