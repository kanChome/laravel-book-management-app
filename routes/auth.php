<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});

Route::prefix('admin')->group(function () {
    Route::name('admin.')
        ->controller(\App\Http\Controllers\Auth\Admin\AuthenticatedSessionController::class)
        ->group(function () {
            Route::get('login', 'create')->name('create')
                ->middleware('guest:admin');
            Route::post('login', 'store')->name('store')
                ->middleware('guest:admin');
            Route::post('logout', 'destroy')->name('destroy')
                ->middleware('auth:admin');
        });

    Route::prefix('books')
        ->name('book.')
        ->middleware('auth:admin')
        ->controller(BookController::class)
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('/{book}', 'show')
                ->whereNumber('book')->name('show');
            Route::get('/create', 'create')->name('create');
            Route::post('', 'store')->name('store');
            Route::get('/{book}/edit', 'edit')
                ->whereNumber('book')->name('edit');
            Route::put('{book}', 'update')
                ->whereNumber('book')->name('update');
            Route::delete('/{book}', 'destroy')
                ->whereNumber('book')->name('destroy');
        });
});
