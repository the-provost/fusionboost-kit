<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/admineering', function () {
    return view('auth.admin-login');
});

// Route::get('/home', function () {
//     dd(\Illuminate\Support\Facades\Auth::user());
// });

Route::get('/terms', 'App\Http\Controllers\API\TermController@index')->name('terms');
Route::get('/phoneTerms', 'App\Http\Controllers\API\TermController@getLatestTerms')->name('phoneTerms');

Route::get('/{vue_capture?}', function () {
    return view('home');
})->where('vue_capture', '[\/\w\.-]*');
