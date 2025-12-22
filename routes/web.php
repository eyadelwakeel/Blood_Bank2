<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\auth;

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {

    // صفحة تسجيل الدخول
    Route::get('/login', function () {
        return view('auth.login');
    })->name('admin.login')->middleware('guest:admin');

    // تنفيذ تسجيل الدخول
    Route::post('/login', [LoginController::class, 'login'])
        ->name('admin.login.submit');

    // تسجيل الخروج
    Route::post('/logout', function () {
        Auth::guard('admin')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('admin.login');
    })->name('admin.logout');

    // Dashboard
    Route::middleware('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'home'])
            ->name('admin.dashboard');
    });
});

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->middleware('auth')
    ->name('home');