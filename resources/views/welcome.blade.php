@extends('layouts.app')

@section('title', 'DICAPI')
@section('description', 'CREAD es una ONG peruana líder en educación digital y desarrollo comunitario. Ofrecemos programas educativos, voluntariado y donaciones para transformar vidas en Perú. Únete a nuestra misión.')

@section('content')
<main class="relative min-h-screen overflow-hidden">
    <!-- BACKGROUND VIDEO: Completamente estático en el fondo -->
    <div class="fixed inset-0 w-full h-full z-0">
        <!-- Video para escritorio -->
        <video id="video-desktop" autoplay loop muted playsinline class="absolute inset-0 w-full h-full object-cover hidden md:block">
            <source src="{{ asset('assets/dicapivideo.mp4') }}" type="video/mp4">
            Tu navegador no soporta el video.
        </video>
        <!-- Video para móvil -->
        <video id="video-mobile" autoplay loop muted playsinline class="absolute inset-0 w-full h-full object-cover block md:hidden">
            <source src="{{ asset('assets/dicapivideomobile.mp4') }}" type="video/mp4">
            Tu navegador no soporta el video.
        </video>
        <div class="absolute inset-0 bg-black/40"></div>
    </div>

    <!-- HERO SECTION: Texto completamente estático sobre el video -->
    <section class="fixed inset-0 z-10 flex items-center justify-start pointer-events-none">
        <div class="w-full flex flex-col items-start justify-center px-6 ml-12 md:ml-24 lg:ml-32 mt-40">
            <div class="max-w-3xl text-left hero-text">
                <h1 class="text-hero font-extrabold mb-6 leading-tight drop-shadow-lg titulo-principal" style="font-family: 'Kumbh Sans', Arial, sans-serif; color: #fff; font-size: 72px;">
                    Asistente virtual DICAPI
                </h1>
                <p class="text-body-large mb-6 drop-shadow-md texto-descriptivo" style="color: #fff; font-size: 24px;">
                    El Proyecto de Chatbot IA te facilita la formalización como pescador. Solo tienes que hacer clic en el botón de WhatsApp y podrás obtener respuestas claras y rápidas sobre el proceso. Una forma sencilla y directa de resolver todas tus dudas
                </p>

                <a href="https://wa.me/51941955488" target="_blank" class="whatsapp-float-center pointer-events-auto" id="whatsapp-btn" aria-label="WhatsApp">
                    <span class="whatsapp-icon-text">
                        <img src="{{ asset('assets/logowhatsapp.webp') }}" alt="WhatsApp" style="width:32px; height:32px; vertical-align:middle; margin-right:10px;">
                        <span style="font-weight:600; font-size:18px; color:#fff; vertical-align:middle;">Contactar</span>
                    </span>
                </a>

                <!-- Botón Más Información -->
                <button class="btn-mas-info pointer-events-auto hidden md:inline-flex" id="btn-mas-info" style="position:relative; z-index:2000;">
                    Más Información
                    <span class="arrow-icon">&rarr;</span>
                </button>

                {{-- <a href="{{ route('programs') }}" class="btn-conocenos-texto inline-block mt-4 font-bold text-body-large transition-all pointer-events-auto uppercase">CONÓCENOS</a> --}}
            </div>
        </div>
    </section>

    <!-- SPACER: Para crear el espacio necesario para el scroll -->
    <div class="relative z-5" style="height: 100vh;"></div>

    {{--
    <!-- MANTEL ROJO: Se desliza desde abajo para tapar el video -->
    <div class="fixed inset-0 z-15 bg-red-600 transform translate-y-full overflow-hidden" id="red-curtain"></div>
    <!-- MANTEL TRABAJA: Segundo mantel encima del rojo -->
    <div class="fixed inset-0 z-20 bg-transparent pointer-events-none transform translate-y-full" id="work-curtain">
        <div class="w-full h-full flex flex-col justify-start items-center mt-32 md:mt-40">
            <div class="container mx-auto flex flex-col md:flex-row items-center justify-between h-full px-8">
                <h1 class="text-white font-extrabold text-5xl md:text-7xl mb-8 md:mb-0 md:w-1/2 text-left">Trabaja con nosotros</h1>
                <div class="md:w-1/2 flex flex-col items-start md:items-end">
                    <p class="text-white text-xl md:text-2xl mb-8 text-left md:text-right max-w-lg">Postula a nuestros procesos de selección para trabajos y consultorías.</p>
                    {{-- <a href="{{ route('contact') }}" class="text-white text-lg font-semibold border-b-2 border-white hover:text-gray-200 transition-all">VER OPORTUNIDADES &rarr;</a> --}}
                </div>
            </div>
        </div>
    </div>
    --}}

    <!-- PROGRAMS SECTION: Primera capa que se revela desde abajo -->
    <section class="relative z-20 bg-white w-full" id="programs-section">
        <div class="pt-32 pb-16 md:py-24">
            <div class="container-responsive">
                <div class="text-center mb-16 fade-in-program" id="programs-title-block">
                    <h2 class="text-display font-bold mb-6 text-black">Dirección General de Capitanías y Guardacostas</h2>
                    <p class="text-body-large text-gray-600 max-w-3xl mx-auto">
                        La Dirección General de Capitanías y Guardacostas de la Marina de Guerra del Perú ejerce la Autoridad Marítima, Fluvial y Lacustre, es responsable de normar y velar por la seguridad de la vida humana, la protección del medio ambiente y sus recursos naturales así como reprimir todo acto ilícito; ejerciendo el control y vigilancia de todas las actividades que se realizan en el medio acuático, en cumplimiento de la ley y de los convenios internacionales, contribuyendo de esta manera al desarrollo nacional.
                    </p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-0 w-full max-w-screen-2xl mx-auto fade-in-program" id="programs-grid-block">
                    <!-- Programa 1 -->
                    <div class="relative h-[800px] flex flex-col justify-between group overflow-hidden" style="background-image: url('{{ asset('assets/carrusel1.png') }}'); background-size: cover; background-position: center;">
                        <div class="absolute inset-0 bg-black/40 transition-all duration-500"></div>
                        <div class="relative z-10 p-20 flex-1 flex flex-col justify-center">
                            <h3 class="text-2xl font-extrabold text-white mb-6 uppercase">Lorem ipsum</h3>
                            <p class="text-white text-base font-medium opacity-0 group-hover:opacity-100 transition-all duration-500 transform translate-y-4 group-hover:translate-y-0">Lorem ipsum</p>
                        </div>
                        <div class="relative z-10 p-20 flex justify-start">
                            <a href="#" class="btn-ver-detalles border border-white text-white px-14 py-5 font-bold uppercase tracking-wide hover:bg-white/20 transition-all text-2xl">Ver Detalles &rarr;</a>
                        </div>
                    </div>
                    <!-- Programa 2 -->
                    <div class="relative h-[800px] flex flex-col justify-between group overflow-hidden" style="background-image: url('{{ asset('assets/carrusel2.png') }}'); background-size: cover; background-position: center;">
                        <div class="absolute inset-0 bg-black/40 transition-all duration-500"></div>
                        <div class="relative z-10 p-20 flex-1 flex flex-col justify-center">
                            <h3 class="text-2xl font-extrabold text-white mb-6 uppercase">Lorem ipsum</h3>
                            <p class="text-white text-base font-medium opacity-0 group-hover:opacity-100 transition-all duration-500 transform translate-y-4 group-hover:translate-y-0">Lorem ipsum</p>
                        </div>
                        <div class="relative z-10 p-20 flex justify-start">
                            <a href="#" class="btn-ver-detalles border border-white text-white px-14 py-5 font-bold uppercase tracking-wide hover:bg-white/20 transition-all text-2xl">Ver Detalles &rarr;</a>
                        </div>
                    </div>
                    <!-- Programa 3 -->
                    <div class="relative h-[800px] flex flex-col justify-between group overflow-hidden" style="background-image: url('{{ asset('assets/carrusel3.png') }}'); background-size: cover; background-position: center;">
                        <div class="absolute inset-0 bg-black/40 transition-all duration-500"></div>
                        <div class="relative z-10 p-20 flex-1 flex flex-col justify-center">
                            <h3 class="text-2xl font-extrabold text-white mb-6 uppercase">Lorem ipsum</h3>
                            <p class="text-white text-base font-medium opacity-0 group-hover:opacity-100 transition-all duration-500 transform translate-y-4 group-hover:translate-y-0">Lorem ipsum</p>
                        </div>
                        <div class="relative z-10 p-20 flex justify-start">
                            <a href="#" class="btn-ver-detalles border border-white text-white px-14 py-5 font-bold uppercase tracking-wide hover:bg-white/20 transition-all text-2xl">Ver Detalles &rarr;</a>
                        </div>
                    </div>
                </div>
                
                {{--
                <div class="text-center mt-12">
                    <a href="{{ route('programs') }}" class="btn-ver-todos-programas">
                        Ver Todos los Programas
                    </a>
                </div>
                --}}
            </div>
        </div>
    </section>

    {{--
    <!-- FOOTER SECTION: Segunda capa que se revela desde abajo -->
    <section class="relative z-30 bg-white w-full transform translate-y-full" id="footer-section">
        <footer class="bg-white">
            <!-- Main Footer -->
            <div class="container mx-auto px-6 py-12">
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-12">
                    <div class="lg:col-span-1">
                        <!-- Contenido del footer -->
                    </div>

                    <div>
                        <h3 class="font-semibold text-lg mb-4">Enlaces</h3>
                        <ul class="space-y-3">
                            <li><a href="{{ route('home') }}" class="text-gray-600 hover:text-black transition-all">Inicio</a></li>
                            <li><a href="{{ route('about') }}" class="text-gray-600 hover:text-black transition-all">Acerca de</a></li>
                            <li><a href="{{ route('programs') }}" class="text-gray-600 hover:text-black transition-all">Programas</a></li>
                            <li><a href="{{ route('program-details', ['id' => 1]) }}" class="text-gray-600 hover:text-black transition-all">Detalle de Programa</a></li>
                            <li><a href="{{ route('donations') }}" class="text-gray-600 hover:text-black transition-all">Donación</a></li>
                            <li><a href="{{ route('blog') }}" class="text-gray-600 hover:text-black transition-all">Blog</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg mb-4">Más</h3>
                        <ul class="space-y-3">
                            <li><a href="{{ route('blog') }}" class="text-gray-600 hover:text-black transition-all">Blog</a></li>
                            <li><a href="{{ route('teams') }}" class="text-gray-600 hover:text-black transition-all">Equipo</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg mb-4">Legal y Política</h3>
                        <ul class="space-y-3">
                            <li><a href="{{ route('terms-conditions') }}" class="text-gray-600 hover:text-black transition-all">Términos y Condiciones</a></li>
                            <li><a href="{{ route('privacy-policy') }}" class="text-gray-600 hover:text-black transition-all">Política de Privacidad</a></li>
                            <li><a href="{{ route('contact') }}" class="text-gray-600 hover:text-black transition-all">Contacto</a></li>
                        </ul>
                    </div>
                </div>
                <div class="mt-12 border-t border-gray-200 pt-8 text-center text-gray-500">
                    <p>&copy; {{ date('Y') }} Cread ONG. Todos los derechos reservados.</p>
                </div>
            </div>
        </footer>
    </section>
    <!-- MANTEL FOOTER: Tercer mantel encima de los anteriores -->
    <div class="fixed left-0 right-0 bottom-0 z-30 bg-black pointer-events-none transform translate-y-full md:block hidden" id="footer-curtain" style="height: 120px;">
        <div class="w-full h-full flex flex-col justify-end items-center pb-4">
            <div class="container mx-auto flex flex-col md:flex-row items-center justify-between w-full px-8 h-full">
                <div class="flex items-center mb-2 md:mb-0 md:w-1/3 justify-center md:justify-start">
                    <img src="{{ asset('assets/dicapilogo.png') }}" alt="Logo CREAD" class="mr-4" style="height:60px;">
                </div>
                <div class="text-white text-center md:w-1/3 mb-2 md:mb-0 md:block hidden">
                    <div class="mt-2">&copy; {{ date('Y') }} Cread ONG. Todos los derechos reservados.</div>
                </div>
                <div class="flex space-x-4 md:w-1/3 justify-center md:justify-end md:flex hidden">
                    <a href="https://www.linkedin.com/company/asociaci%C3%B3n-cread/about/" target="_blank" rel="noopener" class="text-white text-2xl hover:text-blue-400 transition-all transform hover:scale-125 hover:shadow-lg duration-200" aria-label="LinkedIn">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="https://www.instagram.com/" target="_blank" rel="noopener" class="text-white text-2xl hover:text-pink-400 transition-all transform hover:scale-125 hover:shadow-lg duration-200" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.youtube.com/" target="_blank" rel="noopener" class="text-white text-2xl hover:text-red-500 transition-all transform hover:scale-125 hover:shadow-lg duration-200" aria-label="YouTube">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    --}}

    <!-- BOTÓN FLOTANTE DE WHATSAPP -->
    {{-- The whatsapp-float-center button is now moved inside hero-text --}}
</main>

@push('styles')
<style>
html, body {
    overflow-x: hidden !important;
}

.btn-conocenos-texto {
    color: #fff;
    background: none;
    border: none;
    box-shadow: none;
    padding: 0;
    text-decoration: none;
    transition: color 0.2s, font-weight 0.2s;
    cursor: pointer;
    text-transform: uppercase;
    font-weight: 400;
}
.btn-conocenos-texto:hover, .btn-conocenos-texto:focus {
    color: #fff !important;
    font-weight: 700 !important;
    text-decoration: none;
    outline: none;
}

/* Estilo para las letras CREAD */
.cread-letter {
    color: #ffffff; /* Color blanco */
}

/* Estilos para las tarjetas de programas */
.program-card {
    transition: all 0.3s ease-in-out;
}

.program-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

/* Efecto de zoom en las imágenes de fondo de los programas */
#programs-grid-block .group {
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    transform-origin: center;
}

#programs-grid-block .group:hover {
    transform: scale(1.05);
}

/* Efecto suave para las descripciones */
#programs-grid-block .group p {
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}

.hover-lift {
    transition: all 0.3s ease-in-out;
}

.hover-lift:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

/* Asegurar que el contenido blanco tape completamente el video */
.bg-white {
    background-color: #ffffff !important;
}

/* Efectos de parallax */
.parallax-section {
    position: relative;
    z-index: 20;
    background: white;
    transform: translateZ(0);
}

/* Asegurar que el header esté por encima de todo */
header {
    z-index: 50 !important;
    position: fixed !important;
    top: 0;
    left: 0;
    right: 0;
}

/* Ajustar el contenido principal para el header fijo */
main {
    padding-top: 80px; /* Altura del header */
}

/* Efecto de deslizamiento suave */
html {
    scroll-behavior: smooth;
}

/* Optimización para dispositivos móviles */
@media (max-width: 768px) {
    main {
        padding-top: 60px;
    }
    
    .hero-text {
        margin-left: 1rem;
    }
}

/* Mejoras adicionales para el efecto parallax */
.parallax-container {
    perspective: 1px;
    height: 100vh;
    overflow-x: hidden;
    overflow-y: auto;
}

.parallax-layer {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}

.parallax-background {
    transform: translateZ(-1px) scale(2);
}

.parallax-foreground {
    transform: translateZ(0);
}

/* Efecto de desenfoque gradual para el video de fondo */
.video-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to bottom,
        rgba(0, 0, 0, 0.3) 0%,
        rgba(0, 0, 0, 0.2) 50%,
        rgba(0, 0, 0, 0.4) 100%
    );
    z-index: 1;
}

/* Animación de entrada para el texto hero */
.hero-text {
    animation: fadeInUp 1.5s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Efecto de hover mejorado para el botón Conócenos */
.btn-conocenos-texto {
    position: relative;
    overflow: hidden;
}

.btn-conocenos-texto::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 2px;
    background-color: #FB8E6D;
    transition: width 0.3s ease;
}

.btn-conocenos-texto:hover::after {
    width: 100%;
}

/* Efecto de revelación de capas desde abajo */
.slide-up-section {
    transition: transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.slide-up-section.revealed {
    transform: translateY(0) !important;
}

/* Estilos para el mantel rojo */
#red-curtain {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    width: 100vw;
    height: 100vh;
    background: linear-gradient(135deg, #dc2626 0%, #b91c1c 50%, #991b1b 100%);
    box-shadow: 0 0 50px rgba(220, 38, 38, 0.3);
    will-change: transform;
    transition: transform 0.05s ease-out;
    z-index: 5; /* Debajo de z-10 (hero), z-20 (programas), z-30 (footer) */
    overflow: hidden;
    pointer-events: none;
}

/* Asegurar que el mantel rojo esté por encima del video pero debajo de las secciones */
#red-curtain {
    z-index: 15;
}

/* Asegurar que las secciones blancas cubran completamente el fondo */
.relative.z-20,
.relative.z-30 {
    position: relative;
    background: white;
    box-shadow: 0 -10px 30px rgba(0,0,0,0.1);
}

.btn-ver-detalles {
    position: relative;
    overflow: hidden;
    z-index: 1;
    border: 2px solid #fff;
    color: #fff;
    font-weight: 700;
    background: none;
    transition: color 0.2s;
}
.btn-ver-detalles::before {
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
.btn-ver-detalles:hover::before, .btn-ver-detalles:focus::before {
    width: 100%;
}
.btn-ver-detalles > * {
    position: relative;
    z-index: 1;
}
.fade-in-program {
    opacity: 0;
    transform: translateY(40px);
    transition: opacity 0.8s cubic-bezier(0.4,0,0.2,1), transform 0.8s cubic-bezier(0.4,0,0.2,1);
}
.fade-in-program.is-visible {
    opacity: 1;
    transform: translateY(0);
}
#work-curtain {
    z-index: 20;
    background: transparent;
    pointer-events: none;
    transition: transform 0.05s ease-out;
}
#work-curtain .container {
    height: 100vh;
}
#work-curtain h1, #work-curtain p, #work-curtain a {
    pointer-events: auto;
}
@media (max-width: 768px) {
    #work-curtain h1 {
        font-size: 2.2rem;
        text-align: center;
    }
    #work-curtain .container {
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    #work-curtain p, #work-curtain a {
        text-align: center;
        align-items: center;
        width: 100%;
    }
}
#footer-curtain {
    z-index: 9999 !important;
    background: rgba(70,70,70,1) !important;
    pointer-events: none;
    transition: transform 0.05s ease-out;
    height: 120px;
    left: 0;
    right: 0;
    bottom: 0;
    width: 100vw;
}
#footer-curtain .container {
    height: 100%;
}
#footer-curtain img {
    height: 48px;
}
@media (max-width: 768px) {
    #footer-curtain .container {
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 140px;
        padding-bottom: 2.5rem;
    }
    #footer-curtain img {
        margin-bottom: 1rem;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    #footer-curtain .text-center, #footer-curtain .text-white {
        text-align: center !important;
        width: 100%;
    }
    #footer-curtain .flex {
        flex-direction: column !important;
        align-items: center !important;
        justify-content: center !important;
    }
    #footer-curtain {
        height: auto !important;
        min-height: 140px;
        padding-bottom: 2.5rem;
    }
}
.btn-ver-todos-programas {
    display: inline-block;
    position: relative;
    overflow: hidden;
    color: #fff;
    background: rgba(245, 143, 5, 0.8);
    border-radius: 0.5rem;
    font-weight: 700;
    font-size: 1.125rem;
    padding: 1rem 2rem;
    transition: color 0.2s, background 0.2s;
    z-index: 1;
}
.btn-ver-todos-programas::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 0%;
    height: 100%;
    background: #f58f05;
    z-index: -1;
    transition: width 1.5s ease;
}
.btn-ver-todos-programas:hover::before, .btn-ver-todos-programas:focus::before {
    width: 100%;
}
.btn-ver-todos-programas:hover, .btn-ver-todos-programas:focus {
    color: #fff;
    background: #f58f05;
}
.whatsapp-float {
    position: fixed;
    width: 56px;
    height: 56px;
    bottom: 32px;
    right: 32px;
    z-index: 1000;
    background: none;
    border-radius: 50%;
    box-shadow: 0 4px 16px rgba(0,0,0,0.18);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: transform 0.25s cubic-bezier(0.4,0,0.2,1), box-shadow 0.25s cubic-bezier(0.4,0,0.2,1);
}
.whatsapp-float:hover {
    transform: scale(1.12) translateY(-4px);
    box-shadow: 0 8px 24px rgba(37,211,102,0.25);
}
.whatsapp-float-center {
    position: fixed;
    top: 60%;
    left: 70%;
    transform: translate(-50%, -50%);
    z-index: 1000;
    background: transparent;
    border: none;
    border-radius: 0;
    box-shadow: none;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0;
    text-decoration: none;
    opacity: 0;
    animation: fadeInWhatsApp 1.5s ease-out 0.5s forwards;
    transition: transform 0.2s cubic-bezier(0.4,0,0.2,1);
    outline: none;
}
@keyframes fadeInWhatsApp {
    from {
        opacity: 0;
        transform: translate(-50%, -50%) translateY(30px);
    }
    to {
        opacity: 1;
        transform: translate(-50%, -50%) translateY(0);
    }
}
/* Eliminar animación hover */
.whatsapp-float-center:hover {
    transform: translate(-50%, -50%);
    box-shadow: 0 4px 16px rgba(0,0,0,0.18);
}
.whatsapp-float-center:hover {
    transform: translate(-50%, -50%) scale(1.08);
}
.whatsapp-icon-text img {
    display: inline-block;
    filter: drop-shadow(0 0 0 #25D366);
}
.btn-mas-info {
    display: inline-flex;
    align-items: center;
    gap: 16px;
    background: linear-gradient(90deg, #3c72fc 10.59%, #00060c 300.59%);
    color: #fff;
    font-size: 16px;
    font-family: 'Kumbh Sans', Arial, sans-serif;
    font-weight: 600;
    border: none;
    border-radius: 8px;
    padding: 12px 32px;
    cursor: pointer;
    transition: background 0.5s, box-shadow 0.5s;
    box-shadow: 0 2px 8px rgba(60, 114, 252, 0.08);
    margin-top: 16px;
}
.btn-mas-info:hover {
    background: linear-gradient(90deg, #3c72fc 0%, #00060c 100%);
    box-shadow: 0 4px 16px rgba(60, 114, 252, 0.18);
}
.arrow-icon {
    font-size: 22px;
    margin-left: 8px;
    display: inline-block;
    transition: transform 0.2s;
}
.btn-mas-info:hover .arrow-icon {
    transform: translateX(6px);
}
@media (max-width: 767px) {
    .hero-text {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        text-align: center;
        margin-left: 0 !important;
        margin-right: 0 !important;
        width: 100%;
        min-height: 80vh;
        gap: 32px;
    }
    .titulo-principal {
        font-size: 32px !important;
        order: 1;
    }
    .texto-descriptivo {
        font-size: 16px !important;
        order: 2;
        margin-top: 32px;
    }
    .whatsapp-float-center {
        position: static !important;
        margin: 56px auto 0 auto !important;
        left: unset !important;
        top: unset !important;
        transform: none !important;
        display: flex !important;
        justify-content: center;
        order: 3;
    }
    .btn-mas-info {
        display: none !important;
    }
}
</style>
@endpush

@push('scripts')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebSite",
    "name": "CREAD ONG",
    "url": "{{ url('/') }}",
    "description": "Organización no gubernamental peruana dedicada a la educación digital y el desarrollo comunitario",
    "potentialAction": {
        "@type": "SearchAction",
        "target": "{{ url('/blog') }}?search={search_term_string}",
        "query-input": "required name=search_term_string"
    },
    "publisher": {
        "@type": "NonProfit",
        "name": "CREAD ONG",
        "logo": {
            "@type": "ImageObject",
            "url": "{{ asset('assets/dicapilogo.png') }}"
        }
    }
}
</script>
<script>
// Efecto de revelación de capas desde abajo
document.addEventListener('DOMContentLoaded', function() {
    const programsSection = document.getElementById('programs-section');
    const footerSection = document.getElementById('footer-section');
    const redCurtain = document.getElementById('red-curtain');
    const workCurtain = document.getElementById('work-curtain');
    const footerCurtain = document.getElementById('footer-curtain');
    
    function checkScroll() {
        const scrollPosition = window.scrollY;
        const windowHeight = window.innerHeight;
        const bodyHeight = document.body.scrollHeight;
        
        // Controlar el mantel rojo - solo aparece cuando la sección de programas está cerca
        if (redCurtain) {
            const programsSectionTop = programsSection ? programsSection.offsetTop : windowHeight;
            const triggerPoint = programsSectionTop - windowHeight * 0.2; // Comienza cuando faltan 20% de pantalla
            
            if (scrollPosition >= triggerPoint) {
                const progress = Math.min((scrollPosition - triggerPoint) / (windowHeight * 0.3), 1);
                const translateY = (1 - progress) * 100;
                redCurtain.style.transform = `translateY(${translateY}%)`;
                if (workCurtain) workCurtain.style.transform = `translateY(${translateY}%)`;
            } else {
                redCurtain.style.transform = 'translateY(100%)';
                if (workCurtain) workCurtain.style.transform = 'translateY(100%)';
            }
        }
        
        // Revelar sección de programas cuando esté a punto de entrar en viewport
        if (programsSection && scrollPosition > windowHeight * 0.3) {
            programsSection.classList.add('revealed');
        }
        
        // Revelar footer cuando la sección de programas esté casi completamente visible
        if (footerSection && scrollPosition > windowHeight * 1.5) {
            footerSection.classList.add('revealed');
        }

        // Controlar el mantel footer - aparece solo al llegar al final de la página
        if (footerCurtain) {
            if (scrollPosition + windowHeight >= bodyHeight - 20) {
                footerCurtain.style.transform = `translateY(0)`;
            } else {
                footerCurtain.style.transform = 'translateY(100%)';
            }
        }
    }
    
    // Escuchar el evento de scroll
    window.addEventListener('scroll', checkScroll);
    
    // Verificar posición inicial
    checkScroll();
});

// Smooth scroll para el botón "Conócenos"
document.addEventListener('DOMContentLoaded', function() {
    const conocenosBtn = document.querySelector('.btn-conocenos-texto');
    if (conocenosBtn) {
        conocenosBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector('#programs-section');
            if (target) {
                const headerHeight = document.getElementById('main-header').offsetHeight;
                const targetPosition = target.offsetTop - headerHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    }
});

// Efecto de aparición gradual para las secciones
document.addEventListener('DOMContentLoaded', function() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
            }
        });
    }, observerOptions);
    
    // Observar las secciones de programas y footer
    const sections = document.querySelectorAll('#programs-section, #footer-section');
    sections.forEach(section => {
        section.style.opacity = '0';
        section.style.transition = 'opacity 0.8s ease-out';
        observer.observe(section);
    });
});

document.addEventListener('DOMContentLoaded', function() {
    function fadeInOnScroll(selector) {
        const elements = document.querySelectorAll(selector);
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2 });
        elements.forEach(el => observer.observe(el));
    }
    fadeInOnScroll('.fade-in-program');
});

document.addEventListener('DOMContentLoaded', function() {
    var whatsappBtn = document.getElementById('whatsapp-btn');
    window.addEventListener('scroll', function() {
        if (window.scrollY > window.innerHeight * 0.5) {
            whatsappBtn.style.display = 'none';
        } else {
            whatsappBtn.style.display = 'flex';
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var btn = document.getElementById('btn-mas-info');
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        var target = document.getElementById('programs-section');
        if (target) {
            window.scrollTo({
                top: target.offsetTop - 40,
                behavior: 'smooth'
            });
        }
    });
});
</script>
@endpush
@endsection
