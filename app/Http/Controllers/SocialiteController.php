<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Throwable;

class SocialiteController extends Controller
{
    // Redirect the user to the social provider's login page
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect(); // google | facebook
    }

    // Handle the callback after the user logs in via the social provider
    public function callback($provider)
    {
        try {
            // Retrieve user data from the social provider
            $provider_user = Socialite::driver($provider)->user();

            // Login
            // Check if a user with the same provider and provider_id exists in the database
            $user = User::where([
                'provider' => $provider, // google
                'provider_id' => $provider_user->id // ###
            ])->first(); // Get One user 


            // Register
            // If no user exists, create a new user record
            if (!$user) {
                $user = User::create([
                    'name' => $provider_user->name,
                    'email' => $provider_user->email,
                    'password' => Hash::make(Str::random(8)), // Generate any random password
                    'provider' => $provider,
                    'provider_id' => $provider_user->id,
                    'provider_token' => $provider_user->token,
                ]);
            }

            Auth::login($user); // Laravel breeze

            return redirect()->route('home');
        } catch (Throwable $e) {
            return redirect()->route('login')->withErrors([
                'email' => $e->getMessage(),
            ]);
        }
    }
}
