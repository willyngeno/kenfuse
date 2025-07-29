<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserManagementController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;

Route::view('/', 'welcome');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role.redirect']);


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
   ->name('dashboard');

Route::get('dashboard', function () {
   return view('dashboard');
})->middleware(['auth', 'role.redirect']);


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
   ->name('dashboard');
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:Vendor'])->group(function () {
    Route::get('/vendor/dashboard', [VendorController::class, 'index'])->name('vendor.dashboard');
});

Route::middleware(['auth', 'role:Funeral Home'])->group(function () {
    Route::get('/funeral-home/dashboard', [FuneralHomeController::class, 'index'])->name('customer.home');
});

Route::get('/second', function () { 
    return view('second');
});
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});
Route::middleware(['auth', 'role.redirect'])->group(function () {
    Route::get('/vendor/dashboard', [VendorController::class, 'index'])->name('vendor.dashboard');
});
Route::middleware(['auth', 'role.redirect'])->group(function () {
    Route::get('/customer/dashboard', [CustomerController::class, 'index'])->name('customer.dashboard');
});
Route::get('/vendor/dashboard', function () {
    return view('admin.dashboard');
})->name('vendor.dashboard')->middleware('role.redirect');

Route::get('/customer/dashboard', function () {
    return view('customer.dashboard');
})->name('customer.dashboard')->middleware('role.redirect');

Route::get('/redirect', [\App\Http\Controllers\RoleRedirectController::class, 'redirect'])->name('role.redirect');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])
        ->name('admin.dashboard')->middleware('role:Admin');

    Route::get('/vendor/dashboard', [VendorController::class, 'index'])
        ->name('vendor.dashboard')->middleware('role:Vendor');

    Route::get('/funeral-home/dashboard', [FuneralHomeController::class, 'index'])
        ->name('funeral.dashboard')->middleware('role:Funeral Home');

    Route::get('/customer/dashboard', [CustomerController::class, 'index'])
        ->name('customer.dashboard')->middleware('role:Customer');
});