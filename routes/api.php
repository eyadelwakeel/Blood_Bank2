<?php

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\DonationRequestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\GeneralController;
use App\Http\Controllers\Api\v1\NotificationSettingController;
use App\Http\Controllers\Api\v1\PostController;
use App\Http\Controllers\Api\v1\ResetPasswordController;
use App\Http\Controllers\Api\v1\UserDataController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('blood_types',[GeneralController::class,'blood_types']);
Route::get('governoeates',[GeneralController::class,'governoeates']);
Route::get('cities',[GeneralController::class,'cities']);

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

Route::post ('forget-password',[ResetPasswordController::class,'forgetPassword']);

Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::get('posts',[PostController::class,'index']);

    Route::apiResource('donation-request',DonationRequestController::class)
        ->except(['update','destroy']);
        // index=>(get)donation-request store=>(post)donation-request

    Route::post('notification-setting',[NotificationSettingController::class,'store']);
    Route::get('notification-setting',[NotificationSettingController::class,'getSettings']);


    Route::get('user-data',[UserDataController::class,'show']);
    Route::post('user-data',[UserDataController::class,'update']);

});


