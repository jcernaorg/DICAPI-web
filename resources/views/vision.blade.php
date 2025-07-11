@extends('layouts.app')

@section('content')
    <section class="bg-gray-50 py-12">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-black fade-in">Nuestra Visión</h1>
        </div>
    </section>
    <section class="py-20">
        <div class="container mx-auto px-6 max-w-3xl bg-white rounded-2xl shadow-lg p-10 fade-in fade-in-delay-1">
            <p class="text-xl text-gray-700 leading-relaxed">
                Ser una organización referente en la transformación de la educación en Perú, promoviendo el acceso equitativo a herramientas tecnológicas que impulsen el aprendizaje y el desarrollo integral de los estudiantes. Buscamos contribuir a la construcción de una sociedad más justa y preparada, a través de una educación digital inclusiva que responda a las necesidades de las futuras generaciones
            </p>
        </div>
    </section>
@endsection

@push('styles')
<style>
    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeIn 0.8s ease-out forwards;
    }
    .fade-in-delay-1 { animation-delay: 0.2s; }
    @keyframes fadeIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endpush 