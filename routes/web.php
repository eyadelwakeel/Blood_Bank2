<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GoveroratController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\auth;
use App\Http\Controllers\Auth\LoginController;


Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {

    // صفحة تسجيل الدخول
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login')->middleware('guest:admin');

    // تنفيذ تسجيل الدخول
    Route::post('/login', [LoginController::class, 'login'])
        ->name('login.submit')->middleware('guest:admin');
    // تسجيل الخروج
    Route::post('/logout', function () {
        Auth::guard('admin')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    })->name('logout');

    // Dashboard
    Route::middleware('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'home'])->name('dashboard');
        Route::resource('governorates', GoveroratController::class);
        Route::resource('users', UserController::class);
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