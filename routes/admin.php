<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    
    Route::get('/', function() {
        return redirect()->route('posts.index');
    })->name('admin.dashboard');

    Route::resource('posts', PostController::class);
});