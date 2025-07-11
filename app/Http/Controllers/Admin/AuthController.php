<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /**
     * Show the admin login page
     */
    public function showLogin()
    {
        return view('admin.auth.login');
    }

    /**
     * Redirect to Google OAuth
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle Google OAuth callback
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::updateOrCreate([
                'google_id' => $googleUser->id,
            ], [
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'avatar' => $googleUser->avatar,
                'is_admin' => true, // Por ahora todos los usuarios de Google serán admin
            ]);

            Auth::login($user);

            // Redirigir según el entorno
            $redirectUrl = app()->environment('production') 
                ? config('services.app.production_url') . config('services.app.admin_dashboard_url')
                : route('admin.dashboard');
                
            return redirect()->away($redirectUrl)->with('success', '¡Bienvenido al panel de administración!');

        } catch (\Exception $e) {
            // Redirigir según el entorno
            $redirectUrl = app()->environment('production') 
                ? config('services.app.production_url') . config('services.app.admin_login_url')
                : route('admin.login');
                
            return redirect()->away($redirectUrl)->with('error', $e->getMessage());
        }
    }

    /**
     * Logout admin user
     */
    public function logout()
    {
        Auth::logout();
        // Redirigir según el entorno
        $redirectUrl = app()->environment('production') 
            ? config('services.app.production_url') . config('services.app.admin_login_url')
            : route('admin.login');
            
        return redirect()->away($redirectUrl)->with('success', 'Sesión cerrada correctamente.');
    }
}
