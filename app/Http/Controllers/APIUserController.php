<?php

namespace App\Http\Controllers;

use App\Models\User; // Ensure you import the User model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia; // Ensure this line is present

class APIUserController extends Controller
{
    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($request->only('email', 'password'))) {
            // Successful login, return a success response
            return response()->json(['message' => 'Login successful'], 200);
        }

        // If login fails
        return response()->json(['error' => 'The provided credentials do not match our records.'], 401);
    }

    public function register(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Log the user in
        Auth::login($user);

        return Inertia::location('/home'); // Redirects to the home page or appropriate route
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return Inertia::location('/'); // Redirects to the home page or appropriate route
    }
}
