<?php

namespace App;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "raiyan";
});

Route::prefix('admin')->middleware(['web'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout-admin');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin', 'web'])->group(function () {
    Route::name('home.')->controller(DashboardController::class)->group(function () {
        Route::get('/', 'home')->name('index');
    });

    //for references
    // Route::name('users.')
    //     ->prefix('users')
    //     ->controller(UsersController::class)->group(function () {
    //     Route::get('/', 'index')->name('index');
    //     Route::get('blocked', 'index')->name('blocked');
    //     Route::get('deleted', 'index')->name('deleted');
    //     Route::post('store', 'store')->name('store');
    //     Route::get('{id}/edit', "edit")->name('edit');
    //     Route::delete('/{id}', 'destroy')->name('destroy');
    //     Route::post('update', 'update')->name('update');
    //     Route::put('status', 'status')->name('status');
    // });

    // Route::name('sliders.')
    //     ->prefix('sliders')
    //     ->controller(SliderController::class)->group(function () {
    //     Route::get('/', 'index')->name('index');
    //     Route::get('blocked', 'index')->name('blocked');
    //     Route::get('deleted', 'index')->name('deleted');
    //     Route::post('store', 'store')->name('store');
    //     Route::get('{id}/edit', "edit")->name('edit');
    //     Route::get('{id}/restore', "restoreDeletedValue")->name('restoreDeletedValue');
    //     Route::delete('/{id}', 'destroy')->name('destroy');
    //     Route::post('update', 'update')->name('update');
    //     Route::put('status', 'status')->name('status');
    // });
});