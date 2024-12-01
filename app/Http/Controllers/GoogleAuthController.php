<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();

            $user = User::where('google_id', $google_user->getId())->first();

            if (!$user) {
                $new_user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                    'role' => 'user',
                ]);
                Auth::login($new_user);
            } else {
                if (!$user->google_id) {
                    $user->update(['google_id' => $google_user->getId()]);
                }
                Auth::login($user);
            }

            if (Auth::user()->role === 'admin') {
                return redirect('/admin/articlesCRUD');
            }

            return redirect()->route('home');
        } catch (\Throwable $th) {
            Log::error('Google login error: ' . $th->getMessage(), [
                'exception' => $th,
            ]);
            return redirect()->route('login')->with('error', 'Login failed. Please try again.');
        }
    }
}
