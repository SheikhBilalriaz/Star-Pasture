<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Frontend\WebsiteController;
use App\Http\Controllers\Listing\AdListingController;
use App\Http\Controllers\Payment\AnnualPaymentController;
use App\Http\Controllers\Payment\MonthlyPaymentController;

Route::get('/', [WebsiteController::class, 'front_site'])->name('front.index');

Auth::routes(['verify' => true]);

// Define a route for accessing the annual payment form
Route::get('/annual-payment/{email}', [AnnualPaymentController::class, 'annual_payment_form'])
    ->where('email', '.*')
    ->name('annual_payment.form');

Route::post('/annual-payment/{email}', [AnnualPaymentController::class, 'annual_payment_form_submit'])
    ->name('annual_payment.submit');

Route::get('/monthly-payment/{email}', [MonthlyPaymentController::class, 'monthly_payment_form'])
    ->where('email', '.*')
    ->name('monthly_payment.form');

Route::post('/monthly-payment/{email}', [MonthlyPaymentController::class, 'monthly_payment_form_submit'])
    ->name('monthly_payment.submit');

Route::get('/ad-listing', [AdListingController::class, 'ad_listing_form'])->name('ad_listing.form');

Route::post('/ad-listing', [AdListingController::class, 'ad_listing_form_submit'])->name('ad_listing.submit');

Route::get('/ad-listing/{id}', [AdListingController::class, 'show'])->name('ad_listing.show');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::middleware(['auth', 'role:subscriber'])->group(function () {
//     Route::get('/subscriber-dashboard', function () {
//         return 'Welcome to Subscriber Dashboard';
//     });
// });

// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/admin-dashboard' ,[AdminController::class , 'account_dashboard'])->name('admin.dashboard');
// });
