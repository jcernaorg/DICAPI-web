@extends('layouts.app')

@section('title', $blog->title . ' | CREAD ONG')
@section('description', strip_tags(Str::limit($blog->content, 160)) . ' - Lee más sobre educación digital y desarrollo comunitario en CREAD ONG.')

@section('content')
    <!-- Mantel estático principal -->
    <section class="relative bg-gradient-to-r from-[#00479e] to-[#1976d2] py-32 fade-in-on-scroll">
        <div class="container mx-auto px-10 text-left fade-in-on-scroll">
            <span class="block text-white/90 text-lg font-bold mb-4 uppercase fade-in-on-scroll tracking-wide">BLOG</span>
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-6 drop-shadow-lg max-w-6xl fade-in-on-scroll leading-tight text-left">
                {{ $blog->title }}
            </h1>
            <div class="flex flex-wrap items-center gap-4 mb-4 fade-in-on-scroll">
                <a href="{{ route('blog') }}" class="text-[#FB8E6D] hover:text-[#e67e5d] font-semibold transition-all fade-in-on-scroll">← Volver al Blog</a>
                <span class="bg-[#FB8E6D] text-white px-3 py-1 rounded-full text-sm font-semibold fade-in-on-scroll">Blog</span>
                <span class="text-gray-200 ml-2 fade-in-on-scroll">{{ $blog->published_at->format('d \d\e F, Y') }}</span>
            </div>
            <p class="text-xl text-white/90 mb-8 fade-in-on-scroll">{{ $blog->excerpt }}</p>
            <div class="flex items-center fade-in-on-scroll">
                @if($blog->user && $blog->user->avatar)
                    <img src="{{ $blog->user->avatar }}" alt="{{ $blog->user->name }}" class="w-12 h-12 rounded-full mr-4 object-cover fade-in-on-scroll">
                @endif
                <div class="fade-in-on-scroll">
                    <div class="font-semibold text-white">{{ $blog->user ? $blog->user->name : 'Autor' }}</div>
                    <div class="text-gray-200 text-sm">{{ $blog->user ? $blog->user->email : '' }}</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Article Content -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6 fade-in-on-scroll">
            <div class="max-w-6xl mx-auto fade-in-on-scroll">
                <div class="grid lg:grid-cols-3 gap-12 fade-in-on-scroll">
                    <!-- Main Content -->
                    <div class="lg:col-span-2 fade-in-on-scroll">
                        @if($blog->featured_image)
                        <img src="{{ Storage::url($blog->featured_image) }}" alt="{{ $blog->title }}" class="w-full h-96 object-cover rounded-lg mb-8 hover-lift fade-in-on-scroll">
                        @endif
                        <article class="blog-content fade-in-on-scroll">
                            {!! nl2br(e($blog->content)) !!}
                        </article>
                        <!-- Tags (opcional) -->
                        <div class="mt-8 pt-8 border-t border-gray-200 fade-in-on-scroll">
                            <h3 class="font-semibold mb-4">Etiquetas:</h3>
                            <div class="flex flex-wrap gap-2">
                                <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm hover:bg-[#FB8E6D] hover:text-white transition-all">Blog</span>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="lg:col-span-1 fade-in-on-scroll">
                        <!-- Autor -->
                        <div class="bg-gray-50 p-6 rounded-lg mb-8 hover-lift fade-in-on-scroll">
                            <h3 class="font-bold text-lg mb-4">Sobre el Autor</h3>
                            <div class="flex items-center mb-4">
                                @if($blog->user && $blog->user->avatar)
                                    <img src="{{ $blog->user->avatar }}" alt="{{ $blog->user->name }}" class="w-16 h-16 rounded-full mr-4 object-cover">
                                @endif
                                <div>
                                    <div class="font-semibold">{{ $blog->user ? $blog->user->name : 'Autor' }}</div>
                                    <div class="text-gray-600 text-sm">{{ $blog->user ? $blog->user->email : '' }}</div>
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm">@if($blog->user) ¡Gracias por leernos! @endif</p>
                        </div>

                        <!-- Relacionados -->
                        @if($related->count())
                        <div class="bg-gray-50 p-6 rounded-lg mb-8 hover-lift fade-in-on-scroll">
                            <h3 class="font-bold text-lg mb-4">También te puede interesar</h3>
                            <ul class="space-y-4">
                                @foreach($related as $rel)
                                <li class="fade-in-on-scroll">
                                    <a href="{{ route('blog-review', $rel) }}" class="flex items-center group">
                                        <img src="{{ $rel->featured_image ? Storage::url($rel->featured_image) : 'https://images.unsplash.com/photo-1523240794102-9ebd6b7c8c0e?q=80&w=2070&auto=format&fit=crop' }}" alt="{{ $rel->title }}" class="w-16 h-16 rounded-lg object-cover mr-4">
                                        <div>
                                            <div class="font-semibold text-gray-900 group-hover:text-[#FB8E6D]">{{ $rel->title }}</div>
                                            <div class="text-gray-500 text-sm">{{ $rel->published_at->format('d \d\e F, Y') }}</div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        body {
            font-family: 'Manrope', sans-serif;
            background-color: #FCF9F6;
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
        .blog-content h2 { @apply text-2xl font-bold mb-4 mt-8; }
        .blog-content h3 { @apply text-xl font-bold mb-3 mt-6; }
        .blog-content p { @apply mb-4 text-gray-600 leading-relaxed; }
        .blog-content ul { @apply list-disc list-inside mb-4 text-gray-600; }
        .blog-content blockquote { @apply border-l-4 border-[#FB8E6D] pl-4 italic text-gray-700 mb-4; }
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeIn 0.8s ease-out forwards;
        }
        .fade-in-delay-1 {
            animation-delay: 0.2s;
        }
        .fade-in-delay-2 {
            animation-delay: 0.4s;
        }
        .fade-in-delay-3 {
            animation-delay: 0.6s;
        }
        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
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
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .navbar-link:hover {
            color: #FB8E6D !important;
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
    </style>
@endpush
@push('scripts')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BlogPosting",
    "headline": "{{ $blog->title }}",
    "description": "{{ strip_tags(Str::limit($blog->content, 160)) }}",
    "url": "{{ url('/blog/' . $blog->slug) }}",
    "datePublished": "{{ $blog->created_at->toISOString() }}",
    "dateModified": "{{ $blog->updated_at->toISOString() }}",
    "author": {
        "@type": "Organization",
        "name": "CREAD ONG",
        "url": "{{ url('/') }}"
    },
    "publisher": {
        "@type": "NonProfit",
        "name": "CREAD ONG",
        "logo": {
            "@type": "ImageObject",
            "url": "{{ asset('assets/logocread1.png') }}"
        }
    },
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{ url('/blog/' . $blog->slug) }}"
    },
    "image": {
        "@type": "ImageObject",
        "url": "{{ $blog->featured_image ? Storage::url($blog->featured_image) : asset('assets/logocread1.png') }}"
    },
    "articleSection": "Educación Digital",
    "keywords": "educación digital, desarrollo comunitario, CREAD ONG, Perú, tecnología educativa, programas sociales",
    "inLanguage": "es-PE"
}
</script>
    <script>
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Trigger fade-in animations when page loads
        document.addEventListener('DOMContentLoaded', function() {
            const fadeElements = document.querySelectorAll('.fade-in');
            fadeElements.forEach(element => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(20px)';
            });
        });

        // Fade-in on scroll igual que en blog.blade.php
        document.addEventListener('DOMContentLoaded', function() {
            const fadeEls = document.querySelectorAll('.fade-in-on-scroll');
            // Fade-in inicial para elementos ya en viewport
            fadeEls.forEach(el => {
                const rect = el.getBoundingClientRect();
                if (rect.top < window.innerHeight) {
                    el.classList.add('visible');
                }
            });
            // Observer para el resto
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