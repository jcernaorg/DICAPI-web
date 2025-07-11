@extends('admin.layouts.panel')

@section('title', 'Dashboard')

@section('content')
<h1 class="text-2xl font-light uppercase tracking-wide mb-6" style="font-family: 'Manrope', 'Montserrat', sans-serif;">@yield('title', 'Panel')</h1>
<div class="space-y-8">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-sm p-6 flex items-center rounded-lg">
            <div class="p-3 bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 rounded-lg">
                <i class="fas fa-blog text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-300">Total Blogs</p>
                <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $stats['total_blogs'] }}</p>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-sm p-6 flex items-center rounded-lg">
            <div class="p-3 rounded-lg bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-300">
                <i class="fas fa-check-circle text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-300">Publicados</p>
                <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $stats['published_blogs'] }}</p>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-sm p-6 flex items-center rounded-lg">
            <div class="p-3 rounded-lg bg-yellow-100 dark:bg-yellow-900 text-yellow-600 dark:text-yellow-300">
                <i class="fas fa-edit text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-300">Borradores</p>
                <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $stats['draft_blogs'] }}</p>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-sm p-6 flex items-center rounded-lg">
            <div class="p-3 rounded-lg bg-red-100 dark:bg-red-900 text-red-600 dark:text-red-300">
                <i class="fas fa-eye-slash text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-300">Ocultos</p>
                <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $stats['hidden_blogs'] }}</p>
            </div>
        </div>
    </div>

    <!-- Recent Blogs -->
    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-sm rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white">Blogs Recientes</h3>
            <a href="{{ route('admin.blogs.create') }}" 
               class="bg-[#38bdf8] text-white px-4 py-2 rounded-lg transition-all duration-500 hover:bg-[#0ea5e9] hover:shadow-[0_0_16px_4px_#38bdf8] focus:shadow-[0_0_16px_4px_#38bdf8] hover:border-[#38bdf8] focus:border-[#38bdf8] border border-transparent">
                <i class="fas fa-plus mr-2"></i>
                Nuevo Blog
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-900">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Título</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Autor</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Estado</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Fecha</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($recent_blogs as $blog)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $blog->title }}</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">{{ Str::limit($blog->excerpt, 50) }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 dark:text-white">{{ $blog->user->name }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($blog->status === 'published')
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-300">Publicado</span>
                            @elseif($blog->status === 'draft')
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-300">Borrador</span>
                            @else
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-300">Oculto</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            {{ $blog->created_at->format('d/m/Y H:i') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('admin.blogs.edit', $blog) }}" 
                               class="text-[#fde047] mr-3 transition-all hover:opacity-80 hover:scale-105" title="Editar">
                                <i class="fas fa-edit text-xl"></i>
                            </a>
                            <a href="{{ route('admin.blogs.show', $blog) }}" 
                               class="text-[#38bdf8] mr-3 transition-all hover:opacity-80 hover:scale-105" title="Ver">
                                <i class="fas fa-eye text-xl"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                            No hay blogs creados aún.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($recent_blogs->count() > 0)
        <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
            <a href="{{ route('admin.blogs.index') }}" 
               class="bg-[#38bdf8] text-white text-sm font-medium px-4 py-2 rounded-lg transition-all duration-500 hover:bg-[#0ea5e9] hover:shadow-[0_0_12px_2px_#38bdf8] focus:shadow-[0_0_12px_2px_#38bdf8] hover:border-[#38bdf8] focus:border-[#38bdf8] border border-transparent">
                Ver todos los blogs →
            </a>
        </div>
        @endif
    </div>
</div>
@endsection 