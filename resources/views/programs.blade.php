@extends('layouts.app')

@section('title', 'Programas - Cread ONG')

@section('description', 'Explora nuestros programas diseñados para generar un impacto positivo en áreas como educación, salud y desarrollo comunitario.')

@push('styles')
<style>
    .program-card:hover .program-image {
        transform: scale(1.05);
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
    }
    .fade-in.animate {
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
    .hover-lift {
        transition: all 0.3s ease-in-out;
    }
    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
.mantel-programa {
    cursor: pointer;
    min-height: 200px;
    margin-bottom: 0;
    box-shadow: none;
    position: relative;
    border-radius: 0 !important;
}
.mantel-hover-content {
    transition: opacity 0.7s cubic-bezier(0.4,0,0.2,1);
    border-radius: 1rem;
    overflow: hidden;
}
.btn-mantel-verdetalles {
    color: #fff;
    font-weight: 700;
    text-transform: uppercase;
    font-size: 1.1rem;
    position: relative;
    text-decoration: none;
    padding-bottom: 2px;
    transition: color 0.2s;
}
.btn-mantel-verdetalles::after {
    content: '';
    display: block;
    position: absolute;
    left: 0;
    bottom: 0;
    width: 0%;
    height: 2px;
    background: #f58f05;
    transition: width 0.5s cubic-bezier(0.4,0,0.2,1);
}
.btn-mantel-verdetalles:hover::after, .btn-mantel-verdetalles:focus::after {
    width: 100%;
}
.btn-mantel-verdetalles:hover, .btn-mantel-verdetalles:focus {
    color: #f58f05;
}
.mantel-programa img,
.mantel-hover-content,
.mantel-programa .mantel-hover-content {
    border-radius: 0 !important;
}

/* Scroll suave para toda la página */
html {
    scroll-behavior: smooth;
}

/* Mejoras para dispositivos móviles */
@media (max-width: 768px) {
    .fade-in-on-scroll {
        transform: translateY(20px);
    }
    .mantel-programa {
        flex-direction: column !important;
        height: auto !important;
        min-height: 320px;
        padding-left: 0 !important;
        padding-right: 0 !important;
        margin-bottom: 2.5rem !important;
        margin-top: 2.5rem !important;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        border-radius: 0 !important;
    }
    .mantel-programa img {
        position: static !important;
        width: 100% !important;
        height: 180px !important;
        object-fit: cover !important;
        opacity: 1 !important;
        margin-bottom: 1rem;
        border-radius: 0 !important;
    }
    .mantel-programa .relative.z-10.w-full.flex.flex-row.items-center.h-full.pl-16.pr-16 {
        flex-direction: column !important;
        align-items: flex-start !important;
        padding-left: 1.5rem !important;
        padding-right: 1.5rem !important;
        height: auto !important;
    }
    .mantel-programa h2 {
        font-size: 1.5rem !important;
        margin-bottom: 0.5rem !important;
        color: #222 !important;
        text-align: left !important;
    }
    .mantel-programa .flex.flex-col.items-start.max-w-xl {
        margin-left: 0 !important;
        opacity: 1 !important;
        background: none !important;
        color: #444 !important;
        padding: 0 !important;
    }
    .mantel-programa .flex.flex-col.items-start.max-w-xl p {
        color: #444 !important;
        margin-bottom: 1rem !important;
    }
    .mantel-programa .btn-mantel-verdetalles {
        color: #f58f05 !important;
        margin-bottom: 1rem !important;
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
</style>
@endpush

@section('content')
<!-- Main Content -->
<main>
    <!-- Page Title Section -->
    <section class="relative" style="background: #f58f05;">
        <div class="container mx-auto px-10 text-left py-32">
            <span class="block text-white/90 text-lg font-bold mb-4 uppercase fade-in-on-scroll tracking-wide">Nuestros Programas</span>
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-6 drop-shadow-lg max-w-6xl fade-in-on-scroll leading-tight text-left">
                Descubre cómo estamos transformando vidas a través de nuestros diversos programas de impacto social.
            </h1>
        </div>
    </section>

    <!-- Manteles de Programas -->
    <section class="p-0 m-0 fade-in-on-scroll">
        <!-- Mantel 1 -->
        <div class="mantel-programa group relative bg-white w-full h-[400px] md:h-[400px] min-h-[200px] flex items-center px-0 py-0 transition-all duration-500 fade-in-on-scroll fade-in-delay-1">
            <img src='{{ asset('assets/1.png') }}' alt='' class='program-img-mobile absolute inset-0 w-full h-full object-cover z-0 opacity-0 group-hover:opacity-100 transition-all duration-700'>
            <div class="relative z-10 w-full flex flex-row items-center h-full pl-16 pr-16">
                <h2 class="text-4xl md:text-5xl font-extrabold mb-4 transition-all duration-500 flex-1 group-hover:text-white fade-in-on-scroll">Acceso Digital Educativo Integral</h2>
                <div class="flex flex-col items-start max-w-xl opacity-0 group-hover:opacity-100 transition-all duration-700 ml-12 fade-in-on-scroll fade-in-delay-2">
                    <p class="text-white text-lg mb-8">Este programa se centra en la democratización del acceso a una educación de calidad que integra herramientas digitales avanzadas y un currículo enriquecido en diversas áreas fundamentales.</p>
                    <a href="#" class="btn-mantel-verdetalles">VER DETALLES</a>
                </div>
            </div>
        </div>
        <!-- Mantel 2 -->
        <div class="mantel-programa group relative bg-white w-full h-[400px] md:h-[400px] min-h-[200px] flex items-center px-0 py-0 transition-all duration-500 fade-in-on-scroll fade-in-delay-2">
            <img src='{{ asset('assets/2.png') }}' alt='' class='program-img-mobile absolute inset-0 w-full h-full object-cover z-0 opacity-0 group-hover:opacity-100 transition-all duration-700'>
            <div class="relative z-10 w-full flex flex-row items-center h-full pl-16 pr-16">
                <h2 class="text-4xl md:text-5xl font-extrabold mb-4 transition-all duration-500 flex-1 group-hover:text-white fade-in-on-scroll">Centros de Innovación y Fortalecimiento Digital</h2>
                <div class="flex flex-col items-start max-w-xl opacity-0 group-hover:opacity-100 transition-all duration-700 ml-12 fade-in-on-scroll fade-in-delay-3">
                    <p class="text-white text-lg mb-8">Este programa se orienta a la creación y potenciación de espacios físicos y virtuales que sirvan como focos de excelencia en la educación digital.</p>
                    <a href="#" class="btn-mantel-verdetalles">VER DETALLES</a>
                </div>
            </div>
        </div>
        <!-- Mantel 3 -->
        <div class="mantel-programa group relative bg-white w-full h-[400px] md:h-[400px] min-h-[200px] flex items-center px-0 py-0 transition-all duration-500 fade-in-on-scroll fade-in-delay-3">
            <img src='{{ asset('assets/3.png') }}' alt='' class='program-img-mobile absolute inset-0 w-full h-full object-cover z-0 opacity-0 group-hover:opacity-100 transition-all duration-700'>
            <div class="relative z-10 w-full flex flex-row items-center h-full pl-16 pr-16">
                <h2 class="text-4xl md:text-5xl font-extrabold mb-4 transition-all duration-500 flex-1 group-hover:text-white fade-in-on-scroll">Puente al Futuro Digital</h2>
                <div class="flex flex-col items-start max-w-xl opacity-0 group-hover:opacity-100 transition-all duration-700 ml-12 fade-in-on-scroll fade-in-delay-4">
                    <p class="text-white text-lg mb-8">Este programa se dedica a construir un puente directo entre el talento educativo emergente y las oportunidades de desarrollo profesional y laboral en el Perú.</p>
                    <a href="#" class="btn-mantel-verdetalles">VER DETALLES</a>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- Footer real -->
<footer class="bg-black py-8 border-t border-gray-800" style="margin-top: 3rem;">
    <div class="container mx-auto flex flex-row items-center justify-between md:flex-row md:items-center md:justify-between flex-col items-center justify-center text-center">
        <img src="{{ asset('assets/logocread1.png') }}" alt="Logo CREAD" class="h-14 mb-4 md:mb-0">
        <div class="text-gray-300 text-base">&copy; 2025 Cread ONG. Todos los derechos reservados.</div>
    </div>
</footer>
@endsection

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
    });
</script>
@endpush 