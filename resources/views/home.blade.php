<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>DICAPI - Asistente Virtual</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Custom Styles for Background Transitions -->
        <style>
            .transition-opacity {
                transition: opacity 2s ease-in-out;
            }
            
            .duration-2000 {
                transition-duration: 2s;
            }
            
            .ease-in-out {
                transition-timing-function: ease-in-out;
            }
            
            /* Fade-in animations */
            .fade-in-navbar {
                opacity: 1 !important;
                transform: translateY(0) !important;
            }
            
            .fade-in-background {
                opacity: 1 !important;
            }
            
            /* Smooth page load animation */
            body {
                opacity: 0;
                transition: opacity 1s ease-in-out;
            }
            
            body.loaded {
                opacity: 1;
            }
            
            /* Hover styles for navbar links */
            .navbar-link {
                color: white;
                transition: color 0.2s ease;
            }
            
            .navbar-link:hover {
                color: #1e40af !important;
            }
            
            /* Logo completamente responsivo */
            .responsive-logo {
                width: clamp(64px, 12vw, 180px) !important;
                height: clamp(64px, 12vw, 180px) !important;
                transition: width 0.3s ease, height 0.3s ease !important;
                object-fit: contain !important;
            }
            
            /* Responsive breakpoints para el logo - Todos los breakpoints estándar */
            @media (max-width: 1920px) {
                .responsive-logo {
                    width: clamp(60px, 11vw, 170px) !important;
                    height: clamp(60px, 11vw, 170px) !important;
                }
            }
            
            @media (max-width: 1536px) {
                .responsive-logo {
                    width: clamp(56px, 10vw, 160px) !important;
                    height: clamp(56px, 10vw, 160px) !important;
                }
            }
            
            @media (max-width: 1440px) {
                .responsive-logo {
                    width: clamp(52px, 9vw, 150px) !important;
                    height: clamp(52px, 9vw, 150px) !important;
                }
            }
            
            @media (max-width: 1366px) {
                .responsive-logo {
                    width: clamp(50px, 8.5vw, 145px) !important;
                    height: clamp(50px, 8.5vw, 145px) !important;
                }
            }
            
            @media (max-width: 1280px) {
                .responsive-logo {
                    width: clamp(48px, 8vw, 140px) !important;
                    height: clamp(48px, 8vw, 140px) !important;
                }
            }
            
            @media (max-width: 1200px) {
                .responsive-logo {
                    width: clamp(44px, 7.5vw, 130px) !important;
                    height: clamp(44px, 7.5vw, 130px) !important;
                }
            }
            
            @media (max-width: 1024px) {
                .responsive-logo {
                    width: clamp(40px, 7vw, 120px) !important;
                    height: clamp(40px, 7vw, 120px) !important;
                }
            }
            
            @media (max-width: 900px) {
                .responsive-logo {
                    width: clamp(36px, 6.5vw, 110px) !important;
                    height: clamp(36px, 6.5vw, 110px) !important;
                }
            }
            
            @media (max-width: 768px) {
                .responsive-logo {
                    width: clamp(80px, 16vw, 240px) !important;
                    height: clamp(80px, 16vw, 240px) !important;
                }
            }
            
            @media (max-width: 720px) {
                .responsive-logo {
                    width: clamp(76px, 15vw, 230px) !important;
                    height: clamp(76px, 15vw, 230px) !important;
                }
            }
            
            @media (max-width: 640px) {
                .responsive-logo {
                    width: clamp(72px, 14vw, 220px) !important;
                    height: clamp(72px, 14vw, 220px) !important;
                }
            }
            
            @media (max-width: 600px) {
                .responsive-logo {
                    width: clamp(68px, 13vw, 210px) !important;
                    height: clamp(68px, 13vw, 210px) !important;
                }
            }
            
            @media (max-width: 540px) {
                .responsive-logo {
                    width: clamp(64px, 12vw, 200px) !important;
                    height: clamp(64px, 12vw, 200px) !important;
                }
            }
            
            @media (max-width: 480px) {
                .responsive-logo {
                    width: clamp(60px, 11vw, 190px) !important;
                    height: clamp(60px, 11vw, 190px) !important;
                }
            }
            
            @media (max-width: 420px) {
                .responsive-logo {
                    width: clamp(56px, 10vw, 180px) !important;
                    height: clamp(56px, 10vw, 180px) !important;
                }
            }
            
            @media (max-width: 375px) {
                .responsive-logo {
                    width: clamp(52px, 9vw, 170px) !important;
                    height: clamp(52px, 9vw, 170px) !important;
                }
            }
            
            @media (max-width: 360px) {
                .responsive-logo {
                    width: clamp(48px, 8vw, 160px) !important;
                    height: clamp(48px, 8vw, 160px) !important;
                }
            }
            
            @media (max-width: 320px) {
                .responsive-logo {
                    width: clamp(44px, 7vw, 150px) !important;
                    height: clamp(44px, 7vw, 150px) !important;
                }
            }
            
            @media (max-width: 280px) {
                .responsive-logo {
                    width: clamp(40px, 6vw, 140px) !important;
                    height: clamp(40px, 6vw, 140px) !important;
                }
            }
            
            /* Animación suave cuando el logo cambia de tamaño */
            .responsive-logo {
                transition: width 0.3s ease, height 0.3s ease !important;
            }
            

        </style>
    </head>
    <body class="antialiased" style="overflow: hidden;">
        <!-- Logo DICAPI independiente en la esquina superior izquierda -->
        <div class="absolute top-0 left-0 z-50 p-6">
            <img src="{{ asset('imagenes/dicapilogo.png') }}" alt="DICAPI Logo" 
                 style="width: clamp(64px, 12vw, 180px); height: clamp(64px, 12vw, 180px); transition: width 0.3s ease, height 0.3s ease;"
                 class="responsive-logo">
        </div>

        <!-- Navbar duplicado de publicaciones/plantillas pero editado -->
        <nav class="absolute top-0 left-0 right-0 z-50 opacity-100 transform translate-y-0 transition-all duration-1000 ease-out" id="navbar" style="background: transparent;">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <!-- Espacio vacío para no interferir con el logo independiente -->
                        <div class="flex-shrink-0">
                            <div class="w-32"></div>
                        </div>
                    </div>
                    
                    <!-- Desktop Menu - Solo Publicaciones y Plantillas -->
                    <div class="hidden md:flex items-center space-x-4 lg:space-x-8">
                        <a href="/publicaciones" class="navbar-link px-3 py-2 rounded-md text-sm font-medium">Publicaciones</a>
                        <a href="/plantillas" class="navbar-link px-3 py-2 rounded-md text-sm font-medium">Plantillas</a>
                    </div>

                    <!-- Mobile Menu - Enlaces centrados -->
                    <div class="md:hidden flex items-center space-x-16">
                        <a href="/publicaciones" class="navbar-link text-sm font-medium px-2 py-1">Publicaciones</a>
                        <a href="/plantillas" class="navbar-link text-sm font-medium px-2 py-1">Plantillas</a>
                    </div>
                </div>


            </div>
        </nav>

        <!-- Main Content -->
        <div class="relative min-h-screen" style="min-height: 100vh;">
            <!-- Background Images with Zoom Effect -->
            <div class="absolute inset-0 transition-all duration-10000 ease-in-out opacity-0" id="bg-image-1" style="background-image: url('{{ asset('imagenes/1.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; min-height: 100vh; z-index: 1; width: 100%; height: 100%; transform: scale(1.1);"></div>
            <div class="absolute inset-0 transition-all duration-10000 ease-in-out opacity-0" id="bg-image-2" style="background-image: url('{{ asset('imagenes/2.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; min-height: 100vh; z-index: 1; width: 100%; height: 100%; transform: scale(1.1);"></div>
            <div class="absolute inset-0 transition-all duration-10000 ease-in-out opacity-0" id="bg-image-3" style="background-image: url('{{ asset('imagenes/3.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; min-height: 100vh; z-index: 1; width: 100%; height: 100%; transform: scale(1.1);"></div>
            
            <!-- Overlay for better text readability -->
            <div class="absolute inset-0" style="background: rgba(22, 20, 44, 0.9); z-index: 2;"></div>
            


            <div class="relative z-10 flex items-center min-h-screen">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
                        <!-- Left Side - Content -->
                        <div class="space-y-6 sm:space-y-8 animate-fade-in-left animate-delay-200 text-center lg:text-left">
                            <div>
                                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white animate-fade-in animate-delay-300">Asistente Virtual</h1>
                                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-semibold animate-fade-in animate-delay-400" style="color: #3c72fc;">DICAPI</h2>
                            </div>
                            <p class="text-lg sm:text-xl text-gray-100 animate-fade-in animate-delay-500 max-w-2xl">
                                Descubre cómo nuestra plataforma puede transformar tu experiencia digital. 
                                Ofrecemos soluciones innovadoras y personalizadas para satisfacer todas tus necesidades.
                            </p>
                            <button class="px-8 py-3 font-semibold text-base transition-all duration-300 animate-fade-in animate-delay-600 w-full sm:w-auto cursor-pointer transform hover:scale-105 active:scale-95 rounded-md" style="background: linear-gradient(90deg, #2a5bd9 -10.59%, #000408 300.59%); color: #ffffff; font-size: 16px;" onmouseover="this.style.background='linear-gradient(90deg, #1e4bb8 -10.59%, #000204 300.59%)'" onmouseout="this.style.background='linear-gradient(90deg, #2a5bd9 -10.59%, #000408 300.59%)'" onclick="window.location.href='/publicaciones'">
                                Más Información →
                            </button>
                        </div>
                        
                        <!-- Right Side - WhatsApp Button -->
                        <div class="flex justify-center animate-fade-in-right animate-delay-400">
                            <a href="https://wa.me/1234567890" target="_blank" class="bg-green-500 hover:bg-green-600 text-white p-3 sm:p-4 shadow-lg flex items-center space-x-2 sm:space-x-3 transition-all duration-300 hover-lift rounded-md">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                                </svg>
                                <span class="text-sm sm:text-base font-semibold">Contactar</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logo Responsive JavaScript -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const navbar = document.getElementById('navbar');
                const body = document.body;
                const logo = document.querySelector('.responsive-logo');
                
                // Función simplificada para ajustar el logo sin conflictos
                function adjustLogoSize() {
                    if (logo) {
                        const windowWidth = window.innerWidth;
                        let logoSize;
                        
                                        // Calcular tamaño basado en el ancho de la ventana
                if (windowWidth >= 1920) {
                    logoSize = Math.min(Math.max(60, windowWidth * 0.11), 170);
                } else if (windowWidth >= 1536) {
                    logoSize = Math.min(Math.max(56, windowWidth * 0.10), 160);
                } else if (windowWidth >= 1440) {
                    logoSize = Math.min(Math.max(52, windowWidth * 0.09), 150);
                } else if (windowWidth >= 1366) {
                    logoSize = Math.min(Math.max(50, windowWidth * 0.085), 145);
                } else if (windowWidth >= 1280) {
                    logoSize = Math.min(Math.max(48, windowWidth * 0.08), 140);
                } else if (windowWidth >= 1200) {
                    logoSize = Math.min(Math.max(44, windowWidth * 0.075), 130);
                } else if (windowWidth >= 1024) {
                    logoSize = Math.min(Math.max(40, windowWidth * 0.07), 120);
                } else if (windowWidth >= 900) {
                    logoSize = Math.min(Math.max(36, windowWidth * 0.065), 110);
                } else if (windowWidth >= 768) {
                    logoSize = Math.min(Math.max(80, windowWidth * 0.16), 240);
                } else if (windowWidth >= 720) {
                    logoSize = Math.min(Math.max(76, windowWidth * 0.15), 230);
                } else if (windowWidth >= 640) {
                    logoSize = Math.min(Math.max(72, windowWidth * 0.14), 220);
                } else if (windowWidth >= 600) {
                    logoSize = Math.min(Math.max(68, windowWidth * 0.13), 210);
                } else if (windowWidth >= 540) {
                    logoSize = Math.min(Math.max(64, windowWidth * 0.12), 200);
                } else if (windowWidth >= 480) {
                    logoSize = Math.min(Math.max(60, windowWidth * 0.11), 190);
                } else if (windowWidth >= 420) {
                    logoSize = Math.min(Math.max(56, windowWidth * 0.10), 180);
                } else if (windowWidth >= 375) {
                    logoSize = Math.min(Math.max(52, windowWidth * 0.09), 170);
                } else if (windowWidth >= 360) {
                    logoSize = Math.min(Math.max(48, windowWidth * 0.08), 160);
                } else if (windowWidth >= 320) {
                    logoSize = Math.min(Math.max(44, windowWidth * 0.07), 150);
                } else if (windowWidth >= 280) {
                    logoSize = Math.min(Math.max(40, windowWidth * 0.06), 140);
                } else {
                    logoSize = Math.min(Math.max(36, windowWidth * 0.05), 130);
                }
                        
                        // Aplicar tamaño con debounce para evitar parpadeo
                        if (logo.style.width !== logoSize + 'px') {
                            logo.style.width = logoSize + 'px';
                            logo.style.height = logoSize + 'px';
                        }
                    }
                }
                
                // Ajustar logo al cargar la página
                adjustLogoSize();
                
                // Ajustar logo cuando cambie el tamaño de la ventana con debounce
                let resizeTimeout;
                window.addEventListener('resize', function() {
                    clearTimeout(resizeTimeout);
                    resizeTimeout = setTimeout(adjustLogoSize, 100);
                });
                
                // Page load animation sequence
                function startPageAnimation() {
                    // Show body first
                    body.classList.add('loaded');
                    
                    // Animate navbar
                    setTimeout(() => {
                        navbar.classList.add('fade-in-navbar');
                    }, 300);
                }
                
                // Start animations when page is fully loaded
                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', startPageAnimation);
                } else {
                    startPageAnimation();
                }
                

                
                // Background Image Carousel with Zoom Effect
                const images = [
                    document.getElementById('bg-image-1'),
                    document.getElementById('bg-image-2'),
                    document.getElementById('bg-image-3')
                ];
                
                let currentImageIndex = 0;
                let zoomInterval = null;
                let carouselInterval = null;
                
                // Verify all images exist
                if (images.every(img => img !== null)) {
                    
                    function showImage(index) {
                        // Hide all images
                        images.forEach((img, i) => {
                            img.style.opacity = i === index ? '1' : '0';
                        });
                        
                        currentImageIndex = index;
                        
                        // Start zoom effect for current image
                        startZoomEffect(images[index]);
                    }
                    
                    function nextImage() {
                        const nextIndex = (currentImageIndex + 1) % images.length;
                        showImage(nextIndex);
                    }
                    
                    function startZoomEffect(imageElement) {
                        // Clear any existing zoom interval
                        if (zoomInterval) {
                            clearInterval(zoomInterval);
                        }
                        
                        let scale = 1.1;
                        let growing = true;
                        
                        zoomInterval = setInterval(() => {
                            if (growing) {
                                scale += 0.001;
                                if (scale >= 1.3) {
                                    growing = false;
                                }
                            } else {
                                scale -= 0.001;
                                if (scale <= 1.0) {
                                    growing = true;
                                }
                            }
                            
                            imageElement.style.transform = `scale(${scale})`;
                        }, 50); // Update every 50ms for smooth animation
                    }
                    
                    function stopZoomEffect() {
                        if (zoomInterval) {
                            clearInterval(zoomInterval);
                            zoomInterval = null;
                        }
                    }
                    
                    function startCarousel() {
                        // Show first image
                        showImage(0);
                        
                        // Start automatic carousel
                        carouselInterval = setInterval(nextImage, 8000); // Change image every 8 seconds
                    }
                    
                    function stopCarousel() {
                        if (carouselInterval) {
                            clearInterval(carouselInterval);
                            carouselInterval = null;
                        }
                    }
                    
                    // Initialize carousel
                    startCarousel();
                    
                    // Cleanup on page unload
                    window.addEventListener('beforeunload', () => {
                        stopZoomEffect();
                        stopCarousel();
                    });
                }
            });
        </script>
    </body>
</html> 