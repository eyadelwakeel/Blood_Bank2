<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\auth;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'],function (){
    Route::get('/',[DashboardController::class,'home'])->name('dashboard');

    Auth::routes();

    Route::group(['middelware' => 'admin'], function(){
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    });

});




Route::post('/admin/logout', function () {
    Auth::guard('admin')->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('admin/login');
})->name('admin.logout');

