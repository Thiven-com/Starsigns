<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('shop', [PageController::class, 'shop'])->name('shop');
Route::get('about', [PageController::class, 'about'])->name('about');
Route::get('consultation', [PageController::class, 'consultation'])->name('consultation');
Route::get('blog', [PageController::class, 'blog'])->name('blog');




