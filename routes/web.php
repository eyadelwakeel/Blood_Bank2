<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\auth;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'],function (){
    Route::get('/',[DashboardController::class,'home'])->name('dashboard');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
