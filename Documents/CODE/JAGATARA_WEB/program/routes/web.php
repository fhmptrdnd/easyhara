<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

Route::get('/', function () {
    return view('main_page.beranda');
});

Route::get('/tentang', function () {
    return view('tentang_page.tentang');
});

use App\Models\Product;

Route::get('/produk', function () {
    $products = Product::all();
    return view('katalog_page.produk', compact('products'));
});

Route::get('/desa', function () {
    return view('main_page.desa');
});

Route::post('/chat', [ChatController::class, 'sendMessage'])->name('chat.send');
