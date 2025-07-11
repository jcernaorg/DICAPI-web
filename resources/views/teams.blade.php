@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gray-50 py-20">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 text-black fade-in">Nuestro Equipo</h1>
            <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto fade-in fade-in-delay-1">En CREAD, somos un equipo diverso y apasionado comprometido con la transformación del acceso a la educación. Cada miembro aporta su talento y visión para impulsar soluciones digitales inclusivas y sostenibles, alineadas con nuestro objetivo de ofrecer una educación de calidad a todos los estudiantes.
            Trabajamos con el corazón para fortalecer capacidades en las comunidades educativas y empoderar a los estudiantes como agentes de cambio. Creemos firmemente que la educación es la clave para un futuro más justo y sostenible</p>
        </div>
    </section>

    <!-- Leadership Team Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-black fade-in">Equipo de Liderazgo</h2>
                <p class="text-gray-600 max-w-2xl mx-auto fade-in fade-in-delay-1">Nuestro equipo de liderazgo está comprometido con la excelencia y la innovación en educación.</p>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                @foreach($leadershipTeam as $member)
                    <div class="bg-gray-50 p-8 rounded-2xl shadow-lg text-center hover-lift fade-in">
                        <img src="{{ asset($member->avatar) }}" alt="{{ $member->name }}" class="w-32 h-32 rounded-full mx-auto mb-6 object-cover">
                        <h3 class="text-2xl font-bold mb-2">{{ $member->name }}</h3>
                        <p class="text-[#FB8E6D] font-semibold mb-3">{{ $member->position }}</p>
                        <p class="text-gray-600 mb-4">{{ $member->description }}</p>
                        <div class="flex justify-center space-x-3">
                            @if($member->twitter)
                                <a href="{{ $member->twitter }}" class="text-gray-400 hover:text-[#FB8E6D] transition-all">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                                </a>
                            @endif
                            @if($member->linkedin)
                                <a href="{{ $member->linkedin }}" class="text-gray-400 hover:text-[#FB8E6D] transition-all">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Program Teams Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-black fade-in">Equipos de Programa</h2>
                <p class="text-gray-600 max-w-2xl mx-auto fade-in fade-in-delay-1">Nuestros equipos especializados trabajan en diferentes áreas para maximizar nuestro impacto.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Education Team -->
                <div class="bg-white p-6 rounded-2xl shadow-lg text-center hover-lift fade-in fade-in-delay-1">
                    <h3 class="text-xl font-bold mb-2">Equipo de Educación</h3>
                    <p class="text-gray-600 mb-4">Especialistas en desarrollo educativo y formación de maestros.</p>
                    <div class="text-sm text-gray-500">
                        <p>• {{ $educationTeam->count() }} Especialistas</p>
                        <p>• {{ $educationTeam->sum('projects') }} Proyectos Activos</p>
                        <p>• {{ $educationTeam->sum('students') }}+ Estudiantes</p>
                    </div>
                </div>

                <!-- Technology Education Team -->
                <div class="bg-white p-6 rounded-2xl shadow-lg text-center hover-lift fade-in fade-in-delay-2">
                    <h3 class="text-xl font-bold mb-2">Equipo de Tecnología Educativa</h3>
                    <p class="text-gray-600 mb-4">Expertos en herramientas digitales y plataformas de aprendizaje.</p>
                    <div class="text-sm text-gray-500">
                        <p>• {{ $technologyTeam->where('role', 'developer')->count() }} Desarrolladores</p>
                        <p>• {{ $technologyTeam->where('role', 'designer')->count() }} Diseñadores</p>
                        <p>• {{ $technologyTeam->sum('users') }}+ Usuarios</p>
                    </div>
                </div>

                <!-- Teacher Training Team -->
                <div class="bg-white p-6 rounded-2xl shadow-lg text-center hover-lift fade-in fade-in-delay-3">
                    <h3 class="text-xl font-bold mb-2">Equipo de Formación Docente</h3>
                    <p class="text-gray-600 mb-4">Especialistas en capacitación y desarrollo profesional de maestros.</p>
                    <div class="text-sm text-gray-500">
                        <p>• {{ $trainingTeam->count() }} Formadores</p>
                        <p>• {{ $trainingTeam->sum('programs') }} Programas</p>
                        <p>• {{ $trainingTeam->sum('teachers') }}+ Docentes</p>
                    </div>
                </div>

                <!-- Educational Research Team -->
                <div class="bg-white p-6 rounded-2xl shadow-lg text-center hover-lift fade-in">
                    <h3 class="text-xl font-bold mb-2">Equipo de Investigación Educativa</h3>
                    <p class="text-gray-600 mb-4">Investigadores especializados en metodologías pedagógicas.</p>
                    <div class="text-sm text-gray-500">
                        <p>• {{ $researchTeam->count() }} Investigadores</p>
                        <p>• 24/7 Disponibilidad</p>
                        <p>• {{ $researchTeam->sum('studies') }}+ Estudios</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Support Staff Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-black fade-in">Personal de Apoyo</h2>
                <p class="text-gray-600 max-w-2xl mx-auto fade-in fade-in-delay-1">Nuestro equipo de apoyo es fundamental para el éxito de nuestras operaciones diarias.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($supportTeam as $member)
                    <div class="bg-white p-6 rounded-2xl shadow-lg text-center hover-lift fade-in">
                        <div class="w-24 h-24 rounded-full mx-auto mb-4 bg-[#FB8E6D] flex items-center justify-center shadow-md">
                            <svg class="w-12 h-12 text-white" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 0L20.4721 11.5279L32 16L20.4721 20.4721L16 32L11.5279 20.4721L0 16L11.5279 11.5279L16 0Z" fill="currentColor"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold">{{ $member->name }}</h3>
                        <p class="text-gray-500">{{ $member->position }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Join Our Team Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 text-black fade-in">Únete a Nuestro Equipo</h2>
            <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto fade-in fade-in-delay-1">¿Te apasiona la educación y quieres hacer una diferencia? Únete a nuestro equipo y sé parte del cambio que queremos ver en el mundo.</p>
            <div class="flex justify-center space-x-4 fade-in fade-in-delay-2">
                <a href="{{ route('contact') }}" class="bg-[#FB8E6D] text-white px-8 py-3 rounded-full font-semibold hover:bg-[#e67e5d] transition-all hover:scale-105">Ver Oportunidades</a>
                <a href="{{ route('contact') }}" class="bg-white text-[#FB8E6D] px-8 py-3 rounded-full font-semibold border border-[#FB8E6D] hover:bg-gray-50 transition-all hover:scale-105">Contactar</a>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
    .transition-all {
        transition: all 0.3s ease-in-out;
    }
    .team-member:hover { transform: translateY(-5px); }
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
</style>
@endpush 