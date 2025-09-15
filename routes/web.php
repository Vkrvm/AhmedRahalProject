<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SliderImageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Admin\SubscriberController;

Route::get('/', [PublicPageController::class, 'home'])->name('home');

// Test route
Route::get('/test', function () {
    return 'Test route working!';
});

// Test update route
Route::post('/test-update', function () {
    return 'Update test route working!';
});

Route::get('/about', [PublicPageController::class, 'about'])->name('about');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/contact', [PublicPageController::class, 'contact'])->name('contact');
Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');
Route::post('/careers', [\App\Http\Controllers\CareerController::class, 'store'])->name('career.store');
Route::post('/subscribe', function (\Illuminate\Http\Request $request) {
    $validated = $request->validate([
        'newsletter_email' => 'required|email|max:255|unique:subscribers,email',
    ]);
    \App\Models\Subscriber::create(['email' => $validated['newsletter_email']]);
    return back()->with('subscribe_success', 'Subscribed successfully.');
})->name('subscribe');

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
    Route::post('projects/{project}/update', [\App\Http\Controllers\Admin\ProjectController::class, 'update'])->name('projects.update.post');
    Route::delete('projects/image/{image}', [\App\Http\Controllers\Admin\ProjectController::class, 'deleteImage'])->name('projects.image.delete');

    // Admin - Client Stories (auth protected)
    Route::resource('client-stories', \App\Http\Controllers\Admin\ClientStoryController::class);
    Route::post('client-stories/{client_story}/toggle', [\App\Http\Controllers\Admin\ClientStoryController::class, 'toggleActive'])->name('client-stories.toggle-active');

    // Admin - Subscribers
    Route::resource('subscribers', SubscriberController::class)->only(['index','destroy']);
    Route::get('subscribers-export', [SubscriberController::class, 'export'])->name('subscribers.export');

    // Admin - Home Videos (auth protected)
    Route::resource('home-videos', \App\Http\Controllers\Admin\HomeVideoController::class);
    Route::post('home-videos/{home_video}/toggle', [\App\Http\Controllers\Admin\HomeVideoController::class, 'toggleActive'])->name('home-videos.toggle-active');

    // Admin - Design Comparisons (auth protected)
    Route::resource('design-comparisons', \App\Http\Controllers\Admin\DesignComparisonController::class);
    Route::post('design-comparisons/{design_comparison}/toggle', [\App\Http\Controllers\Admin\DesignComparisonController::class, 'toggleActive'])->name('design-comparisons.toggle-active');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
