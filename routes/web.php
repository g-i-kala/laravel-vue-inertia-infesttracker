<?php

use App\Http\Controllers\ETFController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->prefix('wallet')->group(function () {
    Route::get('/', [WalletController::class, 'index'])->name('wallet.index');
    //Route::get('/{wallet}', [WalletController::class, 'show'])->name('wallet.show');
    Route::get('/etf', [ETFController::class, 'index'])->name('wallet.etf.index');
});

require __DIR__.'/settings.php';
