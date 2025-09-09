<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SliderImageController;
use App\Http\Controllers\ProjectController;

Route::get('/', [PublicPageController::class, 'home'])->name('home');

// Test route
Route::get('/test', function () {
    return 'Test route working!';
});

Route::get('/about', [PublicPageController::class, 'about'])->name('about');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/contact', [PublicPageController::class, 'contact'])->name('contact');

// Footer-only pages
Route::get('/about-us', [PublicPageController::class, 'aboutUs'])->name('about.us');
Route::get('/our-projects', [PublicPageController::class, 'ourProjects'])->name('our.projects');
Route::get('/contact-us', [PublicPageController::class, 'contactUs'])->name('contact.us');
Route::get('/careers', [PublicPageController::class, 'careers'])->name('careers');
Route::get('/design-process', [PublicPageController::class, 'designProcess'])->name('design.process');
Route::get('/client-stories', [PublicPageController::class, 'clientStories'])->name('client.stories');
Route::get('/branches', [PublicPageController::class, 'branches'])->name('branches');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin - Slider Images (auth protected)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('slider-images', SliderImageController::class)->except(['show']);
    Route::post('slider-images/{slider_image}/toggle', [SliderImageController::class, 'toggleActive'])->name('slider-images.toggle');
    Route::post('slider-images/reorder', [SliderImageController::class, 'reorder'])->name('slider-images.reorder');

    // Admin - Projects (auth protected)
    Route::resource('projects', \App\Http\Controllers\Admin\ProjectController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
