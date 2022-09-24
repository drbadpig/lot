<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestContorller;
use App\Http\Controllers\User\SettingsController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// test

Route::get('/test', [TestContorller::class, 'index']);

// home

Route::get('/', [HomeController::class, 'index'])->name('home');

// auth

require __DIR__.'/auth.php';

// talk

Route::get('/talk/create', [\App\Http\Controllers\Talk\IndexController::class, 'create'])->middleware('auth')->name('talk.create');

// category

Route::get('/category/{id}', [\App\Http\Controllers\Category\IndexController::class, 'index'])->name('category');

// user

Route::group(['prefix' => 'user'], function() {
    Route::get('/{id}', [UserController::class, 'show'])->name('user');
    Route::post('/background', [UserController::class, 'updateBackground'])->middleware('auth')->name('user.background');
});

// settings

Route::group(['prefix' => 'settings', 'middleware' => 'auth'], function() {
    Route::get('/', [SettingsController::class, 'create'])->name('settings');
    Route::post('/image', [SettingsController::class, 'updateImage'])->name('settings.image');
    Route::post('/password', [SettingsController::class, 'updatePassword'])->name('settings.password');
    Route::post('/personal', [SettingsController::class, 'updatePersonal'])->name('settings.personal');
});

// admin

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/', [\App\Http\Controllers\Admin\IndexController::class, 'index'])->name('admin');

    Route::group(['prefix' => 'users'], function() {
        Route::get('/', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user.index');
        Route::get('/{id}', [\App\Http\Controllers\Admin\UserController::class, 'show'])->name('admin.user.show');
        Route::get('/{id}/edit', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.user.edit');
        Route::post('/{id}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.user.update');
        Route::post('/{id}/photo', [\App\Http\Controllers\Admin\UserController::class, 'deleteImage'])->name('admin.user.photo');
        Route::post('/{id}/delete', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.user.destroy');
    });

    Route::group(['prefix' => 'roles'], function() {
        Route::get('/', [\App\Http\Controllers\Admin\RoleController::class, 'index'])->name('admin.role.index');
        Route::get('/create', [\App\Http\Controllers\Admin\RoleController::class, 'create'])->name('admin.role.create');
        Route::post('/', [\App\Http\Controllers\Admin\RoleController::class, 'store'])->name('admin.role.store');
        Route::get('/{id}', [\App\Http\Controllers\Admin\RoleController::class, 'show'])->name('admin.role.show');
        Route::get('/{id}/edit', [\App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('admin.role.edit');
        Route::post('/{id}', [\App\Http\Controllers\Admin\RoleController::class, 'update'])->name('admin.role.update');
        Route::post('/{id}/delete', [\App\Http\Controllers\Admin\RoleController::class, 'destroy'])->name('admin.role.destroy');
    });

    Route::group(['prefix' => 'backgrounds'], function() {
        Route::get('/', [\App\Http\Controllers\Admin\BackgroundImageController::class, 'index'])->name('admin.background.index');
        Route::get('/create', [\App\Http\Controllers\Admin\BackgroundImageController::class, 'create'])->name('admin.background.create');
        Route::post('/', [\App\Http\Controllers\Admin\BackgroundImageController::class, 'store'])->name('admin.background.store');
        Route::get('/{id}', [\App\Http\Controllers\Admin\BackgroundImageController::class, 'show'])->name('admin.background.show');
        Route::get('/{id}/edit', [\App\Http\Controllers\Admin\BackgroundImageController::class, 'edit'])->name('admin.background.edit');
        Route::post('/{id}', [\App\Http\Controllers\Admin\BackgroundImageController::class, 'update'])->name('admin.background.update');
        Route::post('/{id}/delete', [\App\Http\Controllers\Admin\BackgroundImageController::class, 'destroy'])->name('admin.background.destroy');
    });

    Route::group(['prefix' => 'category-folders'], function() {
        Route::get('/', [\App\Http\Controllers\Admin\CategoryFolderController::class, 'index'])->name('admin.folder.index');
        Route::get('/create', [\App\Http\Controllers\Admin\CategoryFolderController::class, 'create'])->name('admin.folder.create');
        Route::post('/', [\App\Http\Controllers\Admin\CategoryFolderController::class, 'store'])->name('admin.folder.store');
        Route::get('/{id}', [\App\Http\Controllers\Admin\CategoryFolderController::class, 'show'])->name('admin.folder.show');
        Route::get('/{id}/edit', [\App\Http\Controllers\Admin\CategoryFolderController::class, 'edit'])->name('admin.folder.edit');
        Route::post('/{id}', [\App\Http\Controllers\Admin\CategoryFolderController::class, 'update'])->name('admin.folder.update');
        Route::post('/{id}/delete', [\App\Http\Controllers\Admin\CategoryFolderController::class, 'destroy'])->name('admin.folder.destroy');
    });

    Route::group(['prefix' => 'categories'], function() {
        Route::get('/', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/create', [\App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('admin.category.show');
        Route::get('/{id}/edit', [\App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.category.update');
        Route::post('/{id}/delete', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('admin.category.destroy');
    });
});


