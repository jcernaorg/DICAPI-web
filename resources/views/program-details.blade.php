@extends('layouts.app')

@section('title', $program['title'] . ' - Cread ONG')

@section('description', $program['description'])

@push('styles')
<style>
    .program-image:hover { transform: scale(1.05); }
    .progress-bar { transition: width 1s ease-in-out; }
    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeIn 0.8s ease-out forwards;
    }
    .fade-in-delay-1 { animation-delay: 0.2s; }
    .fade-in-delay-2 { animation-delay: 0.4s; }
    .fade-in-delay-3 { animation-delay: 0.6s; }
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
        box-shadow: 0 10px 25px rgba(0,0,0,0.07);
    }
    .objective-card {
        transition: all 0.3s ease-in-out;
    }
    .objective-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    .progress-bar {
        width: 100%;
        height: 8px;
        background-color: #e5e7eb;
        border-radius: 9999px;
        overflow: hidden;
        margin: 8px 0;
    }
    .progress-bar-fill {
        height: 100%;
        border-radius: 9999px;
        width: 0;
        transition: width 2s ease-out;
    }
    .progress-bar-fill-green {
        background-color: #22c55e;
    }
    .progress-bar-fill-orange {
        background-color: #f97316;
    }
    .stat-number {
        color: #FB8E6D;
        font-size: 1.5rem;
        font-weight: 600;
    }
    .stat-label {
        color: #4b5563;
        margin-bottom: 0.5rem;
    }
    .stat-container {
        background: white;
        padding: 1.5rem;
        border-radius: 1rem;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        margin-bottom: 1rem;
    }
</style>
@endpush

@section('content')
<main>
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-[#FB8E6D] to-[#e67e5d] py-20 text-white">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-center">
                <div class="flex justify-between items-center mb-8">
                    <a href="{{ route('programs') }}" class="text-white hover:text-gray-200 transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i> Volver a Programas
                    </a>
                    <div class="text-sm">
                        <span class="bg-white/20 px-3 py-1 rounded-full">{{ $program['details']['status'] }}</span>
                        <span class="ml-2">desde {{ $program['details']['start_year'] }}</span>
                        <span class="ml-2">📍 {{ $program['details']['communities'] }} comunidades</span>
                    </div>
                </div>
                <div class="inline-flex items-center bg-white/10 px-4 py-2 rounded-full text-sm mb-6 fade-in">
                    <i class="fas fa-{{ ['graduation-cap', 'laptop-code', 'handshake'][$program['id'] % 3] }} mr-2"></i>
                    <span>Programa {{ $program['id'] }}</span>
                </div>
                <h1 class="text-5xl font-bold mb-6 fade-in">{{ $program['title'] }}</h1>
                <p class="text-xl mb-8 fade-in fade-in-delay-1">{{ $program['description'] }}</p>
                <div class="bg-white/10 p-6 rounded-lg mt-8 fade-in fade-in-delay-2">
                    <p class="text-lg italic">{{ $program['focus'] }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="py-16">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-3 gap-12">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <h2 class="text-3xl font-bold mb-8 text-black fade-in">Descripción del Programa</h2>
                    <div class="prose prose-lg max-w-none fade-in fade-in-delay-1">
                        <p class="text-gray-600 mb-6">{{ $program['details']['description'] }}</p>
                        
                        <h3 class="text-2xl font-bold mb-4">Objetivos Principales</h3>
                        <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                            @foreach($program['objectives'] as $objective)
                            <li>{{ $objective }}</li>
                            @endforeach
                        </ul>

                        <h3 class="text-2xl font-bold mb-4">Metodología</h3>
                        <p class="text-gray-600 mb-6">{{ $program['details']['methodology'] }}</p>

                        <div class="bg-gray-50 p-6 rounded-2xl mb-8 hover-lift">
                            <h4 class="font-bold text-lg mb-3">¿Por qué es importante?</h4>
                            <p class="text-gray-700">{{ $program['details']['importance'] }}</p>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <!-- Estadísticas Rápidas Section -->
                    <div class="bg-white p-6 rounded-xl shadow-sm mb-8">
                        <h2 class="text-xl font-bold mb-6">Estadísticas Rápidas</h2>
                        <div class="stats-section space-y-6">
                            <div class="stat-container border-b pb-4">
                                <div class="flex justify-between items-center">
                                    <span class="stat-label">Estudiantes Beneficiados</span>
                                    <span class="stat-number counter" data-target="{{ $program['details']['impact_metrics']['students'] }}">0</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-bar-fill progress-bar-fill-green" data-width="85%"></div>
                                </div>
                            </div>

                            <div class="stat-container border-b pb-4">
                                <div class="flex justify-between items-center">
                                    <span class="stat-label">Comunidades Atendidas</span>
                                    <span class="stat-number counter" data-target="{{ $program['details']['impact_metrics']['communities'] }}">0</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-bar-fill progress-bar-fill-orange" data-width="75%"></div>
                                </div>
                            </div>

                            <div class="stat-container">
                                <div class="flex justify-between items-center">
                                    <span class="stat-label">Maestros Capacitados</span>
                                    <span class="stat-number counter" data-target="{{ $program['details']['impact_metrics']['teachers'] }}">0</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-bar-fill progress-bar-fill-green" data-width="90%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Detalles del Programa Section -->
                    <div class="bg-white p-6 rounded-xl shadow-sm mb-8">
                        <h2 class="text-xl font-bold mb-6">Detalles del Programa</h2>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center py-2 border-b">
                                <span class="text-gray-600">Duración:</span>
                                <span class="font-semibold">{{ $program['details']['duration'] }}</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b">
                                <span class="text-gray-600">Presupuesto:</span>
                                <span class="font-semibold">${{ number_format($program['details']['budget']) }}</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b">
                                <span class="text-gray-600">Recaudado:</span>
                                <span class="font-semibold text-[#FB8E6D]">${{ number_format($program['details']['raised']) }}</span>
                            </div>
                            <div class="flex justify-between items-center py-2">
                                <span class="text-gray-600">Estado:</span>
                                <span class="font-semibold bg-green-100 text-green-800 px-3 py-1 rounded-full">{{ $program['details']['status'] }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- ¿Tienes Preguntas? Section -->
                    <div class="bg-white p-6 rounded-xl shadow-sm">
                        <h3 class="text-xl font-bold mb-4">¿Tienes Preguntas?</h3>
                        <p class="text-gray-700 mb-4">Estamos aquí para ayudarte. Contáctanos para obtener más información sobre este programa.</p>
                        <a href="{{ route('contact') }}" class="bg-black text-white px-6 py-3 rounded-full hover:bg-gray-800 transition-all block text-center font-semibold">
                            Contactar Equipo
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Impact Metrics Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Nuestro Impacto</h2>
            <div class="grid md:grid-cols-3 gap-8">
                @if(isset($program['details']['impact_metrics']['students']))
                <div class="text-center">
                    <div class="text-4xl font-bold text-[#FB8E6D] mb-2">
                        <span class="counter" data-target="{{ $program['details']['impact_metrics']['students'] }}">0</span>+
                    </div>
                    <p class="text-gray-600">Estudiantes Beneficiados</p>
                </div>
                @endif

                @if(isset($program['details']['impact_metrics']['schools']))
                <div class="text-center">
                    <div class="text-4xl font-bold text-[#FB8E6D] mb-2">
                        <span class="counter" data-target="{{ $program['details']['impact_metrics']['schools'] }}">0</span>
                    </div>
                    <p class="text-gray-600">Centros Educativos</p>
                </div>
                @elseif(isset($program['details']['impact_metrics']['centers']))
                <div class="text-center">
                    <div class="text-4xl font-bold text-[#FB8E6D] mb-2">
                        <span class="counter" data-target="{{ $program['details']['impact_metrics']['centers'] }}">0</span>
                    </div>
                    <p class="text-gray-600">Centros de Innovación</p>
                </div>
                @elseif(isset($program['details']['impact_metrics']['companies']))
                <div class="text-center">
                    <div class="text-4xl font-bold text-[#FB8E6D] mb-2">
                        <span class="counter" data-target="{{ $program['details']['impact_metrics']['companies'] }}">0</span>
                    </div>
                    <p class="text-gray-600">Empresas Asociadas</p>
                </div>
                @endif

                @if(isset($program['details']['impact_metrics']['success_rate']))
                <div class="text-center">
                    <div class="text-4xl font-bold text-[#FB8E6D] mb-2">
                        <span class="counter" data-target="{{ $program['details']['impact_metrics']['success_rate'] }}">0</span>%
                    </div>
                    <p class="text-gray-600">Tasa de Éxito</p>
                </div>
                @elseif(isset($program['details']['impact_metrics']['placement_rate']))
                <div class="text-center">
                    <div class="text-4xl font-bold text-[#FB8E6D] mb-2">
                        <span class="counter" data-target="{{ $program['details']['impact_metrics']['placement_rate'] }}">0</span>%
                    </div>
                    <p class="text-gray-600">Tasa de Colocación</p>
                </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Participation Section -->
    <section class="py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">¿Cómo Puedes Participar?</h2>
            <div class="grid md:grid-cols-3 gap-8">
                @foreach($program['details']['participation_options'] as $option)
                <div class="bg-white p-6 rounded-xl shadow-lg hover-lift text-center">
                    <h3 class="text-xl font-bold mb-4">{{ $option['title'] }}</h3>
                    <p class="text-gray-600 mb-6">{{ $option['description'] }}</p>
                    <a href="{{ route('contact') }}" class="inline-block bg-[#FB8E6D] text-white px-6 py-2 rounded-full hover:bg-[#e67e5d] transition-colors">
                        Más Info
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6 max-w-2xl">
            <h2 class="text-3xl font-bold text-center mb-12">¿Interesado en Participar?</h2>
            <div class="bg-white p-8 rounded-2xl shadow-lg">
                <form action="{{ route('contact') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-gray-700 mb-2" for="name">Tu nombre</label>
                        <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#FB8E6D] focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2" for="email">Tu email</label>
                        <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#FB8E6D] focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2" for="interest">Selecciona tu interés</label>
                        <select id="interest" name="interest" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#FB8E6D] focus:border-transparent">
                            <option value="">Selecciona una opción...</option>
                            @foreach($program['details']['participation_options'] as $key => $option)
                            <option value="{{ $key }}">{{ $option['title'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2" for="message">Cuéntanos más sobre tu interés...</label>
                        <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#FB8E6D] focus:border-transparent"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-[#FB8E6D] text-white py-3 px-6 rounded-lg hover:bg-[#e67e5d] transition-colors font-semibold">
                        Enviar Mensaje
                    </button>
                </form>
            </div>
        </div>
    </section>
</main>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Función para animar el contador
    function animateCounter(element, target, duration = 2000) {
        let start = 0;
        const increment = target / (duration / 16);
        const timer = setInterval(() => {
            start += increment;
            if (start >= target) {
                element.textContent = Math.round(target).toLocaleString();
                clearInterval(timer);
            } else {
                element.textContent = Math.round(start).toLocaleString();
            }
        }, 16);
    }

    // Función para iniciar las animaciones cuando el elemento es visible
    function startAnimationsWhenVisible(entries, observer) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Animar barras de progreso
                entry.target.querySelectorAll('.progress-bar-fill').forEach(bar => {
                    bar.style.width = bar.dataset.width;
                });
                
                // Animar contadores
                entry.target.querySelectorAll('.counter').forEach(counter => {
                    animateCounter(counter, parseInt(counter.dataset.target));
                });
                
                // Dejar de observar después de animar
                observer.unobserve(entry.target);
            }
        });
    }

    // Crear el observer
    const observer = new IntersectionObserver(startAnimationsWhenVisible, {
        threshold: 0.1
    });

    // Observar las secciones de estadísticas
    document.querySelectorAll('.stats-section').forEach(section => {
        observer.observe(section);
    });
});
</script>
@endpush 