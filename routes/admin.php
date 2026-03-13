<?php

use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    
    Route::get('/', function() {
        return redirect()->route('posts.index');
    })->name('admin.dashboard');

    Route::resource('posts', PostController::class);
});