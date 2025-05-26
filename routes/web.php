<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return auth()->user()->role === 'owner'
            ? view('owner-dashboard')
            : view('user-dashboard');
    })->name('dashboard');

    Route::post('/click', [App\Http\Controllers\ClickController::class, 'click']);
});

require __DIR__ . '/auth.php';
