<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Página no encontrada | Cread ONG</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/logo.png') }}">
    <meta name="description" content="Lo sentimos, la página que buscas no existe.">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ request()->fullUrl() }}">
    <meta name="keywords" content="ONG, educación, digital, Perú, tecnología, CREAD, programas, donaciones, voluntariado, innovación, aprendizaje, recursos">
    <!-- Open Graph -->
    <meta property="og:title" content="404 - Página no encontrada | Cread ONG">
    <meta property="og:description" content="Lo sentimos, la página que buscas no existe.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->fullUrl() }}">
    <meta property="og:image" content="{{ asset('assets/logocread1.png') }}">
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="404 - Página no encontrada | Cread ONG">
    <meta name="twitter:description" content="Lo sentimos, la página que buscas no existe.">
    <meta name="twitter:image" content="{{ asset('assets/logocread1.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Manrope', sans-serif;
            background-color: #FCF9F6;
        }
        .transition-all {
            transition: all 0.3s ease-in-out;
        }
        .hover-scale {
            transition: transform 0.3s ease-in-out;
        }
        .hover-scale:hover {
            transform: scale(1.05);
        }
        .btn-primary {
            background-color: #FB8E6D;
            color: #fff;
            transition: all 0.3s ease-in-out;
        }
        .btn-primary:hover {
            background-color: #e67e5d;
            transform: scale(1.05);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">
    <div class="container mx-auto px-6 py-12 text-center">
        <div class="mb-8">
            <a href="{{ route('home') }}" class="inline-block">
                <img src="{{ asset('assets/logo.png') }}" alt="Cread Logo" class="h-16 mx-auto hover-scale">
            </a>
        </div>
        
        <h1 class="text-9xl font-bold text-[#FB8E6D] mb-4">404</h1>
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Página no encontrada</h2>
        <p class="text-gray-600 max-w-md mx-auto mb-8">Lo sentimos, la página que estás buscando no existe o ha sido movida.</p>
        
        <div class="flex justify-center space-x-4">
            <a href="{{ route('home') }}" class="btn-primary px-8 py-3 rounded-full font-semibold">
                Volver al inicio
            </a>
            <a href="{{ route('contact') }}" class="bg-black text-white px-8 py-3 rounded-full font-semibold hover:bg-gray-800 transition-all hover:scale-105">
                Contactar soporte
            </a>
        </div>

        <div class="mt-12">
            <img src="https://illustrations.popsy.co/white/resistance-band.svg" alt="404 Illustration" class="max-w-md mx-auto">
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html> 