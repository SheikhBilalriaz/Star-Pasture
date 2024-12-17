<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\WebsiteController;
use App\Http\Controllers\Backend\AdminController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [WebsiteController::class, 'front_site'])->name('front.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'role:subscriber'])->group(function () {
    Route::get('/subscriber-dashboard', function () {
        return 'Welcome to Subscriber Dashboard';
    });
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'account_dashboard'])->name('admin.dashboard');
});
