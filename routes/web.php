<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ContactMessageController;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/
Route::view('/', 'menu')->name('menu');

/*
|--------------------------------------------------------------------------
| PORTFOLIO PAGE
|--------------------------------------------------------------------------
*/
Route::get('/portfolio', [ProjectController::class, 'index'])
    ->name('portfolio');

/*
|--------------------------------------------------------------------------
| CONTACT (PUBLIC)
|--------------------------------------------------------------------------
*/
Route::post('/contact/store', [ContactMessageController::class, 'store'])
    ->name('contact.store');

/*
|--------------------------------------------------------------------------
| MESSAGE (PUBLIC)
|--------------------------------------------------------------------------
*/
Route::post('/message/store', [MessageController::class, 'store'])
    ->name('message.store');

/*
|--------------------------------------------------------------------------
| ADMIN AUTH
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AdminController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/admin/login', [AdminController::class, 'processLogin'])
    ->name('admin.login.post');

Route::post('/admin/logout', [AdminController::class, 'logout'])
    ->name('admin.logout');

/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD (PROTECTED)
|--------------------------------------------------------------------------
*/
Route::middleware('admin')->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    /*
    |--------------------------------------------------------------------------
    | PROJECT CRUD
    |--------------------------------------------------------------------------
    */
    Route::post('/project/store', [ProjectController::class, 'store'])
        ->name('project.store');

    Route::put('/project/update/{id}', [ProjectController::class, 'update'])
        ->name('project.update');

    Route::delete('/project/delete/{id}', [ProjectController::class, 'destroy'])
        ->name('project.destroy');

    /*
    |--------------------------------------------------------------------------
    | MESSAGE CRUD
    |--------------------------------------------------------------------------
    */
    Route::delete('/message/delete/{id}', [MessageController::class, 'destroy'])
        ->name('message.destroy');

    // ✅ INI PENTING (BIAR EDIT MESSAGE TIDAK ERROR)
    Route::put('/message/update/{id}', [MessageController::class, 'update'])
        ->name('message.update');

    /*
    |--------------------------------------------------------------------------
    | CONTACT CRUD
    |--------------------------------------------------------------------------
    */
    Route::delete('/contact/delete/{id}', [ContactMessageController::class, 'destroy'])
        ->name('contact.destroy');

});