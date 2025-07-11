@extends('layouts.app')

@section('content')
    <!-- Bloque de color rojo con título y descripción -->
    <section class="relative" style="background: #dc2626;">
        <div class="container mx-auto px-10 text-left py-32">
            <span class="block text-white/90 text-lg font-bold mb-4 uppercase fade-in-on-scroll tracking-wide">Sobre Nosotros</span>
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-6 drop-shadow-lg max-w-6xl fade-in-on-scroll leading-tight text-left">
                CREAD (Conectamos Recursos con Estrategias de Aprendizaje Digital) es una ONG peruana dedicada a transformar la educación a través de la integración de soluciones digitales.
            </h1>
        </div>
    </section>

    <!-- Main Content -->
    <main>
        <!-- Main Text Section -->
        <!-- (Eliminado el bloque de Nuestro Objetivo de aquí) -->

        <!-- Our Story Section -->
        <section class="py-12 md:py-24 fade-in-on-scroll">
            <div class="container mx-auto px-6">
                <div class="max-w-5xl mx-auto">
                    <h2 class="text-heading-1 font-bold text-black mb-6 fade-in-on-scroll">Nuestra Historia</h2>
                    <p class="text-body text-gray-600 mb-4 fade-in-on-scroll fade-in-delay-1">
                        La historia de CREAD comienza con el reconocimiento de una gran necesidad: en muchas regiones del Perú, los estudiantes no tienen acceso a herramientas
                        tecnológicas suficientes, lo que limita su desarrollo académico y profesional. Con el compromiso de cambiar esta realidad, CREAD se unió a Cread, una startup educativa con sede en Perú y Chile,
                        especializada en el desarrollo de un Sistema de Gestión de Aprendizajes (LMS). Juntos, diseñamos una plataforma educativa que no solo optimiza los procesos de enseñanza y aprendizaje, sino que
                        también se apoya en herramientas de inteligencia artificial para ofrecer contenidos interactivos y de alta calidad.
                    </p>
                    <p class="text-body text-gray-600 mb-4 fade-in-on-scroll fade-in-delay-2">
                        A través de una alianza con la Asociación Guadalupana y el Primer Colegio Nacional Benemérito de la República Nuestra Señora de Guadalupe, pusimos en marcha un servicio piloto 
                        para complementar la educación en Matemáticas y Programación. Este proyecto piloto, financiado por CREAD, busca proporcionar a los estudiantes herramientas digitales que les permitan reforzar y 
                        complementar sus conocimientos, especialmente en contextos educativos donde la asistencia a clases enfrenta interrupciones.
                    </p>
                    <p class="text-body text-gray-600 mb-4 fade-in-on-scroll fade-in-delay-3">
                        Este piloto ha sido fundamental en nuestra misión, permitiendo que los estudiantes de secundaria reciban un aprendizaje continuo, adaptado a sus necesidades y desafíos. Con este proyecto, CREAD continúa demostrando que la educación digital, cuando se implementa adecuadamente, puede ser un motor de cambio, transformando el acceso a la educación y mejorando la calidad del aprendizaje en las comunidades más necesitadas.
                    </p>
                </div>
            </div>
        </section>

        <!-- Nuestro Objetivo Section (ahora debajo de Nuestra Historia) -->
        <section class="bg-gray-50 py-16 fade-in-on-scroll">
            <div class="container mx-auto px-6">
                <div class="max-w-5xl mx-auto">
                    <h2 class="text-heading-1 font-bold text-black mb-6 fade-in-on-scroll text-left">Nuestro Objetivo</h2>
                    <p class="text-body text-gray-600 mb-4 fade-in-on-scroll fade-in-delay-1 text-left">
                        Nuestro objetivo es proporcionar acceso equitativo a una educación de calidad, centrada en la tecnología, para comunidades educativas en todo el país.
                        Contamos con un equipo de expertos comprometidos que unen sus esfuerzos para desarrollar herramientas innovadoras que complementen y optimicen el proceso de enseñanza-aprendizaje, 
                        asegurando que todos los estudiantes tengan las mismas oportunidades de crecer y aprender.
                    </p>
                    <p class="text-body text-gray-600 mb-4 fade-in-on-scroll fade-in-delay-2 text-left">
                        En CREAD, nos dedicamos a gestionar y facilitar el acceso equitativo a oportunidades educativas mediante la articulación de recursos estratégicos. 
                        Nuestra misión es fortalecer las capacidades de las comunidades educativas, docentes y organizaciones que buscan transformar el aprendizaje a través de la tecnología.
                    </p>
                    <p class="text-body text-gray-600 mb-4 fade-in-on-scroll fade-in-delay-3 text-left">
                        A través de un enfoque territorial y estratégico, trabajamos para construir un sistema educativo más accesible y adaptado a las necesidades de cada comunidad, 
                        asegurando que ningún estudiante se quede atrás en su camino hacia el aprendizaje y el desarrollo.
                    </p>
                </div>
            </div>
        </section>

        <!-- Propuesta de Valor Section - Estilo similar a Programas -->
        <section id="propuesta-valor" class="bg-white w-full fade-in-on-scroll">
            <div class="pt-32 pb-16 md:py-24">
                <div class="container-responsive">
                    <div class="text-center mb-16 fade-in-on-scroll" id="programs-title-block">
                        <h2 class="text-display font-bold mb-6 text-black fade-in-on-scroll">Propuesta de Valor</h2>
                        <p class="text-body-large text-gray-600 max-w-3xl mx-auto fade-in-on-scroll fade-in-delay-1">
                            Descubre cómo estamos transformando la educación a través de nuestros pilares fundamentales de impacto social.
                        </p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-0 w-full max-w-screen-2xl mx-auto fade-in-on-scroll" id="programs-grid-block">
                        <!-- Valor 1 -->
                        <div class="relative h-[600px] flex flex-col justify-center group overflow-hidden fade-in-on-scroll fade-in-delay-1" style="background-image: url('https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=2070&auto=format&fit=crop'); background-size: cover; background-position: center;">
                            <div class="absolute inset-0 bg-black/40 transition-all duration-500"></div>
                            <div class="relative z-10 p-16 flex flex-col justify-center">
                                <h3 class="text-xl font-extrabold text-white mb-6 uppercase">Enfoque Tecnológico</h3>
                                <p class="text-white text-sm font-medium opacity-0 group-hover:opacity-100 transition-all duration-500 transform translate-y-4 group-hover:translate-y-0">Enfocamos la tecnología como medio para mejorar el aprendizaje real, no como fin.</p>
                            </div>
                        </div>
                        <!-- Valor 2 -->
                        <div class="relative h-[600px] flex flex-col justify-center group overflow-hidden fade-in-on-scroll fade-in-delay-2" style="background-image: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=2071&auto=format&fit=crop'); background-size: cover; background-position: center;">
                            <div class="absolute inset-0 bg-black/40 transition-all duration-500"></div>
                            <div class="relative z-10 p-16 flex flex-col justify-center">
                                <h3 class="text-xl font-extrabold text-white mb-6 uppercase">Selección Equitativa</h3>
                                <p class="text-white text-sm font-medium opacity-0 group-hover:opacity-100 transition-all duration-500 transform translate-y-4 group-hover:translate-y-0">Seleccionamos a los estudiantes de manera equitativa y estratégica para insertarlos en procesos formativos de calidad digital.</p>
                            </div>
                        </div>
                        <!-- Valor 3 -->
                        <div class="relative h-[600px] flex flex-col justify-center group overflow-hidden fade-in-on-scroll fade-in-delay-3" style="background-image: url('https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=2070&auto=format&fit=crop'); background-size: cover; background-position: center;">
                            <div class="absolute inset-0 bg-black/40 transition-all duration-500"></div>
                            <div class="relative z-10 p-16 flex flex-col justify-center">
                                <h3 class="text-xl font-extrabold text-white mb-6 uppercase">Acompañamiento Integral</h3>
                                <p class="text-white text-sm font-medium opacity-0 group-hover:opacity-100 transition-all duration-500 transform translate-y-4 group-hover:translate-y-0">Acompañamos a docentes y estudiantes con mentorías, recursos adaptados al contexto local y seguimiento humano constante.</p>
                            </div>
                        </div>
                        <!-- Valor 4 -->
                        <div class="relative h-[600px] flex flex-col justify-center group overflow-hidden fade-in-on-scroll fade-in-delay-4" style="background-image: url('https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=2070&auto=format&fit=crop'); background-size: cover; background-position: center;">
                            <div class="absolute inset-0 bg-black/40 transition-all duration-500"></div>
                            <div class="relative z-10 p-16 flex flex-col justify-center">
                                <h3 class="text-xl font-extrabold text-white mb-6 uppercase">Alianzas Sostenibles</h3>
                                <p class="text-white text-sm font-medium opacity-0 group-hover:opacity-100 transition-all duration-500 transform translate-y-4 group-hover:translate-y-0">Buscamos alianzas público-privadas para sostenibilidad a largo plazo.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Mantel negro de contacto -->
    <section class="w-full bg-black py-12 mt-12">
        <div class="container mx-auto px-6 flex flex-col md:flex-row items-center justify-between text-white">
            <div class="flex items-center mb-6 md:mb-0">
                <img src="{{ asset('assets/dicapilogo.png') }}" alt="Logo CREAD" class="mr-4" style="height:60px;">
            </div>
            <div class="text-sm text-gray-400 text-center md:text-right">
                © 2025 Cread ONG. Todos los derechos reservados.
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
/* Estilos para las tarjetas de propuesta de valor */
.program-card {
    transition: all 0.3s ease-in-out;
}

.program-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

/* Efecto de zoom en las imágenes de fondo */
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

/* Efecto de hover mejorado para el botón Ver Detalles */
.btn-ver-detalles {
    position: relative;
    overflow: hidden;
    z-index: 1;
    border: 2px solid #fff;
    color: #fff;
    font-weight: 700;
    background: none;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
}

.btn-ver-detalles:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
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

/* Animaciones de entrada para elementos */
.fade-in {
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.6s ease-out;
}

.fade-in.animate {
    opacity: 1;
    transform: translateY(0);
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

/* Scroll suave para toda la página */
html {
    scroll-behavior: smooth;
}

/* Responsive container */
.container-responsive {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
}

@media (min-width: 640px) {
    .container-responsive {
        padding: 0 2rem;
    }
}

@media (min-width: 1024px) {
    .container-responsive {
        padding: 0 4rem;
    }
}

/* Mejoras para dispositivos móviles */
@media (max-width: 768px) {
    .fade-in-on-scroll {
        transform: translateY(20px);
    }
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

    // Counter Animation Function
    function animateCounter(elementId, targetValue, suffix = '', duration = 1200) {
        const element = document.getElementById(elementId);
        if (!element) return;

        const startValue = 0;
        const startTime = performance.now();
        
        function updateCounter(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            
            const easeOutQuart = 1 - Math.pow(1 - progress, 4);
            const currentValue = Math.floor(startValue + (targetValue - startValue) * easeOutQuart);
            
            if (targetValue >= 1000) {
                element.textContent = (currentValue / 1000).toFixed(1) + 'K' + suffix;
            } else {
                element.textContent = currentValue + suffix;
            }
            
            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            }
        }
        
        requestAnimationFrame(updateCounter);
    }

    // Progress Bar Animation Function
    function animateProgressBar(elementId, targetPercent, duration = 1200) {
        const element = document.getElementById(elementId);
        if (!element) return;

        const startTime = performance.now();
        
        function updateProgress(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            
            const easeOutQuart = 1 - Math.pow(1 - progress, 4);
            const currentPercent = (targetPercent * easeOutQuart);
            
            element.style.width = currentPercent + '%';
            
            if (progress < 1) {
                requestAnimationFrame(updateProgress);
            }
        }
        
        requestAnimationFrame(updateProgress);
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

        // Animar elementos de programas (para compatibilidad)
        const programElements = document.querySelectorAll('.fade-in-program');
        programElements.forEach(element => {
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