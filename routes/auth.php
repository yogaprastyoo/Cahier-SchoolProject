<?php

use App\Http\Controllers\Auth\AuthenticatedSession;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::controller(AuthenticatedSession::class)->group(function () {
        Route::get('login', 'index')
            ->name('login');
        Route::post('login', 'store')
            ->name('login.store');
    });
});

Route::middleware(['auth'])->group(function () {
    // Logout
    Route::controller(AuthenticatedSession::class)->group(function () {
        Route::post('/logout', 'destroy')
            ->name("login.destroy");
    });
});
