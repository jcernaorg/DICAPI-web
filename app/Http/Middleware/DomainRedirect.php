<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DomainRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Solo aplicar en producción
        if (app()->environment('production')) {
            $host = $request->getHost();
            $path = $request->getPathInfo();
            
            // Lista de dominios que deben redirigir al principal
            $redirectDomains = [
                'cread.org',
                'www.cread.org',
                'cread.pe',
                'www.cread.pe',
                // Agregar más dominios según sea necesario
            ];
            
            // Si el dominio está en la lista de redirección
            if (in_array($host, $redirectDomains)) {
                $targetUrl = 'https://cread.org.pe' . $path;
                return redirect()->away($targetUrl, 301); // Redirección permanente
            }
            
            // Si es un subdominio no autorizado (excepto www)
            if (!in_array($host, ['cread.org.pe', 'www.cread.org.pe']) && str_contains($host, 'cread')) {
                return redirect()->away('https://cread.org.pe' . $path, 301);
            }
        }
        
        return $next($request);
    }
} 