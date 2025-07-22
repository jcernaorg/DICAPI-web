<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $publicacion->titulo }} - DICAPI</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Custom Styles for Animations -->
        <style>
            /* Fade-in animations */
            .animate-fade-in {
                animation: fadeIn 0.8s ease-out forwards;
            }
            
            .animate-fade-in-left {
                animation: fadeInLeft 0.8s ease-out forwards;
            }
            
            .animate-fade-in-right {
                animation: fadeInRight 0.8s ease-out forwards;
            }
            
            .animate-fade-in-up {
                animation: fadeInUp 0.8s ease-out forwards;
            }
            
            /* Animation delays */
            .animate-delay-200 { animation-delay: 0.2s; }
            .animate-delay-300 { animation-delay: 0.3s; }
            .animate-delay-400 { animation-delay: 0.4s; }
            .animate-delay-500 { animation-delay: 0.5s; }
            .animate-delay-600 { animation-delay: 0.6s; }
            
            /* Keyframes */
            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }
            
            @keyframes fadeInLeft {
                from { opacity: 0; transform: translateX(-30px); }
                to { opacity: 1; transform: translateX(0); }
            }
            
            @keyframes fadeInRight {
                from { opacity: 0; transform: translateX(30px); }
                to { opacity: 1; transform: translateX(0); }
            }
            
            @keyframes fadeInUp {
                from { opacity: 0; transform: translateY(30px); }
                to { opacity: 1; transform: translateY(0); }
            }
            
            /* Page load animation */
            body {
                opacity: 0;
                transition: opacity 0.5s ease-in-out;
            }
            
            body.loaded {
                opacity: 1;
            }
        </style>
    </head>
    <body class="antialiased">
        <!-- Navbar -->
        <nav class="bg-white shadow-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('imagenes/dicapilogo.png') }}" alt="DICAPI Logo" class="w-8 h-8">
                        </div>
                    </div>
                    
                    <!-- Desktop Menu -->
                    <div class="hidden md:flex items-center space-x-4 lg:space-x-8">
                        <a href="/home" class="text-gray-800 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Inicio</a>
                        <a href="/publicaciones" class="text-gray-800 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Publicaciones</a>
                        <a href="/plantillas" class="text-gray-800 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Plantillas</a>
                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="md:hidden">
                        <button id="mobile-menu-button" class="text-gray-800 hover:text-blue-600 focus:outline-none focus:text-blue-600">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu -->
                <div id="mobile-menu" class="hidden md:hidden">
                    <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t border-gray-200">
                        <a href="/home" class="text-gray-800 hover:text-blue-600 block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200">Inicio</a>
                        <a href="/publicaciones" class="text-gray-800 hover:text-blue-600 block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200">Publicaciones</a>
                        <a href="/plantillas" class="text-gray-800 hover:text-blue-600 block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200">Plantillas</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Top Section with Dark Blue Background -->
        <div class="bg-blue-900 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
                    <!-- Left Side - Content -->
                    <div class="space-y-6 animate-fade-in-left animate-delay-200">
                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight animate-fade-in animate-delay-300">
                            {{ $publicacion->titulo }}
                        </h1>
                        
                        <div class="space-y-3 text-lg sm:text-xl animate-fade-in animate-delay-400">
                            <p><span class="font-semibold">Autoría:</span> SPDA</p>
                            <p><span class="font-semibold">Año:</span> {{ date('Y', strtotime($publicacion->fecha)) }}</p>
                            <p><span class="font-semibold">Tamaño:</span> 1.19 Mb</p>
                        </div>
                        
                        @if($publicacion->pdf)
                        <a href="{{ route('publicaciones.download', $publicacion->id) }}" class="inline-block border-2 border-white text-white px-8 sm:px-10 py-4 rounded-none hover:bg-white hover:text-blue-900 transition-colors duration-200 font-semibold hover-lift animate-fade-in animate-delay-500 text-base sm:text-lg">
                            DESCARGAR
                        </a>
                        @else
                        <button class="border-2 border-gray-400 text-gray-400 px-8 sm:px-10 py-4 rounded-none cursor-not-allowed font-semibold animate-fade-in animate-delay-500 text-base sm:text-lg" disabled>
                            NO DISPONIBLE
                        </button>
                        @endif
                    </div>
                    
                    <!-- Right Side - Image -->
                    <div class="flex items-center justify-center animate-fade-in-right animate-delay-400">
                        @if($publicacion->imagen && file_exists(public_path('storage/publicaciones/' . $publicacion->imagen)))
                        <div class="h-96 sm:h-112 lg:h-128 w-full max-w-lg overflow-hidden" style="background-image: url('{{ asset('storage/publicaciones/' . $publicacion->imagen) }}'); background-size: cover; background-position: center;">
                        </div>
                        @else
                        <div class="bg-gray-100 h-96 sm:h-112 lg:h-128 w-full max-w-lg flex items-center justify-center">
                            <svg class="w-20 h-20 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Section with White Background -->
        <div class="bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <!-- Description -->
                <div class="max-w-4xl mx-auto mb-12 animate-fade-in animate-delay-600">
                    <p class="text-lg text-gray-600 leading-relaxed text-justify animate-fade-in animate-delay-700">
                        @if($publicacion->resumen)
                            {{ $publicacion->resumen }}
                        @else
                            Cada año, el comercio ilegal de fauna silvestre (IWT, por sus siglas en inglés) en Perú amenaza la conservación de las especies, la salud pública y el bienestar de miles de animales en toda la región amazónica. Este innovador proyecto de investigación utilizó un novedoso enfoque para recopilar la evidencia necesaria con el fin de fomentar un cambio positivo en el comportamiento humano y lograr que, tanto los consumidores como los vendedores, se alejen de este tipo de comercio.
                        @endif
                    </p>
                </div>

                <!-- Navigation -->
                <div class="flex justify-center items-center max-w-4xl mx-auto animate-fade-in animate-delay-700">
                    <!-- Back Button -->
                    <a href="/publicaciones" class="flex items-center text-gray-600 hover:text-gray-800 transition-colors duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        VOLVER
                    </a>
                </div>
            </div>
        </div>

        <!-- Mobile Menu JavaScript -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const mobileMenuButton = document.getElementById('mobile-menu-button');
                const mobileMenu = document.getElementById('mobile-menu');
                const body = document.body;
                
                // Page load animation
                function startPageAnimation() {
                    body.classList.add('loaded');
                }
                
                // Start animations when page is fully loaded
                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', startPageAnimation);
                } else {
                    startPageAnimation();
                }
                
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
                
                // Close menu when clicking outside
                document.addEventListener('click', function(event) {
                    if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                        mobileMenu.classList.add('hidden');
                    }
                });
            });
        </script>
    </body>
</html> 