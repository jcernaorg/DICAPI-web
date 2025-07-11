<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Cread ONG')</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/dicapilogo.png') }}">
    <meta name="description" content="@yield('description', 'Cread ONG - Ayudando a quienes más lo necesitan')">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="{{ request()->fullUrl() }}">
    <link rel="sitemap" type="application/xml" title="Sitemap" href="{{ url('/sitemap.xml') }}">
    <meta name="keywords" content="ONG Perú, educación digital, tecnología educativa, CREAD, programas sociales, donaciones Perú, voluntariado Lima, innovación educativa, aprendizaje digital, recursos educativos, desarrollo comunitario, impacto social, transformación digital, inclusión tecnológica, empoderamiento digital">
    <meta name="author" content="CREAD ONG">
    <meta name="geo.region" content="PE">
    <meta name="geo.placename" content="Lima, Perú">
    <meta name="geo.position" content="-12.0464;-77.0428">
    <meta name="ICBM" content="-12.0464, -77.0428">
    <!-- Open Graph -->
    <meta property="og:title" content="@yield('title', 'CREAD ONG - Transformando vidas a través de la educación digital en Perú')">
    <meta property="og:description" content="@yield('description', 'CREAD es una ONG peruana dedicada a la educación digital y el desarrollo comunitario. Ofrecemos programas educativos, voluntariado y donaciones para transformar vidas en Perú.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->fullUrl() }}">
    <meta property="og:image" content="{{ asset('assets/dicapilogo.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name" content="CREAD ONG">
    <meta property="og:locale" content="es_PE">
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'CREAD ONG - Transformando vidas a través de la educación digital en Perú')">
    <meta name="twitter:description" content="@yield('description', 'CREAD es una ONG peruana dedicada a la educación digital y el desarrollo comunitario. Ofrecemos programas educativos, voluntariado y donaciones para transformar vidas en Perú.')">
    <meta name="twitter:image" content="{{ asset('assets/dicapilogo.png') }}">
    <meta name="twitter:site" content="@creadong">
    <!-- Datos Estructurados JSON-LD -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "NonProfit",
        "name": "CREAD ONG",
        "alternateName": "CREAD",
        "description": "Organización no gubernamental peruana dedicada a la educación digital y el desarrollo comunitario",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('assets/dicapilogo.png') }}",
        "image": "{{ asset('assets/dicapilogo.png') }}",
        "address": {
            "@type": "PostalAddress",
            "addressCountry": "PE",
            "addressRegion": "Lima",
            "addressLocality": "Lima"
        },
        "contactPoint": {
            "@type": "ContactPoint",
            "contactType": "customer service",
            "availableLanguage": ["Spanish", "English"]
        },
        "sameAs": [
            "https://www.facebook.com/creadong",
            "https://www.instagram.com/creadong",
            "https://www.linkedin.com/company/creadong"
        ],
        "foundingDate": "2020",
        "areaServed": {
            "@type": "Country",
            "name": "Perú"
        },
        "serviceType": ["Educación Digital", "Desarrollo Comunitario", "Programas Sociales"],
        "hasOfferCatalog": {
            "@type": "OfferCatalog",
            "name": "Programas Educativos",
            "itemListElement": [
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Programas de Educación Digital"
                    }
                },
                {
                    "@type": "Offer", 
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Voluntariado"
                    }
                }
            ]
        }
    }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Manrope', sans-serif;
            background-color: #FCF9F6;
        }
        
        /* Sistema de Tipografía Consistente - Versión Compacta */
        .text-hero {
            font-size: clamp(2rem, 4vw, 3.5rem);
            line-height: 1.1;
            font-weight: 800;
        }
        
        .text-display {
            font-size: clamp(1.75rem, 3.5vw, 3rem);
            line-height: 1.2;
            font-weight: 700;
        }
        
        .text-heading-1 {
            font-size: clamp(1.5rem, 3vw, 2.5rem);
            line-height: 1.3;
            font-weight: 700;
        }
        
        .text-heading-2 {
            font-size: clamp(1.25rem, 2.5vw, 2rem);
            line-height: 1.4;
            font-weight: 600;
        }
        
        .text-heading-3 {
            font-size: clamp(1.125rem, 2vw, 1.75rem);
            line-height: 1.4;
            font-weight: 600;
        }
        
        .text-body-large {
            font-size: clamp(1rem, 1.75vw, 1.125rem);
            line-height: 1.6;
            font-weight: 400;
        }
        
        .text-body {
            font-size: clamp(0.875rem, 1.25vw, 1rem);
            line-height: 1.6;
            font-weight: 400;
        }
        
        .text-body-small {
            font-size: clamp(0.75rem, 1vw, 0.875rem);
            line-height: 1.5;
            font-weight: 400;
        }
        
        .text-caption {
            font-size: clamp(0.625rem, 0.875vw, 0.75rem);
            line-height: 1.4;
            font-weight: 400;
        }
        
        /* Responsividad Mejorada */
        .container-responsive {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 clamp(1rem, 3vw, 2rem);
        }
        
        .section-responsive {
            padding: clamp(1.5rem, 4vw, 3rem) 0;
        }
        
        .grid-responsive {
            display: grid;
            gap: clamp(0.75rem, 2.5vw, 1.5rem);
        }
        
        /* Breakpoints Responsivos */
        @media (min-width: 640px) {
            .grid-responsive {
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            }
        }
        
        @media (min-width: 768px) {
            .grid-responsive {
                grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            }
        }
        
        @media (min-width: 1024px) {
            .grid-responsive {
                grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            }
        }
        
        /* Utilidades de Transición */
        .transition-all {
            transition: all 0.3s ease-in-out;
        }
        
        .dropdown-menu-column {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .dropdown-menu-column a {
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
        }
        
        /* Estilos para enlaces del navbar - solo negrita sin movimiento */
        .navbar-link {
            font-family: 'Manrope', sans-serif !important;
            font-weight: 400; /* font-normal */
            color: #fff;
            padding: 0 0.5rem;
            font-size: 1rem;
            letter-spacing: 0.04em;
        }

        .navbar-link:hover, .navbar-link:focus {
            font-family: 'Manrope', sans-serif !important;
            font-weight: 700 !important; /* font-bold */
        }
        
        /* Estilos para el navbar cuando está sobre contenido blanco */
        header.bg-white .navbar-link {
            color: #1f2937 !important; /* text-gray-800 */
        }
        
        header.bg-white .navbar-link:hover {
            color: #111827 !important; /* text-gray-900 */
        }
        
        .dropdown-menu-column a:hover {
            color: #FB8E6D !important;
        }
        
        .btn-donar {
            background-color: #FB8E6D;
            color: #fff;
            transition: all 0.3s ease-in-out;
        }
        
        .btn-donar:hover {
            background-color: #e67e5d;
            transform: scale(1.05);
        }
        
        .logo-text {
            transition: filter 0.3s ease-in-out;
        }
        
        .logo-text:hover {
            filter: brightness(0.8);
        }
        
        /* Mejoras de Accesibilidad */
        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
        
        /* Mejoras para Dispositivos Móviles */
        @media (max-width: 768px) {
            .mobile-optimized {
                padding: 1rem;
            }
            
            .mobile-text-center {
                text-align: center;
            }
            
            .mobile-stack {
                flex-direction: column;
            }
            header#main-header {
                background: #fff !important;
                box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            }
            header#main-header a, header#main-header button {
                color: #1f2937 !important;
            }
        }
        /* Eliminar bordes redondeados globalmente */
        button, .btn-donar, .rounded, .rounded-full, .rounded-lg, .rounded-xl, .rounded-2xl, .rounded-3xl, .rounded-md, .rounded-sm, .rounded-bl, .rounded-br, .rounded-tl, .rounded-tr, .rounded-t, .rounded-b, .rounded-l, .rounded-r, .rounded-none, input, select, textarea, .card, .shadow-lg, .shadow-xl, .shadow, .shadow-md, .shadow-sm, .shadow-xs, .shadow-none, .border, .border-2, .border-4, .border-8 {
            border-radius: 0 !important;
        }
        /* Ajustar enlaces de navbar y footer para que no tengan border-radius */
        .navbar-link, .dropdown-menu-column a, .btn-donar, a, .block, .inline-block {
            border-radius: 0 !important;
        }

        /* Botón DONAR AHORA estilo SPDA */
        .navbar-donar {
            font-family: 'Manrope', sans-serif !important;
            border: 2px solid #fff;
            color: #fff;
            padding: 0.5rem 1.5rem;
            font-weight: 700;
            border-radius: 0.25rem;
            letter-spacing: 0.04em;
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            z-index: 1;
            background: transparent;
        }
        header.bg-white .navbar-donar {
            border-color: #111827;
            color: #111827 !important;
            background: #fff;
        }
        header.bg-white .navbar-donar:hover, header.bg-white .navbar-donar:focus {
            color: #111827 !important;
            background: #fff;
            border-color: #111827;
        }
        .navbar-donar::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 0%;
            background: rgba(255,255,255,0.35);
            z-index: 0;
            transition: width 0.4s cubic-bezier(0.4,0,0.2,1);
        }
        .navbar-donar:hover::before, .navbar-donar:focus::before {
            width: 100%;
        }
        .navbar-donar:hover, .navbar-donar:focus {
            font-family: 'Manrope', sans-serif !important;
            font-weight: 700;
            color: #fff !important;
            z-index: 1;
        }
        header.bg-white .navbar-donar:hover, header.bg-white .navbar-donar:focus {
            color: #111827 !important;
            background: #fff;
            border-color: #dc2626;
        }
    </style>
    @stack('styles')
</head>
<body class="text-gray-800">
    <!-- Header -->
    <header class="fixed top-0 left-0 right-0 z-50 bg-transparent transition-all duration-300" id="main-header" style="height: 90px;">
        <div class="container mx-auto px-6 py-6 flex items-center justify-between" style="height: 90px;">
            <nav class="flex items-center w-full relative">
                {{-- <a href="{{ route('home') }}" class="flex items-baseline gap-0.5 navbar-link mr-8 -ml-2"> --}}
                    <img id="navbar-logo" src="{{ asset('assets/dicapilogo.png') }}" alt="Dicapi Logo" class="logo-text" style="height:60px;">
                </a>
                <div class="hidden lg:flex items-center space-x-16 absolute left-1/2 transform -translate-x-1/2">
                    {{-- <a href="{{ route('home') }}" class="navbar-link uppercase">INICIO</a> --}}
                    {{-- <a href="{{ route('blog') }}" class="navbar-link uppercase">BLOG</a> --}}
                    {{-- <a href="{{ route('about') }}" class="navbar-link uppercase">NOSOTROS</a> --}}
                    {{-- <a href="{{ route('programs') }}" class="navbar-link uppercase">PROGRAMAS</a> --}}
                    {{-- <a href="{{ route('contact') }}" class="navbar-link uppercase">CONTACTO</a> --}}
                </div>
                {{-- <a href="{{ route('donations') }}" class="hidden lg:flex navbar-donar uppercase ml-auto">DONAR AHORA</a> --}}
                {{-- <img src="{{ asset('assets/perunazca.png') }}" alt="Perú Nazca" class="hidden lg:inline-block ml-4 h-10 w-auto align-top" style="margin-top: -4px;"> --}}
                <!-- Mobile Menu Button -->
                <div class="lg:hidden ml-auto flex items-center justify-end absolute right-0 top-1/2 transform -translate-y-1/2">
                    <button id="mobile-menu-button" class="text-white hover:font-bold focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                    </button>
                </div>
            </nav>
        </div>
        <!-- Overlay para menú móvil -->
        <div id="mobile-menu-overlay" class="hidden fixed inset-0 bg-black bg-opacity-50 z-40 transition-opacity duration-300" style="top:90px;"></div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden lg:hidden fixed top-[90px] right-0 w-64 max-w-full h-[calc(100vh-90px)] bg-white z-[99999] shadow-2xl transition-transform duration-300 transform translate-x-full">
            <div class="flex flex-col h-full">
                <div class="flex-1 flex flex-col justify-start pt-6">
                    {{-- <a href="{{ route('home') }}" class="block py-4 px-6 !bg-white !text-gray-800 hover:font-bold transition-all duration-200 uppercase">INICIO</a> --}}
                    {{-- <a href="{{ route('blog') }}" class="block py-4 px-6 !bg-white !text-gray-800 hover:font-bold transition-all duration-200 uppercase">BLOG</a> --}}
                    {{-- <a href="{{ route('about') }}" class="block py-4 px-6 !bg-white !text-gray-800 hover:font-bold transition-all duration-200 uppercase">NOSOTROS</a> --}}
                    {{-- <a href="{{ route('programs') }}" class="block py-4 px-6 !bg-white !text-gray-800 hover:font-bold transition-all duration-200 uppercase">PROGRAMAS</a> --}}
                    {{-- <a href="{{ route('contact') }}" class="block py-4 px-6 !bg-white !text-gray-800 hover:font-bold transition-all duration-200 uppercase">CONTACTO</a> --}}
                    {{-- <a href="{{ route('donations') }}" class="block py-4 px-6 !bg-white !text-gray-800 hover:font-bold transition-all duration-200 uppercase">DONAR AHORA</a> --}}
                </div>
            </div>
        </div>
    </header>

    <div class="relative z-20">
        @yield('content')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script>
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');

        mobileMenuButton.addEventListener('click', () => {
            if (mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.remove('hidden');
                mobileMenuOverlay.classList.remove('hidden');
                setTimeout(() => {
                    mobileMenu.classList.remove('translate-x-full');
                    mobileMenuOverlay.classList.add('opacity-100');
                }, 10);
            } else {
                mobileMenu.classList.add('translate-x-full');
                mobileMenuOverlay.classList.remove('opacity-100');
                setTimeout(() => {
                    mobileMenu.classList.add('hidden');
                    mobileMenuOverlay.classList.add('hidden');
                }, 300);
            }
        });
        mobileMenuOverlay.addEventListener('click', () => {
            mobileMenu.classList.add('translate-x-full');
            mobileMenuOverlay.classList.remove('opacity-100');
            setTimeout(() => {
                mobileMenu.classList.add('hidden');
                mobileMenuOverlay.classList.add('hidden');
            }, 300);
        });

        // Navbar transparente en todas las páginas, cambia a blanco al hacer scroll
        document.addEventListener('DOMContentLoaded', function() {
            const header = document.getElementById('main-header');
            const logo = document.getElementById('navbar-logo');
            function updateHeader() {
                const scrollY = window.scrollY;
                const headerHeight = header.offsetHeight;
                // Si es móvil, forzar blanco siempre
                if (window.innerWidth <= 768) {
                    header.classList.add('bg-white', 'shadow-md');
                    header.classList.remove('bg-transparent');
                    header.querySelectorAll('a, button').forEach(link => {
                        link.classList.remove('text-white');
                        link.classList.add('text-gray-800');
                    });
                    if (logo) {
                        logo.src = "{{ asset('assets/dicapilogo.png') }}";
                    }
                    return;
                }
                if (scrollY > headerHeight) {
                    // Cambiar a fondo blanco
                    header.classList.add('bg-white', 'shadow-md');
                    header.classList.remove('bg-transparent');
                    // Cambiar todos los textos a negro
                    header.querySelectorAll('a, button').forEach(link => {
                        link.classList.remove('text-white');
                        link.classList.add('text-gray-800');
                    });
                    // Cambiar fondo del menú móvil
                    const mobileMenu = document.getElementById('mobile-menu');
                    if (mobileMenu) {
                        mobileMenu.classList.remove('bg-transparent');
                        mobileMenu.classList.add('bg-white', 'shadow-md');
                        mobileMenu.querySelectorAll('a').forEach(link => {
                            link.classList.remove('text-white');
                            link.classList.add('text-gray-800');
                        });
                    }
                    // Cambiar color del logo a negro
                    if (logo) {
                        logo.src = "{{ asset('assets/dicapilogo.png') }}";
                    }
                } else {
                    // Mantener transparente
                    header.classList.remove('bg-white', 'shadow-md');
                    header.classList.add('bg-transparent');
                    // Cambiar todos los textos a blanco
                    header.querySelectorAll('a, button').forEach(link => {
                        link.classList.remove('text-gray-800');
                        link.classList.add('text-white');
                    });
                    // Cambiar fondo del menú móvil
                    const mobileMenu = document.getElementById('mobile-menu');
                    if (mobileMenu) {
                        mobileMenu.classList.remove('bg-white', 'shadow-md');
                        mobileMenu.classList.add('bg-transparent');
                        mobileMenu.querySelectorAll('a').forEach(link => {
                            link.classList.remove('text-gray-800');
                            link.classList.add('text-white');
                        });
                    }
                    // Restaurar color del logo
                    if (logo) {
                        logo.src = "{{ asset('assets/dicapilogo.png') }}";
                    }
                }
            }
            window.addEventListener('scroll', updateHeader);
            window.addEventListener('resize', updateHeader);
            updateHeader(); // Inicializar
        });
    </script>
    @stack('scripts')
</body>
</html> 