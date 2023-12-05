<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// })->middleware('auth');
Route::get('/tes', function () {
    return view('tests');
});

Route::middleware(['auth'])->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')
            ->name('home');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/products', 'index')
            ->name('products');
    });

    Route::controller(TransactionController::class)->group(function () {
        Route::get('/transaction', 'index')
            ->name('transaction');
    });

    Route::controller(InvoiceController::class)->group(function () {
        Route::get('/invoices', 'index')
            ->name('invoices');

        Route::get('/invoice/{no_order}', 'show')
            ->name('invoice-show');

        Route::post('/invoice/{no_order}', 'print')
            ->name('invoice-print');
    });
});

require __DIR__ . '/auth.php';
