@extends('layouts.app')

@section('title', 'Blog - CREAD ONG | Educación Digital y Desarrollo Comunitario en Perú')
@section('description', 'Descubre artículos sobre educación digital, desarrollo comunitario y programas sociales de CREAD ONG. Información actualizada sobre tecnología educativa, voluntariado y transformación social en Perú.')

@section('content')
    <!-- Mantel estático principal -->
    <section class="relative bg-gradient-to-r from-[#00479e] to-[#1976d2] py-32">
        <div class="container mx-auto px-10 text-left">
            <span class="block text-white/90 text-lg font-bold mb-4 uppercase fade-in-on-scroll tracking-wide">NUESTRO BLOG</span>
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-6 drop-shadow-lg max-w-6xl fade-in-on-scroll leading-tight text-left">
                Descubre las historias, proyectos e innovaciones de CREAD.<br>
                Aquí compartimos cómo estamos transformando la educación en Perú, uniendo tecnología, recursos y compromiso humano para un futuro más equitativo y preparado.
            </h1>
        </div>
    </section>

    <!-- Último blog creado (destacado) -->
    @php $ultimo = $blogs->first(); @endphp
    @if($ultimo)
    <section class="bg-white py-20 border-b border-gray-200 fade-in-on-scroll">
        <div class="container mx-auto px-6 flex flex-col md:flex-row items-center gap-12 fade-in-on-scroll">
            <div class="md:w-1/2 fade-in-on-scroll">
                <img src="{{ $ultimo->featured_image ? Storage::url($ultimo->featured_image) : 'https://images.unsplash.com/photo-1523240794102-9ebd6b7c8c0e?q=80&w=2070&auto=format&fit=crop' }}" alt="{{ $ultimo->title }}" class="w-full h-80 object-cover rounded-lg shadow-lg fade-in-on-scroll">
            </div>
            <div class="md:w-1/2 flex flex-col justify-center fade-in-on-scroll">
                <div class="text-sm text-gray-500 mb-3 fade-in-on-scroll">
                    {{ $ultimo->published_at ? $ultimo->published_at->format('d \d\e F, Y') : 'Sin fecha' }}
                </div>
                <h2 class="text-3xl font-bold mb-4 text-black fade-in-on-scroll">{{ $ultimo->title }}</h2>
                <p class="mb-6 text-lg text-gray-700 fade-in-on-scroll">{{ $ultimo->excerpt }}</p>
                <a href="{{ route('blog-review', $ultimo) }}" class="leer-mas-featured-btn fade-in-on-scroll">LEER MÁS</a>
            </div>
        </div>
    </section>
    @endif

    <!-- Mantel de últimos blogs -->
    <section class="bg-[#f5f5f5] py-20 fade-in-on-scroll">
        <div class="container mx-auto px-6 fade-in-on-scroll">
            <h2 class="text-3xl font-bold text-black mb-12 text-center fade-in-on-scroll">Últimos Blogs</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10 fade-in-on-scroll">
                @foreach($blogs->skip(1)->take(6) as $blog)
                <div class="bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg transition-all overflow-hidden flex flex-col fade-in-on-scroll">
                    <img src="{{ $blog->featured_image ? Storage::url($blog->featured_image) : 'https://images.unsplash.com/photo-1599059813005-11265ba4b4ce?q=80&w=2070&auto=format&fit=crop' }}" alt="{{ $blog->title }}" class="w-full h-56 object-cover fade-in-on-scroll">
                    <div class="p-6 flex flex-col flex-1 fade-in-on-scroll">
                        <div class="text-sm text-gray-500 mb-2 fade-in-on-scroll">
                            {{ $blog->published_at ? $blog->published_at->format('d \d\e F, Y') : 'Sin fecha' }}
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-black fade-in-on-scroll">{{ $blog->title }}</h3>
                        <p class="text-gray-700 mb-4 flex-grow fade-in-on-scroll">{{ $blog->excerpt }}</p>
                        <a href="{{ route('blog-review', $blog) }}" class="leer-mas-blog-link mt-auto fade-in-on-scroll">LEER MÁS</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer real -->
    <footer class="bg-black py-8 border-t border-gray-800" style="margin-top: 3rem;">
        <div class="container mx-auto flex flex-row items-center justify-between md:flex-row md:items-center md:justify-between flex-col items-center justify-center text-center">
            <img src="{{ asset('assets/logocread1.png') }}" alt="Logo CREAD" class="h-14 mb-4 md:mb-0">
            <div class="text-gray-300 text-base">&copy; {{ date('Y') }} Cread ONG. Todos los derechos reservados.</div>
        </div>
    </footer>
@endsection

@push('styles')
<style>
html, body {
    overflow-x: hidden !important;
}
#red-curtain, #work-curtain {
    left: 0;
    right: 0;
    bottom: 0;
    width: 100vw;
    transition: transform 0.05s ease-out;
    pointer-events: none;
}
#red-curtain {
    z-index: 15;
    background: linear-gradient(135deg, #dc2626 0%, #b91c1c 50%, #991b1b 100%);
    height: 200px;
}
#work-curtain {
    z-index: 20;
    background: #b91c1c;
    height: 200px;
}
#footer-curtain {
    z-index: 30;
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
.btn-leer-mas {
    position: relative;
    overflow: hidden;
    z-index: 1;
    border: 2px solid #fff;
    color: #fff;
    font-weight: 700;
    background: none;
    transition: color 0.2s;
}
.btn-leer-mas::before {
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
.btn-leer-mas:hover::before, .btn-leer-mas:focus::before {
    width: 100%;
}
.btn-leer-mas > * {
    position: relative;
    z-index: 1;
}
.leer-mas-link {
    color: #fff;
    font-weight: 600;
    text-decoration: none;
    position: relative;
    padding-bottom: 2px;
}
.leer-mas-link::after {
    content: '';
    display: block;
    position: absolute;
    left: 0;
    bottom: 0;
    width: 0%;
    height: 2px;
    background: #f58f05;
    transition: width 0.35s cubic-bezier(0.4,0,0.2,1);
}
.leer-mas-link:hover::after, .leer-mas-link:focus::after, .leer-mas-link:active::after {
    width: 100%;
}
.leer-mas-link:hover, .leer-mas-link:focus, .leer-mas-link:active {
    color: #fff;
}
.fade-in-on-scroll {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 1.5s ease, transform 1.5s ease;
}
.fade-in-on-scroll.visible {
    opacity: 1;
    transform: translateY(0);
}
.leer-mas-blog-link {
    color: #f58f05;
    font-weight: 700;
    text-decoration: none;
    position: relative;
    padding-bottom: 2px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-size: 1rem;
    transition: color 0.2s;
}
.leer-mas-blog-link::after {
    content: '';
    display: block;
    position: absolute;
    left: 0;
    bottom: 0;
    width: 0%;
    height: 2px;
    background: #f58f05;
    transition: width 0.35s cubic-bezier(0.4,0,0.2,1);
}
.leer-mas-blog-link:hover::after, .leer-mas-blog-link:focus::after, .leer-mas-blog-link:active::after {
    width: 100%;
}
.leer-mas-blog-link:hover, .leer-mas-blog-link:focus, .leer-mas-blog-link:active {
    color: #f58f05;
}
.leer-mas-featured-btn {
    display: inline-block;
    position: relative;
    overflow: hidden;
    color: #fff;
    background: rgba(245, 143, 5, 0.8);
    border-radius: 0.5rem;
    font-weight: 700;
    font-size: 1.125rem;
    padding: 0.75rem 2rem;
    transition: color 0.2s, background 0.2s;
    z-index: 1;
}
.leer-mas-featured-btn::before {
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
.leer-mas-featured-btn:hover::before, .leer-mas-featured-btn:focus::before {
    width: 100%;
}
.leer-mas-featured-btn:hover, .leer-mas-featured-btn:focus {
    color: #fff;
    background: #f58f05;
}
@media (max-width: 768px) {
    #work-curtain h1 {
        font-size: 1.5rem;
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
    #footer-curtain .container {
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    #footer-curtain img {
        margin-bottom: 1rem;
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
@push('scripts')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Blog",
    "name": "Blog CREAD ONG",
    "description": "Blog sobre educación digital, desarrollo comunitario y programas sociales",
    "url": "{{ url('/blog') }}",
    "publisher": {
        "@type": "NonProfit",
        "name": "CREAD ONG",
        "logo": {
            "@type": "ImageObject",
            "url": "{{ asset('assets/logocread1.png') }}"
        }
    },
    "blogPost": [
        @foreach($blogs as $blog)
        {
            "@type": "BlogPosting",
            "headline": "{{ $blog->title }}",
            "description": "{{ strip_tags(Str::limit($blog->content, 160)) }}",
            "url": "{{ url('/blog/' . $blog->slug) }}",
            "datePublished": "{{ $blog->created_at->toISOString() }}",
            "dateModified": "{{ $blog->updated_at->toISOString() }}",
            "author": {
                "@type": "Organization",
                "name": "CREAD ONG"
            },
            "publisher": {
                "@type": "NonProfit",
                "name": "CREAD ONG"
            },
            "mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "{{ url('/blog/' . $blog->slug) }}"
            }
        }@if(!$loop->last),@endif
        @endforeach
    ]
}
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const programsSection = document.querySelector('section.bg-white.py-20.border-b');
    const redCurtain = document.getElementById('red-curtain');
    const workCurtain = document.getElementById('work-curtain');
    const footerCurtain = document.getElementById('footer-curtain');
    function checkScroll() {
        const scrollPosition = window.scrollY;
        const windowHeight = window.innerHeight;
        // Mantel rojo y escribe: aparecen al llegar a la sección principal
        if (redCurtain && workCurtain && programsSection) {
            const programsSectionTop = programsSection.offsetTop;
            const triggerPoint = programsSectionTop - windowHeight * 0.2;
            if (scrollPosition >= triggerPoint) {
                redCurtain.style.transform = `translateY(0)`;
                workCurtain.style.transform = `translateY(0)`;
            } else {
                redCurtain.style.transform = 'translateY(100%)';
                workCurtain.style.transform = 'translateY(100%)';
            }
        }
        // Footer curtain: sube solo una franja
        if (footerCurtain) {
            const triggerPoint = document.body.scrollHeight - windowHeight * 1.2;
            if (scrollPosition >= triggerPoint) {
                footerCurtain.style.transform = `translateY(0)`;
            } else {
                footerCurtain.style.transform = 'translateY(100%)';
            }
        }
    }
    window.addEventListener('scroll', checkScroll);
    checkScroll();

    // Fade-in on scroll
    const fadeEls = document.querySelectorAll('.fade-in-on-scroll');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    fadeEls.forEach(el => observer.observe(el));
});
</script>
@endpush