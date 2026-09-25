<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\AboutController;

Route::get('/', [ProductController::class, 'home']);

Route::get('/catalog', [ProductController::class, 'catalog']);

Route::get('/product/{product}', [ProductController::class, 'show'])
    ->name('products.show');

Route::post('/cart/add/{product}', [CartController::class, 'add'])
    ->name('cart.add');

Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');    

// Route::get('/shopping-bag', [CartController::class, 'index'])
//     ->name('shopping.bag');    

Route::patch('/cart/{cart}/increase', [CartController::class, 'increase'])
    ->name('cart.increase');

Route::patch('/cart/{cart}/decrease', [CartController::class, 'decrease'])
    ->name('cart.decrease');

Route::delete('/cart/{cart}', [CartController::class, 'remove'])
    ->name('cart.remove'); 

    Route::get('/checkout', [CheckoutController::class, 'index'])
    ->name('checkout.index');   

Route::get('/contact', [InquiryController::class, 'index'])->name('contact.index');

Route::post('/contact', [InquiryController::class, 'store'])->name('contact.store');

Route::get('/about', [AboutController::class, 'index'])->name('about.index');
