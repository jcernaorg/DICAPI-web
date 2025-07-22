<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Http;

class VerifyRecaptcha
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $recaptchaToken = $request->input('g-recaptcha-response');
        
        if (!$recaptchaToken) {
            return back()->withErrors([
                'recaptcha' => 'Por favor, complete el captcha.'
            ])->withInput();
        }

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $recaptchaToken,
            'remoteip' => $request->ip()
        ]);

        $result = $response->json();

        if (!$result['success']) {
            return back()->withErrors([
                'recaptcha' => 'Verificación del captcha fallida. Por favor, inténtelo de nuevo.'
            ])->withInput();
        }

        return $next($request);
    }
}
