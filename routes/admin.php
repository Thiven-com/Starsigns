<?php

use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
// use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\RegistrationController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServiceRequestController;
use App\Http\Controllers\Admin\ServicesingleController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\DonationEnquiryController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\UnitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;





Route::get('login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('login', [AuthController::class, 'login'])->name('admin.loginAction');

Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');
Route::get('logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'admin'], function () {
    Route::get('dashboard', [AuthController::class, 'dashboard'])
        ->name('admin.dashboard');

    Route::resource('units', UnitController::class)->names('admin.units');
    Route::resource('attributes', AttributeController::class)->names('admin.attributes');
    Route::resource('brands', BrandController::class)->names('admin.brands');
    Route::resource('categories', CategoryController::class)->names('admin.categories');
    Route::resource('banners', BannerController::class)->names('admin.banners');
    Route::resource('products', ProductController::class)->names('admin.products');
    Route::resource('blogs', BlogController::class)->names('admin.blogs');
    Route::resource('blog/categories', BlogCategoryController::class)->names('admin.blog.categories');
    Route::resource('faqs', FaqController::class)->names('admin.faqs');
    Route::get('/admin/contacts', [ContactController::class, 'index'])->name('admin.contacts.index');
    Route::get('contacts', [ContactController::class, 'index'])
        ->name('contacts.all');
    Route::delete('contacts/{id}', [ContactController::class, 'destroy'])
        ->name('contacts.delete');
    Route::post('/contact-store', [ContactController::class, 'store'])
        ->name('contact.store');
    Route::resource('testimonial', TestimonialController::class)->names('admin.testimonial');
    Route::delete('/admin/testimonial/{id}', [TestimonialController::class, 'destroy'])
        ->name('admin.services.reviews.destroy');
    Route::get('/testimonial/approve/{id}', [TestimonialController::class, 'approve'])
        ->name('admin.testimonial.approve');

    Route::get('/testimonial/reject/{id}', [TestimonialController::class, 'reject'])
        ->name('admin.testimonial.reject');
    Route::get('/reviews', [ReviewController::class, 'index'])->name('admin.reviews.all');
    Route::get('/reviews/{id}', [ReviewController::class, 'show'])->name('admin.reviews.show');
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('admin.reviews.destroy');
    Route::get('/admin/subscriptions', [SubscriptionController::class, 'index'])
        ->name('admin.subscriptions.all');

    Route::delete('/admin/subscriptions/{id}', [SubscriptionController::class, 'destroy'])
        ->name('admin.subscriptions.destroy');
    Route::get('settings/company', 'SiteSettingController@site')->name('admin.settings.company');
    Route::post('setting/company/update', 'SiteSettingController@company_setting_update')->name('admin.settings.company.update');


    Route::delete('product-media/{id}', 'ProductController@delete_media')->name('admin.product-media.destroy');
    Route::get('products/get-attribute-values/{unitId}', [ProductController::class, 'getAttributeValues'])->name('products.getAttributeValues');

    Route::get('todayDeals', "ProductController@todayDeals")->name('admin.todayDeals');
    Route::post('updateTodayDeal', "ProductController@updateTodayDeal")->name('admin.updateTodayDeal');
    Route::post('updateTodayDeal', "ProductController@updateTodayDeal")->name('admin.updateTodayDeal');
    Route::post('/admin/today-sale/remove/{id}', [ProductController::class, 'deleteTodaySale'])
        ->name('admin.deleteTodaySale');



    Route::post('bulkProductUpdate', [ProductController::class, 'bulkProductUpdate'])->name('admin.bulkProductUpdate');

    Route::post('delete-variant-video', [ProductController::class, 'deleteVideo']);

});

Route::get('forgot-password', [AuthController::class, 'showForgotForm'])
    ->name('admin.password.request');

Route::post('send-otp', [AuthController::class, 'sendOtp'])
    ->name('admin.password.sendOtp');

Route::get('verify-otp', [AuthController::class, 'showVerifyForm'])
    ->name('admin.password.verifyForm');

Route::post('verify-otp', [AuthController::class, 'verifyOtp'])
    ->name('admin.password.resetOtp');







