<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\Admin\ArticleAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectFeedbackController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/
Route::get('/', [ProjectController::class, 'index'])->name('home');

Route::view('/menu', 'admin.menu')
    ->middleware('admin')
    ->name('admin.menu');

/*
|--------------------------------------------------------------------------
| PORTFOLIO PAGE
|--------------------------------------------------------------------------
*/
Route::get('/portfolio', [ProjectController::class, 'index'])
    ->name('portfolio');

Route::get('/project/{project}', [ProjectController::class, 'show'])
    ->name('project.show');

Route::post('/project/{project}/feedback', [ProjectFeedbackController::class, 'store'])
    ->name('feedback.store');

Route::post('/testimonial/submit', [TestimonialController::class, 'storePublic'])
    ->name('testimonial.submit');

Route::get('/cv', [ProjectController::class, 'cv'])->name('cv');

/*
|--------------------------------------------------------------------------
| BLOG (PUBLIC)
|--------------------------------------------------------------------------
*/
Route::get('/blog', [ArticleController::class, 'index'])
    ->name('blog.index');

Route::get('/blog/{slug}', [ArticleController::class, 'show'])
    ->name('blog.show');

/*
|--------------------------------------------------------------------------
| CONTACT (PUBLIC)
|--------------------------------------------------------------------------
*/
Route::post('/contact/store', [ContactMessageController::class, 'store'])
    ->name('contact.store');

/*
|--------------------------------------------------------------------------
| MESSAGE / KOMENTAR (PUBLIC)
| Hak edit & hapus dicek di MessageController (pemilik pesan atau admin)
|--------------------------------------------------------------------------
*/
Route::post('/message/store', [MessageController::class, 'store'])
    ->name('message.store');

Route::put('/message/update/{id}', [MessageController::class, 'update'])
    ->name('message.update');

Route::delete('/message/delete/{id}', [MessageController::class, 'destroy'])
    ->name('message.destroy');

/*
|--------------------------------------------------------------------------
| ADMIN AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', [AdminController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/login', [AdminController::class, 'processLogin'])
    ->name('admin.login.post');

Route::get('/admin/login', [AdminController::class, 'showLogin'])
    ->name('admin.login.legacy');

Route::post('/admin/login', [AdminController::class, 'processLogin'])
    ->name('admin.login.legacy.post');

Route::get('/admin', [AdminController::class, 'adminEntry'])
    ->name('admin.legacy');

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

    Route::get('/admin/profile', [AdminController::class, 'profile'])
        ->name('admin.profile');

    Route::put('/admin/profile', [AdminController::class, 'updateProfile'])
        ->name('admin.profile.update');

    // PROJECT CRUD
    Route::post('/project/store', [ProjectController::class, 'store'])
        ->name('project.store');

    Route::put('/project/update/{id}', [ProjectController::class, 'update'])
        ->name('project.update');

    Route::delete('/project/delete/{id}', [ProjectController::class, 'destroy'])
        ->name('project.destroy');

    // FEEDBACK PROYEK
    Route::delete('/feedback/{id}', [ProjectFeedbackController::class, 'destroy'])
        ->name('feedback.destroy');

    // CONTACT CRUD
    Route::delete('/contact/delete/{id}', [ContactMessageController::class, 'destroy'])
        ->name('contact.destroy');

    Route::put('/contact/update/{id}', [ContactMessageController::class, 'update'])
        ->name('contact.update');

    // SERTIFIKAT & PRESTASI
    Route::post('/achievement', [AchievementController::class, 'store'])
        ->name('achievement.store');

    Route::delete('/achievement/{id}', [AchievementController::class, 'destroy'])
        ->name('achievement.destroy');

    Route::put('/achievement/{id}', [AchievementController::class, 'update'])
        ->name('achievement.update');

    // PENGALAMAN
    Route::post('/experience', [ExperienceController::class, 'store'])
        ->name('experience.store');

    Route::delete('/experience/{id}', [ExperienceController::class, 'destroy'])
        ->name('experience.destroy');

    Route::put('/experience/{id}', [ExperienceController::class, 'update'])
        ->name('experience.update');

    // TESTIMONIAL

    Route::post('/testimonial', [TestimonialController::class, 'store'])
        ->name('testimonial.store');

    Route::delete('/testimonial/{id}', [TestimonialController::class, 'destroy'])
        ->name('testimonial.destroy');

    Route::put('/testimonial/{id}', [TestimonialController::class, 'update'])
        ->name('testimonial.update');

    // BLOG CRUD
    Route::prefix('/admin/blog')->name('admin.blog.')->group(function () {
        Route::get('/', [ArticleAdminController::class, 'index'])->name('index');
        Route::get('/create', [ArticleAdminController::class, 'create'])->name('create');
        Route::post('/', [ArticleAdminController::class, 'store'])->name('store');
        Route::get('/{article}/edit', [ArticleAdminController::class, 'edit'])->name('edit');
        Route::put('/{article}', [ArticleAdminController::class, 'update'])->name('update');
        Route::delete('/{article}', [ArticleAdminController::class, 'destroy'])->name('destroy');
    });

    Route::get('/tes-loading', function () {
        return 'Laravel berjalan normal!';
    });
});
