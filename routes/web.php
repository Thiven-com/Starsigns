<?php

use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\WishlistController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Website\AccountController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('shop', [PageController::class, 'shop'])->name('shop');
Route::get('about', [PageController::class, 'about'])->name('about');
Route::get('blog', [PageController::class, 'blog'])->name('blog');

// Route::get('offers', [PageController::class, 'offers'])->name('offers');
// Route::get('consultation', [PageController::class, 'consultation'])->name('consultation');

Route::get('/product/{slug}', [PageController::class, 'productDetail'])->name('product-detail');
Route::get('/blog/{slug}', [PageController::class, 'blogDetails'])->name('blog-details');
// Route::get('cart', [PageController::class, 'cart'])->name('cart');

// Route::get('wishlist', [PageController::class, 'wishlist'])->name('wishlist');
// Route::get('orders', [PageController::class, 'orders'])->name('orders');
Route::get('contact', [PageController::class, 'contact'])->name('contact');

// Route::get('login', [PageController::class, 'login'])->name('login');
Route::get('register', [PageController::class, 'register'])->name('register');
Route::get('blog-details', [PageController::class, 'blog_details'])->name('blog-details');


Route::get('faq', [PageController::class, 'faq'])->name('faq');
Route::get('shippolicy', [PageController::class, 'shippolicy'])->name('shippolicy');
Route::get('refundpolicy', [PageController::class, 'refundpolicy'])->name('refundpolicy');
Route::get('terms', [PageController::class, 'terms'])->name('terms');
Route::get('privacy-policy', [PageController::class, 'privacy_policy'])->name('privacy-policy');

Route::post('/wishlist/add', [WishlistController::class, 'add'])->name('customer.wishlist.add');

Route::post(
    '/newsletter/subscribe',
    [PageController::class, 'subscriptionStore']
)->name('subscription.store');
Route::post('/contact-store', [PageController::class, 'contactStore'])
    ->name('contactStore');

Route::middleware(['customer'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('checkout', [PageController::class, 'checkout'])->name('checkout');
});

Route::get('login', [AccountController::class, 'login'])->name('login');
Route::get('logout', [AccountController::class, 'logout'])->name('logout');
Route::post('/send-otp', [AccountController::class, 'sendOtp']);
Route::post('/verify-otp', [AccountController::class, 'verifyOtp']);
Route::get('wishlist', [WishlistController::class, 'index'])->name('wishlist');








