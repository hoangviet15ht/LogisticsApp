<?php

use App\Http\Controllers\Customer\AuthController;
use App\Http\Controllers\Customer\DashboardController;


Route::get('login', [AuthController::class, 'showLoginView'])
    ->name('showLoginView');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth.domain:customer'])->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});
