@extends('layouts.app')

@section('title', 'Política de Privacidad - Cread ONG')

@section('description', 'Nuestra política de privacidad describe cómo manejamos y protegemos su información personal.')

@push('styles')
<style>
    .prose h2 { @apply text-2xl font-bold mb-4; }
    .prose p { @apply mb-4 text-gray-600; }
    .prose ul { @apply list-disc list-inside mb-4 text-gray-600; }
    .fade-in {
        opacity: 0;
        transform: translateY(20px);
    }
    .fade-in.animate { animation: fadeIn 0.8s ease-out forwards; }
    .fade-in-delay-1 {
        animation-delay: 0.2s;
    }
    @keyframes fadeIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endpush

@section('content')
    <!-- Main Content -->
    <main>
        <!-- Page Title -->
        <section class="bg-gray-50 py-12">
            <div class="container mx-auto px-6 text-center">
                <h1 class="text-3xl md:text-4xl font-bold text-black fade-in">Política de Privacidad</h1>
            </div>
        </section>

        <!-- Privacy Policy Content -->
        <section class="py-20">
            <div class="container mx-auto px-6 prose lg:prose-xl max-w-4xl mx-auto">
                <div class="fade-in fade-in-delay-1">
                    <h2>1. Introducción</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                    <h2>2. Información que Recopilamos</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua:</p>
                    <ul>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                        <li>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                        <li>Ut enim ad minim veniam, quis nostrud exercitation ullamco.</li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                    <h2>3. Cómo Usamos Su Información</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua:</p>
                    <ul>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                        <li>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                        <li>Ut enim ad minim veniam, quis nostrud exercitation ullamco.</li>
                        <li>Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                    </ul>

                    <h2>4. Cómo Compartimos Su Información</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                    <h2>5. Seguridad de los Datos</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                    <h2>6. Sus Derechos</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                    <h2>7. Cambios a esta Política</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                    <h2>8. Contáctenos</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fadeElements = document.querySelectorAll('.fade-in');
        fadeElements.forEach(element => {
            void element.offsetWidth;
            element.classList.add('animate');
        });
    });
</script>
@endpush 