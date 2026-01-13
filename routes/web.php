<?php

use Illuminate\Support\Facades\Route;
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
});

require __DIR__.'/auth.php';
