@extends('layouts.app')

@section('content')
    <section class="bg-gray-50 py-12">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-black fade-in">Nuestra Misión</h1>
        </div>
    </section>
    <section class="py-20">
        <div class="container mx-auto px-6 max-w-3xl bg-white rounded-2xl shadow-lg p-10 fade-in fade-in-delay-1">
            <p class="text-xl text-gray-700 leading-relaxed">
                Nuestra misión es promover la inclusión y equidad en la educación en Perú, brindando acceso a recursos educativos de calidad y estrategias digitales innovadoras. Nos enfocamos en mejorar las oportunidades de aprendizaje, fomentando la formación integral de los estudiantes y asegurando que puedan aprovechar las herramientas tecnológicas para su desarrollo educativo.
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