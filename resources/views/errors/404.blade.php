<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Error 404 - No encontrado</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        html, body {
            height: 100%;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        .error-bg {
            background-image: url('{{ asset('imagenes/2.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            min-height: 100vh;
            height: 100%;
        }
        .error-illustration {
            width: 160px;
            max-width: 40vw;
            margin-bottom: 2rem;
            opacity: 0.85;
            filter: drop-shadow(0 4px 24px rgba(60,114,252,0.10));
        }
        .error-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(22, 20, 44, 0.9);
            z-index: 1;
        }
        .error-content {
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
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
        /* Animación fade-in sin desplazamiento */
        .animate-fade-in {
            animation: fadeInOnlyOpacity 1.5s ease-out forwards;
            opacity: 0;
        }
        @keyframes fadeInOnlyOpacity {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body class="antialiased error-bg">
    <!-- Main Content -->
    <div class="min-h-screen flex flex-col items-center justify-center py-16 animate-fade-in animate-delay-400 error-content">
        <img src="{{ asset('imagenes/dicapilogo.png') }}" alt="DICAPI Logo" class="error-illustration">
        <h1 class="text-4xl font-bold mb-4 animate-fade-in animate-delay-600 error-text text-center">404 - Página no encontrada</h1>
        <p class="text-lg mb-8 text-center animate-fade-in animate-delay-700 error-text">La página que buscas no existe o ha sido movida.<br>Por favor, verifica la URL o regresa al inicio.</p>
        <a href="/" class="error-btn animate-fade-in animate-delay-800">Ir al inicio</a>
    </div>
</body>
</html> 