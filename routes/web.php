<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function(){
    return redirect()->to(route('login'));
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
