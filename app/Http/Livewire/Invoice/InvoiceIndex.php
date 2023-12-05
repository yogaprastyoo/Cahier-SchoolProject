<?php

namespace App\Http\Livewire\Invoice;

use App\Models\Order;
use Livewire\Component;

class InvoiceIndex extends Component
{

    public $search;
    protected $orders;

    protected $queryString = ['search'];

    public function render()
    {
        if ($this->search === null || $this->search === "") {
            $this->orders = Order::latest()->paginate('10');
        } else {
            $this->orders = Order::search($this->search)->paginate('10');
        }
        return view('livewire.invoice.invoice-index', ['orders' => $this->orders]);
    }
}
