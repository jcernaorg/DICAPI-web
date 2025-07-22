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

  <!-- Scripts & Styles via Vite -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  
  <!-- Custom Styles -->
  <style>
    /* Fade-in keyframes */
    @keyframes fade-in {
      from { opacity: 0; transform: translateY(10px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
      animation: fade-in 1s forwards;
    }
    /* Delays */
    .animate-delay-300 { animation-delay: .3s; }
    .animate-delay-400 { animation-delay: .4s; }
    .animate-delay-500 { animation-delay: .5s; }
    .animate-delay-600 { animation-delay: .6s; }
    .animate-delay-700 { animation-delay: .7s; }

    /* Navbar slide-down */
    @keyframes slide-down {
      from { opacity: 0; transform: translateY(-20px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    .fade-in-navbar {
      animation: slide-down 0.8s forwards .2s;
    }

    /* Body & fallback background */
    body {
      background-color: #000;
      overflow: hidden;
    }

    /* Navbar link hover */
    .navbar-link {
      color: white;
      transition: color 0.2s ease;
    }
    .navbar-link:hover {
      color: #1e40af !important;
    }

    /* Responsive logo */
    .responsive-logo {
      width: clamp(64px, 12vw, 180px) !important;
      height: clamp(64px, 12vw, 180px) !important;
      transition: width 0.3s ease, height 0.3s ease !important;
      object-fit: contain !important;
    }

    /* Background slides */
    #bg-image-1,
    #bg-image-2,
    #bg-image-3 {
      position: absolute; inset: 0;
      background-size: cover; background-position: center;
      background-repeat: no-repeat;
      transform: scale(1.1);
      transition: opacity 8s ease-in-out, transform 8s ease-in-out;
      opacity: 0;
      z-index: 1;
    }
    #bg-image-1 { opacity: 1 !important; }
  </style>
</head>
<body class="antialiased">
  {{-- Overlay azul semitransparente para mejorar legibilidad --}}
  <div style="position: absolute; inset: 0; width: 100vw; height: 100vh; background: rgba(22,54,120,0.45); z-index: 10; pointer-events: none;"></div>

  <!-- Logo -->
  <div class="absolute top-0 left-0 z-50 p-6">
    <img src="{{ asset('imagenes/dicapilogo.png') }}"
         alt="DICAPI Logo"
         class="responsive-logo animate-fade-in animate-delay-300">
  </div>

  <!-- Navbar -->
  <nav id="navbar"
       class="absolute top-0 left-0 right-0 z-50 opacity-0 transform -translate-y-4"
       style="background: transparent;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <div class="flex items-center">
          <div class="w-32"></div>
        </div>
        <div class="hidden md:flex items-center space-x-4 lg:space-x-8">
          <a href="/publicaciones" class="navbar-link px-3 py-2 rounded-md text-sm font-medium">Publicaciones</a>
          <a href="/plantillas"   class="navbar-link px-3 py-2 rounded-md text-sm font-medium">Plantillas</a>
        </div>
        <div class="md:hidden flex items-center space-x-16">
          <a href="/publicaciones" class="navbar-link text-sm font-medium px-2 py-1">Publicaciones</a>
          <a href="/plantillas"   class="navbar-link text-sm font-medium px-2 py-1">Plantillas</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="relative min-h-screen bg-black" style="min-height:100vh;">
    <!-- Slides -->
    <div id="bg-image-1" style="background-image: url('{{ asset('imagenes/1.jpg') }}');"></div>
    <div id="bg-image-2" style="background-image: url('{{ asset('imagenes/2.jpg') }}');"></div>
    <div id="bg-image-3" style="background-image: url('{{ asset('imagenes/3.jpg') }}');"></div>

    <div class="relative z-10 flex items-center min-h-screen">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
          <!-- Left Side -->
          <div class="text-center lg:text-left">
            <div class="fadein-text">
              <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white
                         animate-fade-in animate-delay-300">
                Asistente Virtual
              </h1>
              <h2
                class="text-2xl sm:text-3xl lg:text-4xl font-semibold animate-fade-in animate-delay-400"
                style="color: #3c72fc;"
                >
                DICAPI
                </h2>
              <p class="text-lg sm:text-xl text-gray-100 max-w-2xl
                        animate-fade-in animate-delay-500">
                Descubre cómo nuestra plataforma puede transformar tu experiencia digital. Ofrecemos soluciones innovadoras y personalizadas.
              </p>
            </div>
            <button class="px-8 py-3 font-semibold text-base rounded-md w-full sm:w-auto
                           transition-transform transform hover:scale-105 active:scale-95
                           animate-fade-in animate-delay-600"
                    style="background: linear-gradient(90deg, #2a5bd9 -10.59%, #000408 300.59%); color: #fff;"
                    onmouseover="this.style.background='linear-gradient(90deg, #1e4bb8 -10.59%, #000204 300.59%)'"
                    onmouseout="this.style.background='linear-gradient(90deg, #2a5bd9 -10.59%, #000408 300.59%)'"
                    onclick="window.location.href='/publicaciones'">
              Más Información →
            </button>
          </div>
          <!-- Right Side -->
          <div class="flex justify-center">
            <a href="https://wa.me/1234567890" target="_blank"
               class="bg-green-500 hover:bg-green-600 text-white p-3 sm:p-4 shadow-lg flex items-center space-x-2 rounded-md
                      transition-transform transform hover:scale-105 active:scale-95
                      animate-fade-in animate-delay-700">
              <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94
                         1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297
                         -.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149
                         -.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297
                         -1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489
                         1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124
                         -.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86
                         9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893
                         6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0
                         2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335
                         11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
              </svg>
              <span class="text-sm sm:text-base font-semibold">Contactar</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Navbar fade-in
      document.getElementById('navbar').classList.add('fade-in-navbar');

      // Responsive logo sizing
      const logo = document.querySelector('.responsive-logo');
      function adjustLogoSize() {
        const w = window.innerWidth;
        let s;
        if (w>=1920) s = Math.min(Math.max(60, w*0.11),170);
        else if (w>=1536) s = Math.min(Math.max(56, w*0.10),160);
        else if (w>=1440) s = Math.min(Math.max(52, w*0.09),150);
        else if (w>=1366) s = Math.min(Math.max(50, w*0.085),145);
        else if (w>=1280) s = Math.min(Math.max(48, w*0.08),140);
        else if (w>=1200) s = Math.min(Math.max(44, w*0.075),130);
        else if (w>=1024) s = Math.min(Math.max(40, w*0.07),120);
        else if (w>=900 ) s = Math.min(Math.max(36, w*0.065),110);
        else if (w>=768 ) s = Math.min(Math.max(80, w*0.16),240);
        else if (w>=720 ) s = Math.min(Math.max(76, w*0.15),230);
        else if (w>=640 ) s = Math.min(Math.max(72, w*0.14),220);
        else if (w>=600 ) s = Math.min(Math.max(68, w*0.13),210);
        else if (w>=540 ) s = Math.min(Math.max(64, w*0.12),200);
        else if (w>=480 ) s = Math.min(Math.max(60, w*0.11),190);
        else if (w>=420 ) s = Math.min(Math.max(56, w*0.10),180);
        else if (w>=375 ) s = Math.min(Math.max(52, w*0.09),170);
        else if (w>=360 ) s = Math.min(Math.max(48, w*0.08),160);
        else if (w>=320 ) s = Math.min(Math.max(44, w*0.07),150);
        else if (w>=280 ) s = Math.min(Math.max(40, w*0.06),140);
        else s = Math.min(Math.max(36, w*0.05),130);
        logo.style.width = logo.style.height = s + 'px';
      }
      adjustLogoSize();
      window.addEventListener('resize', () => {
        clearTimeout(window._logoResizeTimeout);
        window._logoResizeTimeout = setTimeout(adjustLogoSize, 100);
      });

      // Carousel + zoom
      const slides = [
        document.getElementById('bg-image-1'),
        document.getElementById('bg-image-2'),
        document.getElementById('bg-image-3')
      ];
      let current = 0, zoomInt, carouselInt;

      function showSlide(i) {
        slides.forEach((sl, idx) => sl.style.opacity = idx === i ? '1' : '0');
        current = i;
        startZoom(slides[i]);
      }
      function nextSlide() {
        showSlide((current + 1) % slides.length);
      }
      function startZoom(el) {
        clearInterval(zoomInt);
        let scale = 1.1, grow = true;
        zoomInt = setInterval(() => {
          scale = grow ? scale + 0.001 : scale - 0.001;
          if (scale >= 1.3) grow = false;
          if (scale <= 1.0) grow = true;
          el.style.transform = `scale(${scale})`;
        }, 50);
      }
      function startCarousel() {
        showSlide(0);
        carouselInt = setInterval(nextSlide, 8000);
      }
      startCarousel();
      window.addEventListener('beforeunload', () => {
        clearInterval(zoomInt);
        clearInterval(carouselInt);
      });
    });
  </script>
</body>
</html>
