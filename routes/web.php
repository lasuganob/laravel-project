<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin;
use App\Http\Controllers\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/',[User\UserPostController::class, 'index'])->name('home');

    // Routes for ajax route call (datatables)
    Route::get('/admin/posts/data', [Admin\AdminPostController::class, 'getPosts'])->name('admin.posts.data');
    Route::get('/user/posts/data',[User\UserPostController::class, 'getPosts'])->name('user.posts.data');

    // Admin Routes
    Route::middleware('is_admin')->group(function () {
        Route::resource('/admin/posts', Admin\AdminPostController::class, [
            'names' => [
                'index' => 'admin.posts.index',
                'show' => 'admin.posts.show',
                'create' => 'admin.posts.create',
                'edit' => 'admin.posts.edit',
                'destroy' => 'admin.posts.destroy',
            ]
        ])->except(['store', 'update']);

        Route::middleware('sanitize')->group(function () {
            Route::resource('/admin/posts', Admin\AdminPostController::class, [
                'names' => [
                    'store' => 'admin.posts.store',
                    'update' => 'admin.posts.update',
                ]
            ])->only(['store', 'update']);
        });
    });

    //User Route
    Route::middleware('is_user')->group(function () {
        Route::resource('/user/posts', User\UserPostController::class, [
            'names' => [
                'index' => 'user.posts.index',
                'show' => 'user.posts.show',
                'create' => 'user.posts.create',
                'edit' => 'user.posts.edit',
                'destroy' => 'user.posts.destroy',
            ]
        ])->except(['store', 'update']);

        Route::middleware('sanitizeText')->group(function () {
            Route::resource('/user/posts', User\UserPostController::class, [
                'names' => [
                    'store' => 'user.posts.store',
                    'update' => 'user.posts.update',
                ]
            ])->only(['store', 'update']);
        });
    });
 });

require __DIR__.'/auth.php';
