<?php

use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin/books')
    ->name('book.')
    ->controller(BookController::class)
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('/{id}', 'show')
            ->whereNumber('id')->name('show');
        Route::get('/create', 'create')->name('create');
        Route::post('', 'store')->name('store');
    });
