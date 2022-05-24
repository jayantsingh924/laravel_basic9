<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [AdminController::class, 'adminDashboard'])->middleware(['auth'])->name('dashboard');

Route::controller(AdminController::class)->group(function () {
    Route::get('/logout', 'destroy')->name('admin.logout');
    Route::get('register', [AdminController::class, 'create'])->name('register');

Route::post('register', [AdminController::class, 'store']);
});

require __DIR__.'/auth.php';


