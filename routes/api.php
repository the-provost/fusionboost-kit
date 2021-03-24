<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'app'], function () {
    Route::post('/login', 'App\Http\Controllers\APIUserController@login');
    Route::post('/register', 'App\Http\Controllers\APIUserController@register');
    Route::get('/logout', 'App\Http\Controllers\APIUserController@logout')->middleware('auth:api');
});

// API VERIFICATION AND PASSWORD RESET AND FORGET
Route::post('/password/email', 'App\Http\Controllers\API\ForgotPasswordController@sendResetLinkEmail');
Route::post('/password/reset', 'App\Http\Controllers\API\ResetPasswordController@reset');
Route::get('/email/resend', 'App\Http\Controllers\API\VerificationController@resend')->name('verification.resend');
Route::get('/email/verify/{id}/{hash}', 'App\Http\Controllers\API\VerificationController@verify')->name('verification.verify');
Route::get('/verified','App\Http\Controllers\API\VerificationController@getStatus')->name('verification.check');



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
