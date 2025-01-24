<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Frontend\WebsiteController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Payment\AnnualPaymentController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Client\Request;

Route::get('/' ,[WebsiteController::class, 'front_site'])->name('front.index');

Auth::routes(['verify' => true]);

Route::get('/annual-payment/{email}', [AnnualPaymentController::class, 'annualPaymentForm'])->name('annual_payment.form');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::middleware(['auth', 'role:subscriber'])->group(function () {
//     Route::get('/subscriber-dashboard', function () {
//         return 'Welcome to Subscriber Dashboard';
//     });
// });

// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/admin-dashboard' ,[AdminController::class , 'account_dashboard'])->name('admin.dashboard');
// });
