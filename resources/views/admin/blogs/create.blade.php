@extends('admin.layouts.panel')

@section('title')
    <span class="uppercase tracking-wide font-light" style="font-family: 'Manrope', 'Montserrat', sans-serif;">CREAR BLOG</span>
@endsection

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-sm rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-light uppercase tracking-wide text-gray-900 dark:text-white mb-2" style="font-family: 'Manrope', 'Montserrat', sans-serif;">Información del Blog</h3>
        </div>
        <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Title -->
                <div class="lg:col-span-2">
                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Título <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           id="title" 
                           name="title" 
                           value="{{ old('title') }}"
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
                              placeholder="Escribe un breve resumen del blog">{{ old('excerpt') }}</textarea>
                    @error('excerpt')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Featured Image -->
                <div>
                    <label for="featured_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Imagen Destacada
                    </label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-lg hover:border-[#38bdf8] transition-colors">
                        <div class="space-y-1 text-center">
                            <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 dark:text-gray-500"></i>
                            <div class="flex text-sm text-gray-600 dark:text-gray-400">
                                <label for="featured_image" class="relative cursor-pointer bg-white dark:bg-gray-900 rounded-md font-medium text-[#38bdf8] hover:text-[#0ea5e9] focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-[#38bdf8]">
                                    <span>Subir archivo</span>
                                    <input id="featured_image" name="featured_image" type="file" class="sr-only file:bg-[#38bdf8] file:text-white file:border-0 file:rounded-lg file:px-4 file:py-2 file:transition-all file:duration-500 file:hover:bg-[#0ea5e9] file:focus:bg-[#0ea5e9]">
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
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Borrador</option>
                        <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Publicado</option>
                        <option value="hidden" {{ old('status') == 'hidden' ? 'selected' : '' }}>Oculto</option>
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
                          placeholder="Escribe el contenido completo del blog">{{ old('content') }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
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
                    Crear Blog
                </button>
            </div>
        </form>
    </div>
</div>
<!-- AI Chatbot Multimodo -->
<div id="ai-chatbot" class="fixed bottom-6 right-6 z-50">
    <!-- Chatbot Toggle Button -->
    <button id="chatbot-toggle" class="bg-[#2563eb] text-white rounded-full p-4 shadow-lg hover:bg-[#1d4ed8] transition-all duration-300 transform hover:scale-110">
        <i class="fas fa-comments text-xl"></i>
    </button>
    <!-- Chatbot Window -->
    <div id="chatbot-window" class="hidden absolute bottom-16 right-0 w-96 bg-white dark:bg-gray-900 rounded-lg shadow-xl border border-gray-200 dark:border-gray-700 scale-90 opacity-0 transition-all duration-500 origin-bottom-right">
        <!-- Header -->
        <div class="bg-[#2563eb] text-white px-4 py-3 rounded-t-lg flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <i class="fas fa-comments"></i>
                <span class="font-medium">Chatbot Multimodo</span>
            </div>
            <button id="chatbot-close" class="text-white hover:text-gray-200">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <!-- Selección de Rol como botones -->
        <div class="p-4 border-b border-gray-200 dark:border-gray-700">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Selecciona el tipo de publicación:</label>
            <div id="chatbot-role-buttons" class="flex flex-wrap gap-2">
                <button type="button" class="chatbot-role-btn px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-200 font-semibold hover:bg-[#2563eb] hover:text-white transition-colors" data-role="cientifico">Científico</button>
                <button type="button" class="chatbot-role-btn px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-200 font-semibold hover:bg-[#2563eb] hover:text-white transition-colors" data-role="noticias">Noticias</button>
                <button type="button" class="chatbot-role-btn px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-200 font-semibold hover:bg-[#2563eb] hover:text-white transition-colors" data-role="efemerides">Efemérides</button>
                <button type="button" class="chatbot-role-btn px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-200 font-semibold hover:bg-[#2563eb] hover:text-white transition-colors" data-role="opinion">Opinión</button>
            </div>
            <input type="hidden" id="chatbot-role" value="cientifico">
        </div>
        <!-- Chat Messages -->
        <div id="chat-messages" class="h-80 overflow-y-auto p-4 space-y-3 bg-gray-50 dark:bg-gray-900">
            <div class="flex items-start space-x-2">
                <div class="bg-gray-100 dark:bg-gray-800 rounded-lg px-3 py-2 max-w-xs">
                    <p class="text-sm text-gray-700 dark:text-gray-200">¡Hola! Soy tu asistente IA multimodo. Escribe el tema o pregunta y selecciona el tipo de publicación.</p>
                </div>
            </div>
        </div>
        <!-- Input Area -->
        <div class="border-t border-gray-200 dark:border-gray-700 p-4">
            <div class="flex space-x-2">
                <input type="text" id="chat-input" placeholder="Escribe un tema o pregunta..." 
                       class="flex-1 px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-[#2563eb] focus:border-transparent">
                <button id="chat-send" class="px-4 py-2 bg-[#2563eb] text-white rounded-lg hover:bg-[#1d4ed8] transition-colors">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </div>
    <div id="chatbot-loading" class="hidden flex items-center justify-center py-4">
        <svg class="animate-spin h-6 w-6 text-[#2563eb]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
        </svg>
        <span class="ml-2 text-[#2563eb]">Generando publicación...</span>
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

    // Chatbot Multimodo
    const chatbotToggle = document.getElementById('chatbot-toggle');
    const chatbotWindow = document.getElementById('chatbot-window');
    const chatbotClose = document.getElementById('chatbot-close');
    const chatMessages = document.getElementById('chat-messages');
    const chatInput = document.getElementById('chat-input');
    const chatSend = document.getElementById('chat-send');
    const chatbotRoleButtons = document.querySelectorAll('.chatbot-role-btn');
    let selectedRole = 'cientifico';
    const chatbotLoading = document.getElementById('chatbot-loading');

    function openChatbot() {
        chatbotWindow.classList.remove('hidden');
        setTimeout(() => {
            chatbotWindow.classList.add('scale-100', 'opacity-100');
            chatbotWindow.classList.remove('scale-90', 'opacity-0');
        }, 10);
    }
    function closeChatbot() {
        chatbotWindow.classList.remove('scale-100', 'opacity-100');
        chatbotWindow.classList.add('scale-90', 'opacity-0');
        setTimeout(() => {
            chatbotWindow.classList.add('hidden');
        }, 500);
    }

    chatbotToggle.addEventListener('click', () => {
        if (chatbotWindow.classList.contains('hidden')) {
            openChatbot();
        } else {
            closeChatbot();
        }
    });
    chatbotClose.addEventListener('click', closeChatbot);

    chatbotRoleButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            chatbotRoleButtons.forEach(b => b.classList.remove('bg-[#2563eb]', 'text-white', 'ring-2', 'ring-[#2563eb]'));
            this.classList.add('bg-[#2563eb]', 'text-white', 'ring-2', 'ring-[#2563eb]');
            selectedRole = this.getAttribute('data-role');
            document.getElementById('chatbot-role').value = selectedRole;
        });
    });
    // Selecciona el primero por defecto
    chatbotRoleButtons[0].classList.add('bg-[#2563eb]', 'text-white', 'ring-2', 'ring-[#2563eb]');

    function appendMessage(text, from = 'bot', error = false) {
        const msgDiv = document.createElement('div');
        msgDiv.className = 'flex items-start space-x-2 ' + (from === 'user' ? 'justify-end' : '');
        const bubble = document.createElement('div');
        bubble.className = `rounded-lg px-3 py-2 max-w-xs text-sm ${from === 'user' ? 'bg-[#2563eb] text-white' : (error ? 'bg-red-100 text-red-700' : 'bg-gray-100 text-gray-700')}`;
        bubble.innerText = text;
        msgDiv.appendChild(bubble);
        chatMessages.appendChild(msgDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    chatSend.addEventListener('click', sendChatbotMessage);
    chatInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') sendChatbotMessage();
    });

    function sendChatbotMessage() {
        const mensaje = chatInput.value.trim();
        const rol = document.getElementById('chatbot-role').value;
        if (!mensaje) return;
        appendMessage(mensaje, 'user');
        chatInput.value = '';
        chatbotLoading.classList.remove('hidden');
        fetch('/api/generate-publication', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ mensaje, rol })
        })
        .then(res => res.json().then(data => ({ status: res.status, body: data })))
        .then(res => {
            chatbotLoading.classList.add('hidden');
            if (res.status === 200 && res.body.success) {
                const pub = res.body.publicacion;
                appendMessage('¡Publicación generada y referencias válidas! El formulario ha sido rellenado automáticamente.', 'bot');
                document.getElementById('title').value = pub.titulo;
                document.getElementById('excerpt').value = pub.resumen;
                document.getElementById('content').value = pub.contenido;
            } else {
                let errorMsg = res.body.error || 'Error desconocido.';
                if (res.body.urls_invalidas) {
                    errorMsg += '\nURLs inválidas: ' + res.body.urls_invalidas.join(', ');
                }
                appendMessage(errorMsg, 'bot', true);
            }
        })
        .catch(() => {
            chatbotLoading.classList.add('hidden');
            appendMessage('Error al conectar con el servidor.', 'bot', true);
        });
    }
</script>
@endpush 