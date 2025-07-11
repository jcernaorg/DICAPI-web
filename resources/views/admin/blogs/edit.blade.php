@extends('admin.layouts.panel')

@section('title')
    <span class="uppercase tracking-wide font-light" style="font-family: 'Manrope', 'Montserrat', sans-serif;">EDITAR BLOG</span>
@endsection

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-sm rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-light uppercase tracking-wide text-gray-900 dark:text-white mb-2" style="font-family: 'Manrope', 'Montserrat', sans-serif;">Editar Blog: {{ $blog->title }}</h3>
        </div>
        
        <form action="{{ route('admin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Title -->
                <div class="lg:col-span-2">
                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Título <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           id="title" 
                           name="title" 
                           value="{{ old('title', $blog->title) }}"
                           class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-[#38bdf8] focus:border-[#38bdf8] hover:border-[#38bdf8] focus:shadow-[0_0_12px_2px_#38bdf8] hover:shadow-[0_0_16px_4px_#38bdf8] transition-all duration-500 @error('title') border-red-500 @enderror"
                           placeholder="Ingresa el título del blog">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Excerpt -->
                <div class="lg:col-span-2">
                    <label for="excerpt" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Resumen <span class="text-red-500">*</span>
                    </label>
                    <textarea id="excerpt" 
                              name="excerpt" 
                              rows="3"
                              class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-[#38bdf8] focus:border-[#38bdf8] hover:border-[#38bdf8] focus:shadow-[0_0_12px_2px_#38bdf8] hover:shadow-[0_0_16px_4px_#38bdf8] transition-all duration-500 @error('excerpt') border-red-500 @enderror"
                              placeholder="Escribe un breve resumen del blog">{{ old('excerpt', $blog->excerpt) }}</textarea>
                    @error('excerpt')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Featured Image -->
                <div>
                    <label for="featured_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Imagen Destacada
                    </label>
                    @if($blog->featured_image)
                        <div class="mb-4">
                            <img src="{{ Storage::url($blog->featured_image) }}" 
                                 alt="Current Featured Image" 
                                 class="w-32 h-32 object-cover rounded-lg">
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Imagen actual</p>
                        </div>
                    @endif
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-lg hover:border-[#38bdf8] transition-colors">
                        <div class="space-y-1 text-center">
                            <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 dark:text-gray-500"></i>
                            <div class="flex text-sm text-gray-600 dark:text-gray-400">
                                <label for="featured_image" class="relative cursor-pointer bg-white dark:bg-gray-900 rounded-md font-medium text-[#38bdf8] hover:text-[#0ea5e9] focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-[#38bdf8]">
                                    <span>Cambiar imagen</span>
                                    <input id="featured_image" name="featured_image" type="file" class="sr-only" accept="image/*">
                                </label>
                                <p class="pl-1">o arrastra y suelta</p>
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, GIF hasta 2MB</p>
                        </div>
                    </div>
                    @error('featured_image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Estado <span class="text-red-500">*</span>
                    </label>
                    <select id="status" 
                            name="status"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-[#38bdf8] focus:border-[#38bdf8] hover:border-[#38bdf8] focus:shadow-[0_0_12px_2px_#38bdf8] hover:shadow-[0_0_16px_4px_#38bdf8] transition-all duration-500 @error('status') border-red-500 @enderror">
                        <option value="draft" {{ old('status', $blog->status) == 'draft' ? 'selected' : '' }}>Borrador</option>
                        <option value="published" {{ old('status', $blog->status) == 'published' ? 'selected' : '' }}>Publicado</option>
                        <option value="hidden" {{ old('status', $blog->status) == 'hidden' ? 'selected' : '' }}>Oculto</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Content -->
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Contenido <span class="text-red-500">*</span>
                </label>
                <textarea id="content" 
                          name="content" 
                          rows="15"
                          class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-[#38bdf8] focus:border-[#38bdf8] hover:border-[#38bdf8] focus:shadow-[0_0_12px_2px_#38bdf8] hover:shadow-[0_0_16px_4px_#38bdf8] transition-all duration-500 @error('content') border-red-500 @enderror"
                          placeholder="Escribe el contenido completo del blog">{{ old('content', $blog->content) }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Blog Info -->
            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Información del Blog</h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                    <div>
                        <span class="text-gray-500 dark:text-gray-400">Autor:</span>
                        <span class="font-medium text-gray-900 dark:text-white">{{ $blog->user->name }}</span>
                    </div>
                    <div>
                        <span class="text-gray-500 dark:text-gray-400">Creado:</span>
                        <span class="font-medium text-gray-900 dark:text-white">{{ $blog->created_at->format('d/m/Y H:i') }}</span>
                    </div>
                    <div>
                        <span class="text-gray-500 dark:text-gray-400">Última actualización:</span>
                        <span class="font-medium text-gray-900 dark:text-white">{{ $blog->updated_at->format('d/m/Y H:i') }}</span>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                <a href="{{ route('admin.blogs.index') }}" 
                   class="px-4 py-2 text-gray-700 dark:text-gray-200 bg-gray-100 dark:bg-gray-700 transition-all duration-500 rounded-lg hover:bg-[#38bdf8] hover:text-white hover:shadow-[0_0_12px_2px_#38bdf8] focus:shadow-[0_0_12px_2px_#38bdf8] hover:border-[#38bdf8] focus:border-[#38bdf8] border border-transparent">
                    Cancelar
                </a>
                <button type="submit" 
                        class="px-6 py-2 bg-[#38bdf8] text-white transition-all duration-500 rounded-lg hover:bg-[#0ea5e9] hover:shadow-[0_0_16px_4px_#38bdf8] focus:shadow-[0_0_16px_4px_#38bdf8] hover:border-[#38bdf8] focus:border-[#38bdf8] border border-transparent">
                    <i class="fas fa-save mr-2"></i>
                    Actualizar Blog
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Preview image upload
    document.getElementById('featured_image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.createElement('img');
                preview.src = e.target.result;
                preview.className = 'mt-2 w-32 h-32 object-cover rounded-lg';
                
                const container = document.querySelector('.border-dashed');
                const existingPreview = container.querySelector('img');
                if (existingPreview) {
                    existingPreview.remove();
                }
                container.appendChild(preview);
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush 