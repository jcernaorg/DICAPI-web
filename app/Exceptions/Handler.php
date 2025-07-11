<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        // Manejar errores 404 y redirigir al dominio principal
        $this->renderable(function (NotFoundHttpException $e, Request $request) {
            // Si estamos en producción (dominio real)
            if (app()->environment('production')) {
                $host = $request->getHost();
                
                // Si el host no es el dominio principal, redirigir
                if ($host !== 'cread.org.pe' && $host !== 'www.cread.org.pe') {
                    return redirect()->away('https://cread.org.pe');
                }
            }
            
            // Si estamos en desarrollo local o es el dominio correcto, mostrar página 404
            return response()->view('errors.404', [], 404);
        });
    }
} 