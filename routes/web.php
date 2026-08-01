<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('shop', [PageController::class, 'shop'])->name('shop');
Route::get('about', [PageController::class, 'about'])->name('about');
Route::get('blog', [PageController::class, 'blog'])->name('blog');

// Route::get('offers', [PageController::class, 'offers'])->name('offers');
// Route::get('consultation', [PageController::class, 'consultation'])->name('consultation');

Route::get('product', [PageController::class, 'product'])->name('product');
Route::get('cart', [PageController::class, 'cart'])->name('cart');
Route::get('checkout', [PageController::class, 'checkout'])->name('checkout');
Route::get('wishlist', [PageController::class, 'wishlist'])->name('wishlist');
Route::get('orders', [PageController::class, 'orders'])->name('orders');
Route::get('contact', [PageController::class, 'contact'])->name('contact');
Route::get('myaccount', [PageController::class, 'myaccount'])->name('myaccount');
Route::get('login', [PageController::class, 'login'])->name('login');
Route::get('register', [PageController::class, 'register'])->name('register');









