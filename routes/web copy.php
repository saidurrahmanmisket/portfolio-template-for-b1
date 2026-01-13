<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

// Frontend route start from here ===================================>

Route::get('/', [FrontendController::class, 'home'])->middleware('throttle:1,1');

//admin route start from here =====================================>

Route::controller(AdminController::class)->prefix('/admin')->name('admin.')->middleware('admin')->group(function () {

    Route::get('/skills', 'skill')->name('skills');
    Route::post('/skills', 'skillStore')->name('skills.store');

    Route::get('/projects', 'project')->name('projects');
    Route::post('/projects', 'projectStore')->name('projects.store');
});
