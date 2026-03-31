<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GoveroratController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\website\HomeController;
use App\Http\Controllers\website\PostController;

// Website Routes

Route::group(['as' => 'website.'],function () {
    Route::get('/', HomeController::class . '@index')->name('home');
    Route::get('posts', PostController::class . '@posts')->name('posts');
});





Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/login', function () {
        return view('auth.login');
    })->name('login')->middleware('guest:admin');

    Route::post('/login', [LoginController::class, 'login'])
        ->name('login.submit')->middleware('guest:admin');

        Route::post('/logout', function () {
        Auth::guard('admin')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    })->name('logout');

    // Dashboard
    Route::middleware('auth:admin')->group(function () {
        Route::get('/', [DashboardController::class, 'home'])->name('dashboard');
        // governorates routes
        Route::resource('governorates', GoveroratController::class);
        // users routes
        Route::resource('users', UserController::class);
        Route::patch('users/{user}/toggle', [UserController::class, 'toggle'])->name('users.toggle');

        // categories routes
        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
        // posts routes
        Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
        // donation requests routes
        Route::resource('donation-requests', \App\Http\Controllers\Admin\DonationRequestController::class);
        

        Route::resource('admins',AdminController::class);
            // Route::get('/admin/profile', [AdminController::class, 'edit'])->name('profile.edit');
            // Route::post('/admin/profile', [AdminController::class, 'update'])->name('profile.update');

        
        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::get('/settings/edit', [SettingController::class, 'edit'])->name('settings.edit');
        Route::match(['POST', 'PUT'], '/settings/edit', [SettingController::class, 'update'])->name('settings.update');
        
    });
});

Auth::routes();

