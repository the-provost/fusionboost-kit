<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIUserController;
use Inertia\Inertia;

// Grouping routes under 'app' prefix
Route::prefix('app')->group(function () {

    // Login route
    Route::get('/login', function () {
        return Inertia::render('Login'); // Render the Vue component for login
    })->name('login');

    Route::post('/login', [APIUserController::class, 'login'])->name('login'); // Handles login

    // Register route
    Route::get('/register', function () {
        return Inertia::render('Register'); // Render the Vue component for register
    })->name('register');

    Route::post('/register', [APIUserController::class, 'register'])->name('register'); // Handles registration

    // Protected routes
    Route::middleware('auth:api')->group(function () {

        // Logout route
        Route::post('/logout', [APIUserController::class, 'logout'])->name('logout');

        // Home route (protected)
        Route::get('/home', function () {
            return Inertia::render('Home'); // Render the Vue component for the Home page
        })->name('home');
    });
});
