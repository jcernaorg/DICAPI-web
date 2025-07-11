@extends('layouts.app')

@section('content')
    <!-- Page Title -->
    <section class="bg-gray-50 py-12">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-black fade-in">Términos y Condiciones</h1>
        </div>
    </section>

    <!-- Terms and Conditions Content -->
    <section class="py-20">
        <div class="container mx-auto px-6 prose lg:prose-xl max-w-4xl mx-auto">
            <div class="fade-in fade-in-delay-1">
                <h2>1. Aceptación de los Términos</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                <h2>2. Uso del Sitio Web</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                
                <h2>3. Donaciones</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                <h2>4. Propiedad Intelectual</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                <h2>5. Enlaces a Terceros</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                <h2>6. Limitación de Responsabilidad</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                <h2>7. Ley Aplicable</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                <h2>8. Contáctenos</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
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
    .prose h2 { font-size: 1.5rem; font-weight: bold; margin-bottom: 1rem; }
    .prose p { margin-bottom: 1rem; color: #4B5563; }
    .prose ul { list-style: disc inside; margin-bottom: 1rem; color: #4B5563; }
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