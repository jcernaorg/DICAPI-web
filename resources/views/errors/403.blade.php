<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Error 403 - Prohibido</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .error-illustration {
            width: 320px;
            max-width: 90vw;
            margin-bottom: 2rem;
            opacity: 0.85;
            filter: drop-shadow(0 4px 24px rgba(60,114,252,0.10));
        }
        
        .error-bg {
            background-image: url('{{ asset('imagenes/2.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
        }
        
        .error-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 6, 12, 0.8) 0%, rgba(60, 114, 252, 0.6) 50%, rgba(0, 6, 12, 0.9) 100%);
            z-index: 1;
        }
        
        .error-content {
            position: relative;
            z-index: 2;
        }
        
        .error-text {
            color: white;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .error-btn {
            background: linear-gradient(135deg, #3c72fc 0%, #1e40af 100%);
            color: white;
            padding: 12px 24px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(60, 114, 252, 0.4);
        }
        
        .error-btn:hover {
            background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(60, 114, 252, 0.6);
        }
    </style>
</head>
<body class="antialiased error-bg">
    <!-- Navbar -->
    <nav class="bg-blue-900/90 backdrop-blur-sm shadow-lg animate-fade-in animate-delay-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img src="{{ asset('imagenes/dicapilogo.png') }}" alt="DICAPI Logo" class="w-8 h-8">
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-4 lg:space-x-8">
                    <a href="/home" class="text-white hover:text-blue-200 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Inicio</a>
                    <a href="/publicaciones" class="text-white hover:text-blue-200 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Publicaciones</a>
                    <a href="/plantillas" class="text-white hover:text-blue-200 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Plantillas</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Main Content -->
    <div class="min-h-[70vh] flex flex-col items-center justify-center py-16 animate-fade-in animate-delay-400 error-content">
        <img src="{{ asset('imagenes/dicapilogo.png') }}" alt="DICAPI Logo" class="error-illustration animate-fade-in-up animate-delay-500">
        <h1 class="text-4xl font-bold mb-4 animate-fade-in animate-delay-600 error-text">403 - Prohibido</h1>
        <p class="text-lg mb-8 text-center animate-fade-in animate-delay-700 error-text">No tienes permisos para acceder a este recurso.<br>Si crees que es un error, contacta al administrador.</p>
        <a href="/" class="error-btn animate-fade-in animate-delay-800">Ir al inicio</a>
    </div>
</body>
</html> 