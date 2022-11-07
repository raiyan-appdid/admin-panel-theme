<?php

namespace App;

use App\Http\Controllers\Admin\AskMyTeamController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EatingAdviceController;
use App\Http\Controllers\Admin\ExerciseController;
use App\Http\Controllers\Admin\GeneralController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SuccessStoryController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TipsToGetPregnantController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\EmployeeController;
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

    // employesss
    Route::name('employees.')
        ->prefix('employees')
        ->controller(EmployeeController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', "edit")->name('edit');
        Route::delete('/{id}', 'destroy')->name('destroy');
        Route::post('update', 'update')->name('update');
        Route::put('status', 'status')->name('status');
    });

    Route::name('users.')
        ->prefix('users')
        ->controller(UsersController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('blocked', 'index')->name('blocked');
        Route::get('deleted', 'index')->name('deleted');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', "edit")->name('edit');
        Route::delete('/{id}', 'destroy')->name('destroy');
        Route::post('update', 'update')->name('update');
        Route::put('status', 'status')->name('status');
    });

    Route::name('sliders.')
        ->prefix('sliders')
        ->controller(SliderController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('blocked', 'index')->name('blocked');
        Route::get('deleted', 'index')->name('deleted');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', "edit")->name('edit');
        Route::get('{id}/restore', "restoreDeletedValue")->name('restoreDeletedValue');
        Route::delete('/{id}', 'destroy')->name('destroy');
        Route::post('update', 'update')->name('update');
        Route::put('status', 'status')->name('status');
    });

    Route::name('eatingadvices.')
        ->prefix('eatingadvices')
        ->controller(EatingAdviceController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}/comments', 'comments')->name('comments');
        Route::get('blocked', 'index')->name('blocked');
        Route::get('deleted', 'index')->name('deleted');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', "edit")->name('edit');
        Route::get('{id}/restore', "restoreDeletedValue")->name('restoreDeletedValue');
        Route::delete('/{id}', 'destroy')->name('destroy');
        Route::post('update', 'update')->name('update');
        Route::put('status', 'status')->name('status');
    });

    Route::name('tipstogetpregnants.')
        ->prefix('tipstogetpregnants')
        ->controller(TipsToGetPregnantController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}/comments', 'comments')->name('comments');
        Route::get('blocked', 'index')->name('blocked');
        Route::get('deleted', 'index')->name('deleted');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', "edit")->name('edit');
        Route::get('{id}/restore', "restoreDeletedValue")->name('restoreDeletedValue');
        Route::delete('/{id}', 'destroy')->name('destroy');
        Route::post('update', 'update')->name('update');
        Route::put('status', 'status')->name('status');
    });

    Route::name('testimonials.')
        ->prefix('testimonials')
        ->controller(TestimonialController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}/comments', 'comments')->name('comments');
        Route::get('blocked', 'index')->name('blocked');
        Route::get('deleted', 'index')->name('deleted');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', "edit")->name('edit');
        Route::get('{id}/restore', "restoreDeletedValue")->name('restoreDeletedValue');
        Route::delete('/{id}', 'destroy')->name('destroy');
        Route::post('update', 'update')->name('update');
        Route::put('status', 'status')->name('status');
    });

    Route::name('exercises.')
        ->prefix('exercises')
        ->controller(ExerciseController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}/comments', 'comments')->name('comments');
        Route::get('blocked', 'index')->name('blocked');
        Route::get('deleted', 'index')->name('deleted');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', "edit")->name('edit');
        Route::get('{id}/restore', "restoreDeletedValue")->name('restoreDeletedValue');
        Route::delete('/{id}', 'destroy')->name('destroy');
        Route::post('update', 'update')->name('update');
        Route::put('status', 'status')->name('status');
    });

    Route::name('successstories.')
        ->prefix('successstories')
        ->controller(SuccessStoryController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}/comments', 'comments')->name('comments');
        Route::get('blocked', 'index')->name('blocked');
        Route::get('deleted', 'index')->name('deleted');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', "edit")->name('edit');
        Route::get('{id}/restore', "restoreDeletedValue")->name('restoreDeletedValue');
        Route::delete('/{id}', 'destroy')->name('destroy');
        Route::post('update', 'update')->name('update');
        Route::put('status', 'status')->name('status');
    });

    Route::name('products.')
        ->prefix('products')
        ->controller(ProductController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('blocked', 'index')->name('blocked');
        Route::get('deleted', 'index')->name('deleted');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', "edit")->name('edit');
        Route::get('{id}/restore', "restoreDeletedValue")->name('restoreDeletedValue');
        Route::delete('/{id}', 'destroy')->name('destroy');
        Route::post('update', 'update')->name('update');
        Route::put('status', 'status')->name('status');
    });

    Route::name('notifications.')
        ->prefix('notifications')
        ->controller(NotificationController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('deleted', 'index')->name('deleted');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', "edit")->name('edit');
        Route::get('{id}/restore', "restoreDeletedValue")->name('restoreDeletedValue');
        Route::delete('/{id}', 'destroy')->name('destroy');
        Route::post('update', 'update')->name('update');
        // Route::put('status', 'status')->name('status');
    });

    Route::name('askmyteams.')
        ->prefix('askmyteams')
        ->controller(AskMyTeamController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('blocked', 'index')->name('blocked');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', "edit")->name('edit');
        Route::delete('/{id}', 'destroy')->name('destroy');
        Route::post('update', 'update')->name('update');
        Route::put('status', 'status')->name('status');
    });

    Route::name('settings.')->prefix('settings')->controller(GeneralController::class)->group(function () {
        Route::get('/', 'setting')->name('setting');
        Route::post('update', 'update')->name('update');
    });

    Route::name('contact.')->prefix('contact')->controller(GeneralController::class)->group(function () {
        Route::get('/', 'contact')->name('contact');
        Route::post('update', 'contact_update')->name('update');
    });

    Route::name('askmyteamsreply.')->prefix('askmyteamsreply')->controller(GeneralController::class)->group(function () {
        Route::get('askMyTeamReply', 'askMyTeamReply')->name('askMyTeamReply');
        Route::post('store', 'askMyTeamReplyStore')->name('askMyTeamReplyStore');
    });

    Route::name('comments.')
        ->prefix('comments')
        ->controller(CommentController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('deleted', 'index')->name('deleted');
        Route::post('store', 'store')->name('store');
        Route::post('storeReply', 'storeReply')->name('storeReply');
        Route::get('{id}/edit', "edit")->name('edit');
        Route::delete('/{id}', 'destroy')->name('destroy');
        Route::post('update', 'update')->name('update');
        Route::put('status', 'status')->name('status');
    });
});