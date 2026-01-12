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
        // governorates routes
        Route::resource('governorates', GoveroratController::class);
        // users routes
        Route::resource('users', UserController::class);
        Route::patch('users/{user}/toggle', [UserController::class, 'toggle'])->name('users.toggle');

        // categories routes
        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);});
        // posts routes
        Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
        // donation requests routes
        Route::resource('donation_requests', \App\Http\Controllers\Admin\DonationRequestController::class);
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