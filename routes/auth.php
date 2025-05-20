<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarbeiroController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Livewire\Auth\ConfirmPassword;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Auth\VerifyEmail;

// Rotas públicas (não autenticadas)
Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
    Route::get('forgot-password', ForgotPassword::class)->name('password.request');
    Route::get('reset-password/{token}', ResetPassword::class)->name('password.reset');
});

// Rotas protegidas (requer login)
Route::middleware('auth')->group(function () {
    // Autenticação
    Route::get('verify-email', VerifyEmail::class)->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
    Route::get('confirm-password', ConfirmPassword::class)->name('password.confirm');

    // Rotas dos barbeiros
    Route::resource('barbeiros', BarbeiroController::class);
});

// Logout
Route::post('logout', App\Livewire\Actions\Logout::class)->name('logout');
