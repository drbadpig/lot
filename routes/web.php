<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/test', [TestContorller::class, 'index']);

Route::get('/talk', function () {
    return view('talk.show');
});

Route::get('/category/news', function () {
    return view('talk.category');
});

Route::get('/category/news-lol', function () {
    return view('talk.list');
});

Route::get('/user/{id}', [UserController::class, 'show'])->name('user');
Route::post('/user/background', [UserController::class, 'updateBackground'])->name('user.background');

// settings

Route::group(['prefix' => 'settings', 'middleware' => 'auth'], function() {
    Route::get('/', [SettingsController::class, 'create'])->middleware('auth')->name('settings');
    Route::post('/image', [SettingsController::class, 'updateImage'])->name('settings.image');
    Route::post('/password', [SettingsController::class, 'updatePassword'])->name('settings.password');
    Route::post('/personal', [SettingsController::class, 'updatePersonal'])->name('settings.personal');
});


