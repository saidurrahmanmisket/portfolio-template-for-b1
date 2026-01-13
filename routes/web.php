<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;

// Frontend route start from here ===================================>

Route::get('/', [FrontendController::class, 'home']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::controller(AdminController::class)->prefix('/admin')->name('admin.')->middleware('auth')->group(function () {

    Route::get('/skills', 'skill')->name('skills');
    Route::post('/skills', 'skillStore')->name('skills.store');

    Route::get('/projects', 'project')->name('projects');
    Route::post('/projects', 'projectStore')->name('projects.store');

    // Route::get('/cms', 'cms')->name('cms.index');
    // Route::get('/cms/create', 'cmsCreate')->name('cms.create');
    // Route::get('/cms/{id}/edit', 'cmsEdit')->name('cms.edit');
    // Route::get('/cms/{id}/show', 'cmsShow')->name('cms.show');


    // Route::post('/cms/store', 'cmsStore')->name('cms.store');
    // Route::post('/cms/update/{id}', 'cmsUpdate')->name('cms.update');
    // Route::post('/cms/delete/{id}', 'cmsDelete')->name('cms.delete');

    Route::resource('/cms', CmsController::class);

    });

require __DIR__.'/auth.php';
