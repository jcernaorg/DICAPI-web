@extends('admin.layouts.panel')

@section('title')
    <span class="uppercase tracking-wide font-light" style="font-family: 'Manrope', 'Montserrat', sans-serif;">VER BLOG</span>
@endsection

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Blog Header -->
    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow rounded-lg">
        <div class="p-6">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-3xl font-light uppercase tracking-wide text-gray-900 dark:text-white" style="font-family: 'Manrope', 'Montserrat', sans-serif;">{{ $blog->title }}</h1>
                <div class="flex items-center space-x-2">
                    @if($blog->status === 'published')
                        <span class="inline-flex px-3 py-1 text-sm font-semibold bg-[#38bdf8]/20 text-[#38bdf8] rounded-lg">Publicado</span>
                    @elseif($blog->status === 'draft')
                        <span class="inline-flex px-3 py-1 text-sm font-semibold bg-[#38bdf8]/10 text-[#38bdf8] rounded-lg">Borrador</span>
                    @else
                        <span class="inline-flex px-3 py-1 text-sm font-semibold bg-[#38bdf8]/30 text-[#38bdf8] rounded-lg">Oculto</span>
                    @endif
                </div>
            </div>
            <!-- Blog Meta -->
            <div class="flex items-center space-x-6 text-sm text-gray-500 dark:text-gray-400 mb-6">
                <div class="flex items-center">
                    <i class="fas fa-user mr-2"></i>
                    <span>{{ $blog->user->name }}</span>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-calendar mr-2"></i>
                    <span>Creado: {{ $blog->created_at->format('d/m/Y H:i') }}</span>
                </div>
                @if($blog->published_at)
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    <span>Publicado: {{ $blog->published_at->format('d/m/Y H:i') }}</span>
                </div>
                @endif
                <div class="flex items-center">
                    <i class="fas fa-edit mr-2"></i>
                    <span>Actualizado: {{ $blog->updated_at->format('d/m/Y H:i') }}</span>
                </div>
            </div>
            <!-- Featured Image -->
            @if($blog->featured_image)
            <div class="mb-6">
                <img src="{{ Storage::url($blog->featured_image) }}" 
                     alt="Featured Image" 
                     class="w-full h-64 object-cover rounded-lg">
            </div>
            @endif
            <!-- Excerpt -->
            <div class="mb-6">
                <h3 class="text-lg font-light uppercase tracking-wide text-gray-900 dark:text-white mb-2" style="font-family: 'Manrope', 'Montserrat', sans-serif;">Resumen</h3>
                <p class="text-gray-700 dark:text-gray-200 leading-relaxed">{{ $blog->excerpt }}</p>
            </div>
        </div>
    </div>
    <!-- Blog Content -->
    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow rounded-lg">
        <div class="p-6">
            <h3 class="text-lg font-light uppercase tracking-wide text-gray-900 dark:text-white mb-4" style="font-family: 'Manrope', 'Montserrat', sans-serif;">Contenido</h3>
            <div class="prose max-w-none text-gray-900 dark:text-gray-100">
                {!! nl2br(e($blog->content)) !!}
            </div>
        </div>
    </div>
    <!-- Actions -->
    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow rounded-lg">
        <div class="p-6">
            <h3 class="text-lg font-light uppercase tracking-wide text-gray-900 dark:text-white mb-4" style="font-family: 'Manrope', 'Montserrat', sans-serif;">Acciones</h3>
            <div class="flex items-center space-x-4">
                <a href="{{ route('admin.blogs.edit', $blog) }}" 
                   class="bg-[#fde047] text-gray-900 px-6 py-3 rounded-lg transition-all duration-500 hover:bg-[#facc15] hover:shadow-[0_0_16px_4px_#fde047] focus:shadow-[0_0_16px_4px_#fde047] hover:border-[#fde047] focus:border-[#fde047] border border-transparent">
                    <i class="fas fa-edit mr-2"></i>
                    Editar Blog
                </a>
                <form method="POST" action="{{ route('admin.blogs.toggle-status', $blog) }}" class="inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" 
                            class="bg-[#4ade80] text-white px-6 py-3 rounded-lg transition-all duration-500 hover:bg-[#22c55e] hover:shadow-[0_0_16px_4px_#4ade80] focus:shadow-[0_0_16px_4px_#4ade80] hover:border-[#4ade80] focus:border-[#4ade80] border border-transparent">
                        <i class="fas {{ $blog->status === 'published' ? 'fa-eye-slash' : 'fa-eye' }} mr-2"></i>
                        {{ $blog->status === 'published' ? 'Ocultar' : 'Publicar' }}
                    </button>
                </form>
                <form method="POST" action="{{ route('admin.blogs.destroy', $blog) }}" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="bg-red-600 text-white px-6 py-3 rounded-lg transition-all duration-500 hover:bg-red-700 hover:shadow-[0_0_16px_4px_#ef4444] focus:shadow-[0_0_16px_4px_#ef4444] hover:border-[#ef4444] focus:border-[#ef4444] border border-transparent"
                            onclick="return confirm('¿Estás seguro de que quieres eliminar este blog? Esta acción no se puede deshacer.')">
                        <i class="fas fa-trash mr-2"></i>
                        Eliminar Blog
                    </button>
                </form>
                <a href="{{ route('admin.blogs.index') }}" 
                   class="bg-[#38bdf8] text-white px-6 py-3 rounded-lg transition-all duration-500 hover:bg-[#0ea5e9] hover:shadow-[0_0_16px_4px_#38bdf8] focus:shadow-[0_0_16px_4px_#38bdf8] hover:border-[#38bdf8] focus:border-[#38bdf8] border border-transparent">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Volver a la Lista
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 