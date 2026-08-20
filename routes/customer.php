<?php

use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Customer\AddressController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\Customer\WebhookController;
use App\Http\Controllers\Customer\WishlistController;
use App\Http\Controllers\TrackingController;
use Illuminate\Support\Facades\Route;

Route::middleware(['customer'])->group(function () {

    Route::post('/wishlist/add', [WishlistController::class, 'add'])
        ->name('customer.wishlist.add');

    Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'remove'])
        ->name('customer.wishlist.remove');


    Route::get('myaccount', [ProfileController::class, 'myaccount'])->name('myaccount');
    Route::get(
        '/profile/edit',
        [ProfileController::class, 'edit']
    )->name('customer.profile.edit');

    Route::post(
        '/profile/update',
        [ProfileController::class, 'update']
    )->name('customer.profile.update');

    //Cart
    Route::post('/cart/add', [CartController::class, 'add'])->name('customer.cart.add');
    Route::post('/cart/addtocart', [CartController::class, 'addtocart'])->name('customer.cart.addtocart');
    Route::post('/cart/update', [CartController::class, 'update'])->name('customer.cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('customer.cart.remove');
    Route::get('/cart/count', [CartController::class, 'count'])->name('customer.cart.count');
    //Order
    Route::post('/place-order', [OrderController::class, 'store'])
        ->name('customer.place.order');
    Route::post('/payment-success', [OrderController::class, 'paymentSuccess'])->name('customer.payment.success');
    Route::get('/orders', [OrderController::class, 'orders'])->name('customer.orders');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('customer.order.detail');

    //addresses
    Route::get('/addresses', [AddressController::class, 'addresses'])->name('customer.addresses');

    Route::post('/address/store', [AddressController::class, 'storeAddress'])->name('customer.address.store');

    Route::post('/address/update/{id}', [AddressController::class, 'addressupdate'])->name('customer.addressupdate');

    Route::delete('/customer/address/{id}', [AddressController::class, 'destroy'])->name('customer.address.destroy');

    Route::post('/order/store', [OrderController::class, 'store'])
        ->name('customer.order.store');
});


