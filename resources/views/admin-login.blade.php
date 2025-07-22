<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Admin Login - DICAPI</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- reCAPTCHA Script -->
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        
        <!-- Custom Styles for Admin -->
        <style>
            body {
                font-family: 'Kumbh Sans', sans-serif;
                margin: 0;
                padding: 0;
                background-image: url('{{ asset('imagenes/2.jpg') }}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                min-height: 100vh;
            }
            /* Filtro azul encima del fondo */
            .blue-overlay {
                position: fixed;
                inset: 0;
                width: 100vw;
                height: 100vh;
                background: rgba(22, 54, 120, 0.55);
                z-index: 1;
                pointer-events: none;
            }
            
            .login-container {
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 1rem;
            }
            
            .unified-card {
                background: rgba(20, 25, 35, 0.3);
                backdrop-filter: blur(4px);
                border: 1px solid rgba(100, 150, 255, 0.1);
                border-radius: 0;
                box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
                width: 100%;
                max-width: 800px;
                height: auto;
                min-height: 400px;
                display: flex;
                position: relative;
            }
            
            .left-side {
                flex: 1;
                padding: 2rem;
                background: rgba(40, 50, 70, 0.4);
                backdrop-filter: blur(4px);
                display: flex;
                flex-direction: column;
                justify-content: center;
            }
            
            .right-side {
                flex: 1;
                padding: 2rem;
                background: rgba(15, 25, 45, 0.6);
                backdrop-filter: blur(4px);
                display: flex;
                align-items: center;
                justify-content: center;
                position: relative;
            }
            
            .divider-line {
                position: absolute;
                left: 50%;
                top: 0;
                bottom: 0;
                width: 1px;
                background: linear-gradient(to bottom, transparent, rgba(100, 150, 255, 0.3), transparent);
            }
            
            .logo-image {
                max-width: 200px;
                height: auto;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 10;
            }
            
            .login-input {
                width: 100%;
                padding: 0.75rem 1rem;
                background: rgba(60, 70, 90, 0.5);
                border: 1px solid rgba(100, 150, 255, 0.2);
                backdrop-filter: blur(2px);
                color: #e0e0e0;
                border-radius: 0;
                transition: all 0.2s;
            }
            
            .login-input:focus {
                outline: none;
                border-color: rgba(100, 150, 255, 0.5);
                box-shadow: 0 0 0 2px rgba(100, 150, 255, 0.1);
                background: rgba(80, 90, 110, 0.6);
            }
            
            .login-input::placeholder {
                color: rgba(255, 255, 255, 0.5);
            }
            
            .login-button {
                width: 100%;
                padding: 0.75rem 1.5rem;
                background: rgba(50, 70, 100, 0.8);
                color: #e0e0e0;
                border: 1px solid rgba(100, 150, 255, 0.2);
                backdrop-filter: blur(2px);
                border-radius: 0;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.2s;
            }
            
            .login-button:hover {
                background: rgba(70, 90, 120, 0.9);
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            }
            
            .error-message {
                background: rgba(220, 38, 38, 0.3);
                border: 1px solid rgba(220, 38, 38, 0.5);
                color: #fca5a5;
                padding: 0.75rem;
                margin-bottom: 1rem;
                backdrop-filter: blur(2px);
            }
            .error-message-small {
                font-size: 0.8rem;
                line-height: 1.2;
            }
            
            .warning-message {
                background: rgba(245, 158, 11, 0.3);
                border: 1px solid rgba(245, 158, 11, 0.5);
                color: #fde047;
                padding: 0.75rem;
                margin-bottom: 1rem;
                backdrop-filter: blur(2px);
                font-size: 0.8rem;
                line-height: 1.2;
            }
            
            .captcha-container {
                margin-top: 1rem;
                display: flex;
                justify-content: center;
            }
            
            /* Animaciones para el efecto fade-in desde extremos */
            @keyframes slideInFromLeft {
                0% {
                    opacity: 0;
                    transform: translateX(-100px);
                }
                100% {
                    opacity: 1;
                    transform: translateX(0);
                }
            }
            
            @keyframes slideInFromRight {
                0% {
                    opacity: 0;
                    transform: translateX(100px);
                }
                100% {
                    opacity: 1;
                    transform: translateX(0);
                }
            }
            
            @keyframes fadeInJoinLeft {
                0% {
                    opacity: 0;
                    transform: translateX(-120px) scale(0.95);
                }
                60% {
                    opacity: 1;
                    transform: translateX(10px) scale(1.02);
                }
                100% {
                    opacity: 1;
                    transform: translateX(0) scale(1);
                }
            }
            @keyframes fadeInJoinRight {
                0% {
                    opacity: 0;
                    transform: translateX(120px) scale(0.95);
                }
                60% {
                    opacity: 1;
                    transform: translateX(-10px) scale(1.02);
                }
                100% {
                    opacity: 1;
                    transform: translateX(0) scale(1);
                }
            }
            @keyframes fadeInFromLeft {
                0% {
                    opacity: 0;
                    transform: translateX(-80px);
                }
                100% {
                    opacity: 1;
                    transform: translateX(0);
                }
            }
            @keyframes fadeInFromRight {
                0% {
                    opacity: 0;
                    transform: translateX(80px);
                }
                100% {
                    opacity: 1;
                    transform: translateX(0);
                }
            }
            .left-side {
                flex: 1;
                padding: 2rem;
                background: rgba(40, 50, 70, 0.4);
                backdrop-filter: blur(4px);
                display: flex;
                flex-direction: column;
                justify-content: center;
                animation: fadeInFromLeft 2.2s cubic-bezier(0.77, 0, 0.175, 1) forwards;
            }
            .right-side {
                flex: 1;
                padding: 2rem;
                background: rgba(15, 25, 45, 0.6);
                backdrop-filter: blur(4px);
                display: flex;
                align-items: center;
                justify-content: center;
                position: relative;
                animation: fadeInFromRight 2.2s cubic-bezier(0.77, 0, 0.175, 1) forwards;
            }
            
            /* Estado inicial para los elementos internos */
            .login-input, .login-button, h1, label {
                opacity: 0;
                animation: fadeInUp 0.8s ease-out forwards;
                animation-delay: 0.6s;
            }
            
            .login-input:nth-child(1) {
                animation-delay: 0.7s;
            }
            
            .login-input:nth-child(2) {
                animation-delay: 0.8s;
            }
            
            .login-button {
                animation-delay: 0.9s;
            }
            
            @keyframes fadeInUp {
                0% {
                    opacity: 0;
                    transform: translateY(20px);
                }
                100% {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            /* Animación para el logo */
            .logo-image {
                max-width: 200px;
                height: auto;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 10;
                opacity: 0;
                animation: logoFadeIn 1s ease-out forwards;
                animation-delay: 1s;
            }
            
            @keyframes logoFadeIn {
                0% {
                    opacity: 0;
                    transform: translate(-50%, -50%) scale(0.8);
                }
                100% {
                    opacity: 1;
                    transform: translate(-50%, -50%) scale(1);
                }
            }
            
            /* Estilos para la flecha de regreso */
            .back-arrow {
                position: absolute;
                top: 1rem;
                left: 1rem;
                z-index: 30;
                opacity: 0;
                animation: fadeInLeft 0.8s ease-out forwards;
                animation-delay: 1s;
            }
            
            .back-arrow a {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 24px;
                height: 24px;
                color: rgba(255, 255, 255, 0.8);
                text-decoration: none;
                cursor: pointer;
                transition: all 0.3s ease;
            }
            
            .back-arrow a:hover {
                color: #ffffff !important;
                transform: scale(1.2) !important;
            }
            
            .back-arrow svg {
                width: 16px;
                height: 16px;
            }
            
            @keyframes fadeInLeft {
                0% {
                    opacity: 0;
                    transform: translateX(-20px);
                }
                100% {
                    opacity: 1;
                    transform: translateX(0);
                }
            }
            
            @media (max-width: 768px) {
                .unified-card {
                    flex-direction: column;
                    height: auto;
                    max-width: 400px;
                }
                
                .left-side, .right-side {
                    flex: none;
                }
                
                .right-side {
                    height: 200px;
                }
                
                .logo-image {
                    max-width: 120px;
                }
                
                .divider-line {
                    display: none;
                }
                
                .back-arrow {
                    top: 0.5rem;
                    left: 0.5rem;
                }
                
                .back-arrow a {
                    width: 20px;
                    height: 20px;
                }
                
                .back-arrow svg {
                    width: 14px;
                    height: 14px;
                }
            }
            
            @media (max-width: 480px) {
                .logo-image {
                    max-width: 100px;
                }
                
                .right-side {
                    height: 150px;
                }
            }
            
            @media (max-width: 360px) {
                .logo-image {
                    max-width: 80px;
                }
                
                .right-side {
                    height: 120px;
                }
            }
        </style>
    </head>
    <body>
        <div style="position: fixed; inset: 0; width: 100vw; height: 100vh; z-index: 0; background: url('{{ asset('imagenes/2.jpg') }}') center center / cover no-repeat fixed;"></div>
        <div class="blue-overlay"></div>
        
        <div class="login-container" style="position: relative; z-index: 2;">
            <div class="unified-card">
                <div class="divider-line"></div>
                <div class="left-side">
                    <!-- Flecha de regreso -->
                    <div class="back-arrow">
                        <a href="/" title="Volver al inicio">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                        </a>
                    </div>
                    
                    <h1 class="text-3xl font-bold text-white mb-8 text-center">Iniciar Sesión</h1>
                    
                    @if ($errors->any())
                        <div class="error-message error-message-small">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    @php
                        $email = old('email');
                        $failedAttempt = null;
                        if ($email) {
                            $failedAttempt = \App\Models\FailedLoginAttempt::where('email', $email)
                                ->where('ip_address', request()->ip())
                                ->first();
                        }
                    @endphp
                    
                    @if ($failedAttempt && $failedAttempt->attempts >= 2)
                        <div class="warning-message">
                            <strong>⚠️ Advertencia:</strong> 
                            @if ($failedAttempt->attempts >= 3)
                                Se requiere completar el captcha para el próximo intento.
                            @else
                                Después del próximo intento fallido, se requerirá completar un captcha.
                            @endif
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('admin.login') }}" class="space-y-6">
                        @csrf
                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-white mb-2">
                                Correo*
                            </label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                placeholder="Ingrese su correo"
                                value="{{ old('email') }}"
                                class="login-input"
                                required
                            >
                        </div>

                        <!-- Password Field -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-white mb-2">
                                Contraseña*
                            </label>
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                placeholder="Ingrese su contraseña"
                                class="login-input"
                                required
                            >
                        </div>

                        <!-- Captcha Field (solo se muestra después de 3 intentos) -->
                        @if ($failedAttempt && $failedAttempt->requiresCaptcha())
                            <div class="captcha-container">
                                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                            </div>
                        @endif

                        <!-- Login Button -->
                        <button type="submit" class="login-button">
                            Ingresar
                        </button>
                    </form>
                </div>
                
                <div class="right-side">
                    <img src="{{ asset('imagenes/dicapilogo.png') }}" alt="DICAPI Logo" class="logo-image">
                </div>
            </div>
            

        </div>
    </body>
</html> 