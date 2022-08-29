<?php

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

Route::prefix('cool_words')->name('cool_words.')->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/new', \App\Http\Controllers\Web\CoolWord\Admin\NewController::class)->name('new');
        Route::post('/create', \App\Http\Controllers\Web\CoolWord\Admin\CreateController::class)->name('create');
        Route::get('/{id}', \App\Http\Controllers\Web\CoolWord\Admin\EditController::class)->name('show');
        Route::put('/{id}', \App\Http\Controllers\Web\CoolWord\Admin\UpdateController::class)->name('update');
    });
});
