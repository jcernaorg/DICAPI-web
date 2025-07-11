@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gray-50 py-20">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 text-black fade-in">Testimonios y Reviews</h1>
            <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto fade-in fade-in-delay-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <div class="flex justify-center items-center space-x-8 fade-in fade-in-delay-2">
                <div class="text-center">
                    <div class="text-3xl font-bold text-[#FB8E6D]" id="counter-rating">0</div>
                    <div class="flex justify-center mb-2">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                    </div>
                    <p class="text-sm text-gray-600">Calificación Promedio</p>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-[#FB8E6D]" id="counter-testimonials">0+</div>
                    <p class="text-sm text-gray-600">Testimonios</p>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-[#FB8E6D]" id="counter-satisfaction">0%</div>
                    <p class="text-sm text-gray-600">Satisfacción</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Reviews Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-black fade-in">Testimonios Destacados</h2>
                <p class="text-gray-600 max-w-2xl mx-auto fade-in fade-in-delay-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Featured Review 1 -->
                <div class="bg-gray-50 p-8 rounded-2xl shadow-lg hover-lift fade-in fade-in-delay-1">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('assets/person1.png') }}" alt="Testimonio 1" class="w-16 h-16 rounded-full mr-4 object-cover">
                        <div>
                            <h3 class="text-xl font-bold">María Elena</h3>
                            <p class="text-gray-600">Beneficiaria del Programa de Educación</p>
                        </div>
                    </div>
                    <div class="flex mb-4">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                    </div>
                    <p class="text-gray-600 mb-4">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."</p>
                    <div class="text-sm text-gray-500">Hace 2 meses</div>
                </div>

                <!-- Featured Review 2 -->
                <div class="bg-gray-50 p-8 rounded-2xl shadow-lg hover-lift fade-in fade-in-delay-2">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('assets/person2.png') }}" alt="Testimonio 2" class="w-16 h-16 rounded-full mr-4 object-cover">
                        <div>
                            <h3 class="text-xl font-bold">Carlos Mendoza</h3>
                            <p class="text-gray-600">Voluntario desde 2020</p>
                        </div>
                    </div>
                    <div class="flex mb-4">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                    </div>
                    <p class="text-gray-600 mb-4">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."</p>
                    <div class="text-sm text-gray-500">Hace 1 mes</div>
                </div>

                <!-- Featured Review 3 -->
                <div class="bg-gray-50 p-8 rounded-2xl shadow-lg hover-lift fade-in fade-in-delay-3">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('assets/person3.png') }}" alt="Testimonio 3" class="w-16 h-16 rounded-full mr-4 object-cover">
                        <div>
                            <h3 class="text-xl font-bold">Dr. Ana López</h3>
                            <p class="text-gray-600">Médica del Equipo de Salud</p>
                        </div>
                    </div>
                    <div class="flex mb-4">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                    </div>
                    <p class="text-gray-600 mb-4">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."</p>
                    <div class="text-sm text-gray-500">Hace 3 semanas</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Review Categories Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-black fade-in">Categorías de Testimonios</h2>
                <p class="text-gray-600 max-w-2xl mx-auto fade-in fade-in-delay-1">Explora testimonios por diferentes perspectivas y experiencias.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                <button class="category-btn bg-[#FB8E6D] text-white p-4 rounded-2xl font-semibold hover:bg-[#e67e5d] transition-all hover:scale-105 fade-in fade-in-delay-1" data-category="all">
                    Todos (2,500+)
                </button>
                <button class="category-btn bg-white text-gray-700 p-4 rounded-2xl font-semibold hover:bg-gray-50 transition-all hover:scale-105 fade-in fade-in-delay-2" data-category="beneficiaries">
                    Beneficiarios (1,200+)
                </button>
                <button class="category-btn bg-white text-gray-700 p-4 rounded-2xl font-semibold hover:bg-gray-50 transition-all hover:scale-105 fade-in fade-in-delay-3" data-category="volunteers">
                    Voluntarios (800+)
                </button>
                <button class="category-btn bg-white text-gray-700 p-4 rounded-2xl font-semibold hover:bg-gray-50 transition-all hover:scale-105 fade-in" data-category="donors">
                    Donantes (500+)
                </button>
            </div>
        </div>
    </section>

    <!-- All Reviews Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($reviews as $review)
                <div class="review-card bg-gray-50 p-6 rounded-2xl shadow-lg hover-lift fade-in" data-category="{{ $review->category }}">
                    <div class="flex items-center mb-3">
                        <img src="{{ $review->avatar }}" alt="Review {{ $loop->iteration }}" class="w-12 h-12 rounded-full mr-3 object-cover">
                        <div>
                            <h4 class="font-semibold">{{ $review->name }}</h4>
                            <p class="text-sm text-gray-600">{{ $review->role }}</p>
                        </div>
                    </div>
                    <div class="flex mb-3">
                        @for($i = 0; $i < 5; $i++)
                            <span class="{{ $i < $review->rating ? 'star' : 'star-empty' }}">★</span>
                        @endfor
                    </div>
                    <p class="text-gray-600 text-sm mb-3">{{ $review->content }}</p>
                    <div class="text-xs text-gray-500">{{ $review->created_at->diffForHumans() }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Leave a Review Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-6 text-black fade-in">Comparte Tu Experiencia</h2>
                <p class="text-gray-600 mb-8 fade-in fade-in-delay-1">¿Has sido beneficiario, voluntario o donante? Nos encantaría escuchar tu historia.</p>
                <form action="{{ route('reviews.store') }}" method="POST" class="bg-white p-8 rounded-2xl shadow-lg hover-lift fade-in fade-in-delay-2">
                    @csrf
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Categoría</label>
                        <select name="category" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FB8E6D]">
                            <option value="">Selecciona una categoría</option>
                            <option value="beneficiaries">Beneficiario</option>
                            <option value="volunteers">Voluntario</option>
                            <option value="donors">Donante</option>
                            <option value="other">Otro</option>
                        </select>
                        @error('category')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Calificación</label>
                        <div class="flex justify-center space-x-2">
                            @for($i = 1; $i <= 5; $i++)
                                <button type="button" class="star-btn text-2xl star-empty hover:star" data-rating="{{ $i }}">★</button>
                            @endfor
                        </div>
                        <input type="hidden" name="rating" id="rating" value="">
                        @error('rating')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Tu Testimonio</label>
                        <textarea name="content" rows="4" class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FB8E6D]" placeholder="Comparte tu experiencia con nosotros..."></textarea>
                        @error('content')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="w-full bg-[#FB8E6D] text-white py-3 rounded-lg font-semibold hover:bg-[#e67e5d] transition-all hover:scale-105">
                        Enviar Testimonio
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
    .star { color: #fbbf24; }
    .star-empty { color: #e5e7eb; }
    .fade-in { opacity: 0; transform: translateY(20px); }
    .fade-in.animate { animation: fadeIn 0.8s ease-out forwards; }
    .fade-in-delay-1 { animation-delay: 0.2s; }
    .fade-in-delay-2 { animation-delay: 0.4s; }
    .fade-in-delay-3 { animation-delay: 0.6s; }
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
    .category-btn {
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .category-btn:hover {
        transform: scale(1.05);
    }
    .review-card {
        transition: all 0.3s ease;
    }
    .review-card.hidden {
        display: none !important;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fadeElements = document.querySelectorAll('.fade-in');
        fadeElements.forEach(element => {
            void element.offsetWidth;
            element.classList.add('animate');
        });
        // Animación de contadores
        function animateCounter(element, target, duration = 2000) {
            let start = 0;
            const increment = target / (duration / 16);
            const timer = setInterval(() => {
                start += increment;
                if (start >= target) {
                    element.textContent = target + (element.id === 'counter-satisfaction' ? '%' : element.id === 'counter-testimonials' ? '+' : '');
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(start) + (element.id === 'counter-satisfaction' ? '%' : element.id === 'counter-testimonials' ? '+' : '');
                }
            }, 16);
        }

        // Iniciar animaciones cuando los elementos sean visibles
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const element = entry.target;
                    switch(element.id) {
                        case 'counter-rating':
                            animateCounter(element, 4.8);
                            break;
                        case 'counter-testimonials':
                            animateCounter(element, 2500);
                            break;
                        case 'counter-satisfaction':
                            animateCounter(element, 98);
                            break;
                    }
                    observer.unobserve(element);
                }
            });
        });

        // Observar los contadores
        document.querySelectorAll('[id^="counter-"]').forEach(counter => {
            observer.observe(counter);
        });

        // Filtrado de testimonios
        const categoryButtons = document.querySelectorAll('.category-btn');
        const reviewCards = document.querySelectorAll('.review-card');

        categoryButtons.forEach(button => {
            button.addEventListener('click', () => {
                const category = button.getAttribute('data-category');
                
                // Actualizar estado activo de los botones
                categoryButtons.forEach(btn => {
                    btn.classList.remove('bg-[#FB8E6D]', 'text-white');
                    btn.classList.add('bg-white', 'text-gray-700');
                });
                button.classList.remove('bg-white', 'text-gray-700');
                button.classList.add('bg-[#FB8E6D]', 'text-white');

                // Filtrar tarjetas
                reviewCards.forEach(card => {
                    if (category === 'all' || card.getAttribute('data-category') === category) {
                        card.classList.remove('hidden');
                    } else {
                        card.classList.add('hidden');
                    }
                });
            });
        });

        // Sistema de calificación
        const starButtons = document.querySelectorAll('.star-btn');
        const ratingInput = document.getElementById('rating');

        starButtons.forEach(button => {
            button.addEventListener('click', () => {
                const rating = button.getAttribute('data-rating');
                ratingInput.value = rating;

                // Actualizar visualización de estrellas
                starButtons.forEach((btn, index) => {
                    if (index < rating) {
                        btn.classList.remove('star-empty');
                        btn.classList.add('star');
                    } else {
                        btn.classList.remove('star');
                        btn.classList.add('star-empty');
                    }
                });
            });
        });
    });
</script>
@endpush