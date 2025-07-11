@extends('admin.layouts.panel')

@section('title')
    <span class="uppercase tracking-wide font-light" style="font-family: 'Manrope', 'Montserrat', sans-serif;">GESTIÓN DE BLOGS</span>
@endsection

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-light uppercase tracking-wide text-gray-900 dark:text-white" style="font-family: 'Manrope', 'Montserrat', sans-serif;">Blogs</h2>
            <p class="text-gray-600 dark:text-gray-300">Gestiona todos los blogs del sitio</p>
        </div>
        <a href="{{ route('admin.blogs.create') }}" 
           class="bg-[#38bdf8] text-white px-6 py-3 rounded-lg transition-all duration-500 hover:bg-[#0ea5e9] hover:shadow-[0_0_16px_4px_#38bdf8] focus:shadow-[0_0_16px_4px_#38bdf8] hover:border-[#38bdf8] focus:border-[#38bdf8] border border-transparent">
            <i class="fas fa-plus mr-2"></i>
            Nuevo Blog
        </a>
    </div>

    <!-- Filters -->
    <form method="GET" class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm p-6 mb-6">
        <div class="flex flex-wrap gap-4">
            <div class="flex-1 min-w-0">
                <label for="search" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Buscar</label>
                <input type="text" id="search" name="search" 
                       value="{{ request('search') }}"
                       placeholder="Buscar por título, resumen o contenido..." 
                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-[#38bdf8] focus:border-[#38bdf8] hover:border-[#38bdf8] focus:shadow-[0_0_12px_2px_#38bdf8] hover:shadow-[0_0_16px_4px_#38bdf8] transition-all duration-500">
            </div>
            <div class="w-48">
                <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Estado</label>
                <select id="status" name="status" 
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-[#38bdf8] focus:border-[#38bdf8] hover:border-[#38bdf8] focus:shadow-[0_0_12px_2px_#38bdf8] hover:shadow-[0_0_16px_4px_#38bdf8] transition-all duration-500">
                    <option value="">Todos</option>
                    <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Publicados</option>
                    <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Borradores</option>
                    <option value="hidden" {{ request('status') == 'hidden' ? 'selected' : '' }}>Ocultos</option>
                </select>
            </div>
            <div class="flex items-end">
                <button type="submit" class="px-6 py-2 bg-[#38bdf8] text-white transition-all duration-500 rounded-lg hover:bg-[#0ea5e9] hover:shadow-[0_0_16px_4px_#38bdf8] focus:shadow-[0_0_16px_4px_#38bdf8] hover:border-[#38bdf8] focus:border-[#38bdf8] border border-transparent">Filtrar</button>
            </div>
        </div>
    </form>

    <!-- Blogs Table -->
    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-sm overflow-hidden rounded-lg">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 rounded-lg">
                <thead class="bg-gray-50 dark:bg-gray-900">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Título</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Autor</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Estado</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Fecha Creación</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Fecha Publicación</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Fecha Modificación</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($blogs as $blog)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200 cursor-pointer group" onclick="window.location='{{ route('admin.blogs.show', $blog) }}'">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                @if($blog->featured_image)
                                    <img src="{{ Storage::url($blog->featured_image) }}" 
                                         alt="Featured Image" 
                                         class="w-12 h-12 rounded-lg object-cover mr-4">
                                @else
                                    <div class="w-12 h-12 bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center mr-4">
                                        <i class="fas fa-image text-gray-400 dark:text-gray-500"></i>
                                    </div>
                                @endif
                                <div>
                                    <div class="text-sm font-medium text-gray-900 dark:text-white group-hover:text-[#38bdf8] transition-all">{{ $blog->title }}</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">{{ Str::limit($blog->excerpt, 60) }}</div>
                                </div>
                            </div>
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
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            {{ $blog->published_at ? $blog->published_at->format('d/m/Y H:i') : '-' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            {{ $blog->updated_at ? $blog->updated_at->format('d/m/Y H:i') : '-' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center space-x-2 transition-all">
                                <a href="{{ route('admin.blogs.show', $blog) }}" 
                                   class="text-[#38bdf8] mr-2 transition-all action-icon-hover action-icon-view hover:opacity-80 hover:scale-105" title="Ver" onclick="event.stopPropagation();">
                                    <i class="fas fa-eye text-xl"></i>
                                </a>
                                <a href="{{ route('admin.blogs.edit', $blog) }}" 
                                   class="text-[#fde047] mr-2 transition-all action-icon-hover action-icon-edit hover:opacity-80 hover:scale-105" title="Editar" onclick="event.stopPropagation();">
                                    <i class="fas fa-edit text-xl"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.blogs.toggle-status', $blog) }}" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" 
                                            class="text-[#a78bfa] mr-2 transition-all action-icon-hover action-icon-publish hover:opacity-80 hover:scale-105" title="{{ $blog->status === 'published' ? 'Ocultar' : 'Publicar' }}" onclick="event.stopPropagation();">
                                        <i class="fas {{ $blog->status === 'published' ? 'fa-eye-slash' : 'fa-eye' }} text-xl"></i>
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('admin.blogs.destroy', $blog) }}" class="inline delete-blog-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" 
                                            class="text-[#ef4444] btn-delete-blog transition-all action-icon-hover action-icon-delete hover:opacity-80 hover:scale-105" title="Eliminar" onclick="event.stopPropagation();">
                                        <i class="fas fa-trash text-xl"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-blog text-4xl text-gray-300 dark:text-gray-600 mb-4"></i>
                                <p class="text-lg font-medium">No hay blogs creados</p>
                                <p class="text-sm">Comienza creando tu primer blog</p>
                                <a href="{{ route('admin.blogs.create') }}" 
                                   class="mt-4 bg-[#FB8E6D] text-white px-4 py-2 rounded-lg hover:bg-[#e67e5d] transition-all">
                                    Crear Blog
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($blogs->hasPages())
        <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
            {{ $blogs->links() }}
        </div>
        @endif
    </div>
</div>

<!-- Modal de confirmación para eliminar -->
<div id="deleteModal" tabindex="-1" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg max-w-md w-full p-8 text-center">
        <h3 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">¿Eliminar blog?</h3>
        <p class="mb-6 text-gray-600 dark:text-gray-300">¿Estás seguro de que quieres eliminar este blog? Esta acción no se puede deshacer.</p>
        <div class="flex justify-center gap-4">
            <button id="cancelDelete" class="px-6 py-2 rounded-lg bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600 transition-all">Cancelar</button>
            <button id="confirmDelete" class="px-6 py-2 rounded-lg bg-[#ef4444] text-white hover:bg-[#b91c1c] transition-all">Eliminar</button>
        </div>
    </div>
</div>

<!-- Modal de confirmación para publicar/ocultar -->
<div id="publishModal" tabindex="-1" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg max-w-md w-full p-8 text-center">
        <h3 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white" id="publishModalTitle">¿Cambiar estado?</h3>
        <p class="mb-6 text-gray-600 dark:text-gray-300" id="publishModalText">¿Estás seguro de que quieres cambiar el estado de este blog?</p>
        <div class="flex justify-center gap-4">
            <button id="cancelPublish" class="px-6 py-2 rounded-lg bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600 transition-all">Cancelar</button>
            <button id="confirmPublish" class="px-6 py-2 rounded-lg bg-[#2563eb] text-white hover:bg-[#1d4ed8] transition-all">Confirmar</button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let formToDelete = null;
    const modal = document.getElementById('deleteModal');
    const cancelBtn = document.getElementById('cancelDelete');
    const confirmBtn = document.getElementById('confirmDelete');

    document.querySelectorAll('.btn-delete-blog').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            formToDelete = this.closest('form');
            modal.classList.remove('hidden');
        });
    });

    cancelBtn.addEventListener('click', function() {
        modal.classList.add('hidden');
        formToDelete = null;
    });

    confirmBtn.addEventListener('click', function() {
        if (formToDelete) {
            formToDelete.submit();
        }
        modal.classList.add('hidden');
    });

    let publishFormToSubmit = null;
    const publishModal = document.getElementById('publishModal');
    const cancelPublishBtn = document.getElementById('cancelPublish');
    const confirmPublishBtn = document.getElementById('confirmPublish');
    const publishModalTitle = document.getElementById('publishModalTitle');
    const publishModalText = document.getElementById('publishModalText');

    document.querySelectorAll('.action-icon-publish').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            publishFormToSubmit = this.closest('form');
            // Cambia el texto según el estado
            const isPublished = this.title === 'Ocultar';
            publishModalTitle.textContent = isPublished ? '¿Ocultar blog?' : '¿Publicar blog?';
            publishModalText.textContent = isPublished
                ? '¿Estás seguro de que quieres ocultar este blog? No será visible para los usuarios.'
                : '¿Estás seguro de que quieres publicar este blog? Será visible para los usuarios.';
            publishModal.classList.remove('hidden');
        });
    });

    cancelPublishBtn.addEventListener('click', function() {
        publishModal.classList.add('hidden');
        publishFormToSubmit = null;
    });

    confirmPublishBtn.addEventListener('click', function() {
        if (publishFormToSubmit) {
            publishFormToSubmit.submit();
        }
        publishModal.classList.add('hidden');
    });

    // Cerrar modal con ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            modal.classList.add('hidden');
            formToDelete = null;
            publishModal.classList.add('hidden');
            publishFormToSubmit = null;
        }
    });
</script>
@endpush 