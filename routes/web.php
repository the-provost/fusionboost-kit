<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

// // Catch-all route for Vue.js
// Route::get('/{vue_capture?}', function () {
//     return view('home'); // Home view loads your Vue app
// })->where('vue_capture', '[\/\w\.-]*');

// Terms routes for web
Route::get('/terms', 'App\Http\Controllers\API\TermController@index')->name('terms');
Route::get('/phoneTerms', 'App\Http\Controllers\API\TermController@getLatestTerms')->name('phoneTerms');
