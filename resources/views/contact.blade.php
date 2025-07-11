@extends('layouts.app')

@section('title', 'Contacto - Cread ONG')

@section('description', 'Contáctanos para más información sobre nuestros programas, donaciones o colaboraciones. Estamos aquí para ayudarte.')

@section('content')
<!-- Mantel de Scroll -->
<div id="scroll-mantel" class="fixed top-0 left-0 w-full h-20 bg-[#dc2626] transform -translate-y-full transition-transform duration-500 z-10 shadow-lg">
    <div class="container mx-auto px-6 h-full flex items-center justify-between">
        <div class="flex items-center">
            <img src="{{ asset('assets/dicapilogo.png') }}" alt="Logo CREAD" class="mr-3" style="height:60px;">
            <span class="text-white font-bold text-lg">Cread ONG</span>
        </div>
        <div class="text-white text-sm">
            <span class="hidden md:inline">Conectemos para transformar la educación digital</span>
        </div>
    </div>
</div>

<!-- Main Content -->
<main>
    <!-- Page Title Section -->
    <section class="relative" style="background: #dc2626;">
        <div class="container mx-auto px-10 text-left py-32">
            <span class="block text-white/90 text-lg font-bold mb-4 uppercase fade-in-on-scroll tracking-wide">Contacto</span>
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-6 drop-shadow-lg max-w-6xl fade-in-on-scroll leading-tight text-left">
                Conectemos para transformar la educación digital juntos
            </h1>
            <p class="text-xl text-white/90 max-w-4xl fade-in-on-scroll fade-in-delay-1">
                ¿Tienes dudas, sugerencias o quieres colaborar? Completa el formulario y te responderemos pronto.
            </p>
        </div>
    </section>

    <!-- Formulario de Contacto -->
    <section class="bg-gray-50 py-16 fade-in-on-scroll relative z-20">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12 fade-in-on-scroll">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Envíanos un Mensaje</h2>
                    <p class="text-lg text-gray-600">Completa el formulario y nos pondremos en contacto contigo lo antes posible.</p>
                </div>

                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg text-center fade-in-on-scroll">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg text-center fade-in-on-scroll">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="bg-white rounded-lg shadow-lg p-8 fade-in-on-scroll fade-in-delay-1">
                    <form id="contactForm" method="POST" action="{{ route('contact.store') }}" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nombre <span class="text-red-500">*</span></label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#dc2626] focus:border-transparent transition-all @error('name') border-red-500 @enderror">
                                @error('name')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email <span class="text-red-500">*</span></label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#dc2626] focus:border-transparent transition-all @error('email') border-red-500 @enderror">
                                @error('email')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>
                        </div>
                        
                        <div>
                            <label for="motivo" class="block text-sm font-medium text-gray-700 mb-2">Motivo <span class="text-red-500">*</span></label>
                            <select id="motivo" name="motivo" required 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#dc2626] focus:border-transparent transition-all @error('motivo') border-red-500 @enderror">
                                <option value="">Selecciona una opción</option>
                                <option value="Consulta" {{ old('motivo')=='Consulta' ? 'selected' : '' }}>Consulta</option>
                                <option value="Donación" {{ old('motivo')=='Donación' ? 'selected' : '' }}>Donación</option>
                                <option value="Voluntariado" {{ old('motivo')=='Voluntariado' ? 'selected' : '' }}>Voluntariado</option>
                                <option value="Colaboración" {{ old('motivo')=='Colaboración' ? 'selected' : '' }}>Colaboración</option>
                                <option value="Otro" {{ old('motivo')=='Otro' ? 'selected' : '' }}>Otro</option>
                            </select>
                            @error('motivo')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        
                        <div>
                            <label for="mensaje" class="block text-sm font-medium text-gray-700 mb-2">Mensaje <span class="text-red-500">*</span></label>
                            <textarea id="mensaje" name="mensaje" rows="6" required 
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#dc2626] focus:border-transparent transition-all resize-none @error('mensaje') border-red-500 @enderror">{{ old('mensaje') }}</textarea>
                            @error('mensaje')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        
                        <div class="flex justify-center">
                            <div class="g-recaptcha" data-sitekey="6LeCj3krAAAAANP0at7Twg-RgIWjLJkFCH1tw6f9"></div>
                            @error('g-recaptcha-response')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" 
                                    class="bg-[#dc2626] text-white py-4 px-8 rounded-lg font-semibold hover:bg-[#b91c1c] transition-all transform hover:scale-105 shadow-lg hover:shadow-xl">
                                Enviar Mensaje
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Información de Contacto al Final -->
    <section class="bg-white py-16 fade-in-on-scroll relative z-20">
        <div class="container mx-auto px-6">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-12 fade-in-on-scroll">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Información de Contacto</h2>
                    <p class="text-lg text-gray-600">Conoce más sobre CREAD y cómo puedes ser parte de nuestra misión de transformar la educación digital en el Perú.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 fade-in-on-scroll fade-in-delay-1">
                    <!-- Información General -->
                    <div class="text-center p-6 rounded-lg bg-gray-50 hover:bg-gray-100 transition-all duration-300 fade-in-on-scroll fade-in-delay-2">
                        <div class="w-16 h-16 bg-[#dc2626] rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Información General</h3>
                        <div class="space-y-2 text-gray-600">
                            <div class="flex items-center justify-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                </svg>
                                <span>info@cread.org.pe</span>
                            </div>
                        </div>
                    </div>

                    <!-- Colaboraciones -->
                    <div class="text-center p-6 rounded-lg bg-gray-50 hover:bg-gray-100 transition-all duration-300 fade-in-on-scroll fade-in-delay-3">
                        <div class="w-16 h-16 bg-[#dc2626] rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Colaboraciones</h3>
                        <p class="text-gray-600 mb-4">Únete a nuestra red de colaboradores y ayúdanos a expandir nuestro impacto en la educación digital.</p>
                        <div class="space-y-2 text-gray-600">
                            <div class="flex items-center justify-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                                <span>Voluntariado</span>
                            </div>
                            <div class="flex items-center justify-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"></path>
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"></path>
                                </svg>
                                <span>Donaciones</span>
                            </div>
                        </div>
                    </div>

                    <!-- Ubicación -->
                    <div class="text-center p-6 rounded-lg bg-gray-50 hover:bg-gray-100 transition-all duration-300 fade-in-on-scroll fade-in-delay-4">
                        <div class="w-16 h-16 bg-[#dc2626] rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Ubicación</h3>
                        <p class="text-gray-600 mb-4">Próxima apertura de oficinas físicas.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Footer real -->
<footer class="bg-black py-8 border-t border-gray-800" style="margin-top: 3rem;">
    <div class="container mx-auto flex flex-row items-center justify-between md:flex-row md:items-center md:justify-between flex-col items-center justify-center text-center">
        <img src="{{ asset('assets/dicapilogo.png') }}" alt="Logo CREAD" class="mb-4 md:mb-0" style="height:60px;">
        <div class="text-gray-300 text-base">&copy; 2025 Cread ONG. Todos los derechos reservados.</div>
    </div>
</footer>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection

@push('styles')
<style>
    body {
        font-family: 'Manrope', sans-serif;
        background-color: #FCF9F6;
    }
    
    /* Animaciones de entrada mejoradas */
    .fade-in-on-scroll {
        opacity: 0;
        transform: translateY(40px);
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .fade-in-on-scroll.animate {
        opacity: 1;
        transform: translateY(0);
    }

    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeIn 0.8s ease-out forwards;
    }
    .fade-in-delay-1 {
        transition-delay: 0.2s;
    }
    .fade-in-delay-2 {
        transition-delay: 0.4s;
    }
    .fade-in-delay-3 {
        transition-delay: 0.6s;
    }
    .fade-in-delay-4 {
        transition-delay: 0.8s;
    }
    @keyframes fadeIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Scroll suave para toda la página */
    html {
        scroll-behavior: smooth;
    }
    
    /* Estilos para el mantel de scroll */
    #scroll-mantel {
        backdrop-filter: blur(10px);
        background: rgba(220, 38, 38, 0.98);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    #scroll-mantel .container {
        max-width: 1200px;
    }
    
    /* Asegurar que el contenido esté por encima del mantel */
    .relative.z-20 {
        position: relative;
        z-index: 20;
    }
    
    /* Mejoras para dispositivos móviles */
    @media (max-width: 768px) {
        .fade-in-on-scroll {
            transform: translateY(20px);
        }
        footer .container {
            flex-direction: column !important;
            align-items: center !important;
            justify-content: center !important;
            text-align: center !important;
        }
        footer img {
            margin-bottom: 1rem !important;
        }
        footer .text-gray-300 {
            margin-bottom: 0 !important;
        }
    }
    
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
    .hover-scale {
        transition: transform 0.3s ease-in-out;
    }
    .hover-scale:hover {
        transform: scale(1.05);
    }
    .hover-lift {
        transition: all 0.3s ease-in-out;
    }
    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.07);
    }
    .navbar-link:hover {
        color: #fff !important;
        font-weight: bold !important;
    }
    .dropdown-menu-column a:hover {
        color: #fff !important;
        font-weight: bold !important;
    }
    .btn-donar {
        background-color: #dc2626;
        color: #fff;
        transition: all 0.3s ease-in-out;
    }
    .btn-donar:hover {
        background-color: #b91c1c;
        transform: scale(1.05);
    }
    .logo-text {
        transition: filter 0.3s ease-in-out;
    }
    .logo-text:hover {
        filter: brightness(0.8);
    }
</style>
@endpush

@push('scripts')
<script>
    // Intersection Observer para animaciones de scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    }, observerOptions);

    // Función para manejar el mantel de scroll
    function handleScrollMantel() {
        const scrollMantel = document.getElementById('scroll-mantel');
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        if (scrollTop > 200) {
            scrollMantel.classList.remove('-translate-y-full');
            scrollMantel.classList.add('translate-y-0');
        } else {
            scrollMantel.classList.remove('translate-y-0');
            scrollMantel.classList.add('-translate-y-full');
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Observar elementos con fade-in-on-scroll
        const fadeElements = document.querySelectorAll('.fade-in-on-scroll');
        fadeElements.forEach(element => {
            observer.observe(element);
        });

        // Animar elementos con fade-in (para compatibilidad)
        const fadeElementsLegacy = document.querySelectorAll('.fade-in');
        fadeElementsLegacy.forEach(element => {
            void element.offsetWidth;
            element.classList.add('animate');
        });

        // Scroll suave para enlaces internos
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Agregar event listener para el mantel de scroll
        window.addEventListener('scroll', handleScrollMantel);
        
        // Ejecutar una vez al cargar para verificar la posición inicial
        handleScrollMantel();
    });
</script>
@endpush