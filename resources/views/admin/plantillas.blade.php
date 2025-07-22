<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Gestión de Plantillas - DICAPI</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Custom Styles for Admin -->
        <style>
            body {
                font-family: 'Kumbh Sans', sans-serif;
            }
            
            .section-label {
                color: #3c72fc;
                font-size: 16px;
                font-weight: 500;
            }
            
            .main-title {
                color: #0f0d1d;
                font-size: 40px;
                font-weight: 700;
            }
            
            .descriptive-text {
                color: #585858;
                font-size: 16px;
                font-weight: 400;
            }
            
            .bg-light-blue {
                background-color: #f3f7fb;
            }
            
            .bg-dark-blue {
                background-color: #16142c;
            }
            
            .bg-gradient-blue {
                background: linear-gradient(90deg, #3c72fc -10.59%, #00060c 300.59%);
            }
            
            /* Efectos hover para botones de modales de eliminación */
            .modal-delete-button:hover {
                transform: scale(1.05) !important;
                cursor: pointer !important;
            }
            
            .modal-cancel-button:hover {
                transform: scale(1.05) !important;
                cursor: pointer !important;
            }
            
            /* Efectos hover para botones de eliminar archivos */
            .file-delete-button:hover {
                transform: scale(1.05) !important;
                cursor: pointer !important;
            }
        </style>
    </head>
    <body class="antialiased bg-gray-100 admin-page">
        <div class="flex h-screen">
            <!-- Sidebar -->
            <div class="w-64 bg-dark-blue text-white">
                <!-- Header -->
                <div class="p-6 border-b border-blue-800">
                    <div class="flex items-center justify-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        <h1 class="text-xl font-bold">Admin Panel</h1>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="mt-6">
                    <div class="px-6 py-3">
                        <h2 class="section-label uppercase tracking-wider">GESTIÓN</h2>
                    </div>
                    
                    <a href="/admin/dashboard" class="flex items-center px-6 py-3 text-blue-100 hover:text-white hover:bg-blue-800 hover:border-l-4 hover:border-blue-400 transition-all duration-200 cursor-pointer">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>
                        </svg>
                        Dashboard
                    </a>
                    
                    <a href="/admin/publicaciones" class="flex items-center px-6 py-3 text-blue-100 hover:text-white hover:bg-blue-800 hover:border-l-4 hover:border-blue-400 transition-all duration-200 cursor-pointer">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                        Publicaciones
                    </a>
                    
                    <a href="/admin/plantillas" class="flex items-center px-6 py-3 text-white bg-blue-800 border-l-4 border-yellow-400">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Plantillas
                    </a>
                </nav>

                <!-- Large DICAPI Logo -->
                <div class="flex-1 flex items-center justify-center px-6 py-8">
                    <div class="relative">
                        <img src="{{ asset('imagenes/dicapilogo.png') }}" alt="DICAPI Logo" class="w-32 h-32 opacity-50">
                    </div>
                </div>

                <!-- User Section -->
                <div class="absolute bottom-0 w-64 p-6 border-t border-blue-800">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-blue-700 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium">Administrador</p>
                                <p class="text-xs text-blue-300">admin@dicapi.gob.pe</p>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-blue-300 hover:text-white hover:bg-blue-800 p-2 rounded-lg transition-all duration-200 cursor-pointer">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="flex-1 flex flex-col overflow-hidden">
                <!-- Header -->
                <header class="bg-light-blue shadow-sm border-b border-gray-200">
                    <div class="flex items-center justify-between px-6 py-4">
                        <h2 class="main-title">Gestión de Plantillas</h2>
                        <button onclick="toggleForm()" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 hover:shadow-lg hover:scale-105 transition-all duration-200 flex items-center cursor-pointer font-medium">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Agregar Plantilla
                        </button>
                    </div>
                </header>

                <!-- Page Content -->
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                    <div class="container mx-auto px-6 py-8">
                        <!-- Success/Error Messages -->
                        @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                            {{ session('success') }}
                        </div>
                        @endif

                        @if($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                            {{ session('error') }}
                        </div>
                        @endif
                        <!-- Add Template Form -->
                        <div id="addForm" class="bg-white rounded-lg shadow-sm p-6 mb-8 {{ request('showForm') ? '' : 'hidden' }}">
                            <h3 class="text-lg font-semibold text-gray-900 mb-6">Agregar Nueva Plantilla</h3>
                            
                            <form class="space-y-6" method="POST" action="{{ route('admin.plantillas.store') }}" enctype="multipart/form-data">
                                @csrf
                                <!-- Date Field (Auto-generated) -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Fecha*
                                    </label>
                                    <input 
                                        type="text" 
                                        value="{{ date('Y-m-d') }}" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-100 text-gray-600"
                                        readonly
                                    >
                                    <p class="text-xs text-gray-500 mt-1">Fecha automática generada</p>
                                </div>

                                <!-- Title Field -->
                                <div>
                                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                        Título*
                                    </label>
                                    <input 
                                        type="text" 
                                        id="title" 
                                        name="title" 
                                        maxlength="100"
                                        placeholder="Ingrese el título de la plantilla"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200"
                                        required
                                    >
                                    <p class="text-xs text-gray-500 mt-1">Máximo 100 caracteres</p>
                                </div>

                                <!-- PDF Upload -->
                                <div>
                                    <label for="pdf" class="block text-sm font-medium text-gray-700 mb-2">
                                        Archivo PDF*
                                    </label>
                                    <div id="pdfUpload" class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-green-400 transition-colors duration-200">
                                        <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                        </svg>
                                        <input 
                                            type="file" 
                                            id="pdf" 
                                            name="pdf" 
                                            accept=".pdf"
                                            class="hidden"
                                            required
                                            onchange="handlePdfSelect(this)"
                                        >
                                        <label for="pdf" class="cursor-pointer">
                                            <span class="text-green-600 hover:text-green-700 font-medium">Seleccionar archivo</span>
                                            <span class="text-gray-500"> o arrastrar aquí</span>
                                        </label>
                                        <p class="text-xs text-gray-500 mt-2">Formato: PDF. Máximo 3MB</p>
                                    </div>
                                    <div id="pdfPreview" class="hidden mt-4">
                                        <div class="flex items-center space-x-4">
                                            <div class="w-20 h-20 bg-red-500 rounded border flex items-center justify-center">
                                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <p id="pdfFileName" class="text-sm font-medium text-gray-700"></p>
                                                <p id="pdfFileSize" class="text-xs text-gray-500"></p>
                                            </div>
                                            <button type="button" onclick="removePdf()" class="text-red-600 hover:text-red-800">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Image Upload -->
                                <div>
                                    <label for="imagen" class="block text-sm font-medium text-gray-700 mb-2">
                                        Imagen de Portada *
                                    </label>
                                    <div id="imagenUpload" class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-green-400 transition-colors duration-200">
                                        <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <input 
                                            type="file" 
                                            id="imagen" 
                                            name="imagen" 
                                            accept="image/jpeg,image/png,image/gif"
                                            class="hidden"
                                            required
                                            onchange="handleImagenSelect(this)"
                                        >
                                        <label for="imagen" class="cursor-pointer">
                                            <span class="text-green-600 hover:text-green-700 font-medium">Seleccionar imagen</span>
                                            <span class="text-gray-500"> o arrastrar aquí</span>
                                        </label>
                                        <p class="text-xs text-gray-500 mt-2">Formatos: JPG, PNG, GIF. Máximo 3MB</p>
                                    </div>
                                    <div id="imagenPreview" class="hidden mt-4">
                                        <div class="flex items-center space-x-4">
                                            <img id="imagenPreviewImg" src="" alt="Vista previa" class="w-20 h-20 object-cover rounded border">
                                            <div>
                                                <p id="imagenFileName" class="text-sm font-medium text-gray-700"></p>
                                                <p id="imagenFileSize" class="text-xs text-gray-500"></p>
                                            </div>
                                            <button type="button" onclick="removeImagen()" class="text-red-600 hover:text-red-800">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Buttons -->
                                <div class="flex justify-end space-x-4">
                                    <button 
                                        type="button" 
                                        onclick="toggleForm()"
                                        class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 hover:shadow-md transition-all duration-200 cursor-pointer font-medium"
                                    >
                                        Cancelar
                                    </button>
                                    <button 
                                        type="submit" 
                                        class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 hover:shadow-lg hover:scale-105 transition-all duration-200 cursor-pointer font-medium"
                                    >
                                        Guardar Plantilla
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Edit Template Form -->
                        <div id="editForm" class="bg-white rounded-lg shadow-sm p-6 mb-8 hidden">
                            <h3 class="text-lg font-semibold text-gray-900 mb-6">Editar Plantilla</h3>
                            
                            <form class="space-y-6" method="POST" id="editFormElement" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" id="editId" name="id">
                                
                                <!-- Code Field (Auto-generated) -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Código*
                                    </label>
                                    <input 
                                        type="text" 
                                        id="editCode" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-100 text-gray-600"
                                        readonly
                                    >
                                    <p class="text-xs text-gray-500 mt-1">Código único automático (no editable)</p>
                                </div>

                                <!-- Date Field (Auto-generated) -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Fecha*
                                    </label>
                                    <input 
                                        type="text" 
                                        id="editDate" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-100 text-gray-600"
                                        readonly
                                    >
                                    <p class="text-xs text-gray-500 mt-1">Fecha automática generada</p>
                                </div>

                                <!-- Title Field -->
                                <div>
                                    <label for="editTitle" class="block text-sm font-medium text-gray-700 mb-2">
                                        Título*
                                    </label>
                                    <input 
                                        type="text" 
                                        id="editTitle" 
                                        name="title" 
                                        maxlength="100"
                                        placeholder="Ingrese el título de la plantilla"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200"
                                        required
                                    >
                                    <p class="text-xs text-gray-500 mt-1">Máximo 100 caracteres</p>
                                </div>

                                <!-- PDF Upload -->
                                <div>
                                    <label for="editPdf" class="block text-sm font-medium text-gray-700 mb-2">
                                        Archivo PDF
                                    </label>
                                    <div id="editPdfUpload" class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-green-400 transition-colors duration-200 relative">
                                        <button type="button" onclick="closeEditPdfUpload()" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600 transition-colors duration-200 p-1 rounded-full hover:bg-gray-100">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                        <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                        </svg>
                                        <input 
                                            type="file" 
                                            id="editPdf" 
                                            name="pdf" 
                                            accept=".pdf"
                                            class="hidden"
                                            onchange="handleEditPdfSelect(this)"
                                        >
                                        <label for="editPdf" class="cursor-pointer">
                                            <span class="text-green-600 hover:text-green-700 font-medium">Seleccionar archivo</span>
                                            <span class="text-gray-500"> o arrastrar aquí</span>
                                        </label>
                                        <p class="text-xs text-gray-500 mt-2">Formato: PDF. Máximo 3MB</p>
                                    </div>
                                    <div id="editPdfPreview" class="hidden mt-4">
                                        <div class="flex items-center space-x-4">
                                            <div class="w-20 h-20 bg-red-500 rounded border flex items-center justify-center">
                                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <p id="editPdfFileName" class="text-sm font-medium text-gray-700"></p>
                                                <p id="editPdfFileSize" class="text-xs text-gray-500"></p>
                                            </div>
                                            <button type="button" onclick="removeEditPdf()" class="text-red-600 hover:text-red-800">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <!-- Current PDF Display -->
                                    <div id="editCurrentArchivo" class="hidden mt-4">
                                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                            <div class="flex items-center justify-between mb-3">
                                                <h4 class="text-sm font-medium text-gray-700">Archivo PDF actual</h4>
                                                <div class="flex space-x-2">
                                                    <button type="button" onclick="showEditPdfUpload()" class="text-green-600 hover:text-green-800 hover:bg-green-50 px-2 py-1 rounded-md transition-all duration-200 text-sm font-medium cursor-pointer">
                                                        Cambiar
                                                    </button>
                                                    <button type="button" onclick="removeCurrentArchivo()" class="file-delete-button text-red-600 hover:text-red-800 hover:bg-red-50 px-2 py-1 rounded-md transition-all duration-200 text-sm font-medium cursor-pointer">
                                                        Eliminar
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-4">
                                                <div class="w-16 h-20 bg-red-100 rounded-lg border border-red-200 flex items-center justify-center">
                                                    <svg class="w-8 h-10 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                                    </svg>
                                                </div>
                                                <div class="flex-1">
                                                    <p class="text-sm font-medium text-gray-700" id="editCurrentArchivoName"></p>
                                                    <p class="text-xs text-gray-500 mt-1">Documento PDF adjunto actual</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Image Upload -->
                                <div>
                                    <label for="editImagen" class="block text-sm font-medium text-gray-700 mb-2">
                                        Imagen de Portada
                                    </label>
                                    <div id="editImagenUpload" class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-green-400 transition-colors duration-200 relative">
                                        <button type="button" onclick="closeEditImagenUpload()" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600 transition-colors duration-200 p-1 rounded-full hover:bg-gray-100">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                        <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <input 
                                            type="file" 
                                            id="editImagen" 
                                            name="imagen" 
                                            accept="image/jpeg,image/png,image/gif"
                                            class="hidden"
                                            onchange="handleEditImagenSelect(this)"
                                        >
                                        <label for="editImagen" class="cursor-pointer">
                                            <span class="text-green-600 hover:text-green-700 font-medium">Seleccionar imagen</span>
                                            <span class="text-gray-500"> o arrastrar aquí</span>
                                        </label>
                                        <p class="text-xs text-gray-500 mt-2">Formatos: JPG, PNG, GIF. Máximo 3MB</p>
                                    </div>
                                    <div id="editImagenPreview" class="hidden mt-4">
                                        <div class="flex items-center space-x-4">
                                            <img id="editImagenPreviewImg" src="" alt="Vista previa" class="w-20 h-20 object-cover rounded border">
                                            <div>
                                                <p id="editImagenFileName" class="text-sm font-medium text-gray-700"></p>
                                                <p id="editImagenFileSize" class="text-xs text-gray-500"></p>
                                            </div>
                                            <button type="button" onclick="removeEditImagen()" class="text-red-600 hover:text-red-800">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <!-- Current Image Display -->
                                    <div id="editCurrentImagen" class="hidden mt-4">
                                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                            <div class="flex items-center justify-between mb-3">
                                                <h4 class="text-sm font-medium text-gray-700">Imagen actual</h4>
                                                <div class="flex space-x-2">
                                                    <button type="button" onclick="showEditImagenUpload()" class="text-green-600 hover:text-green-800 hover:bg-green-50 px-2 py-1 rounded-md transition-all duration-200 text-sm font-medium cursor-pointer">
                                                        Cambiar
                                                    </button>
                                                    <button type="button" onclick="removeCurrentImagen()" class="file-delete-button text-red-600 hover:text-red-800 hover:bg-red-50 px-2 py-1 rounded-md transition-all duration-200 text-sm font-medium cursor-pointer">
                                                        Eliminar
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-4">
                                                <div class="w-24 h-24 bg-white rounded-lg border border-gray-200 overflow-hidden flex items-center justify-center">
                                                    <img id="editCurrentImagenSrc" src="" alt="Imagen actual" class="w-full h-full object-cover">
                                                </div>
                                                <div class="flex-1">
                                                    <p class="text-xs text-gray-500">Imagen de portada actual</p>
                                                    <p class="text-xs text-gray-400 mt-1">Selecciona una nueva imagen para reemplazar o elimina la actual</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Buttons -->
                                <div class="flex justify-end space-x-4">
                                    <button 
                                        type="button" 
                                        onclick="toggleEditForm()"
                                        class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 hover:shadow-md transition-all duration-200 cursor-pointer font-medium"
                                    >
                                        Cancelar
                                    </button>
                                    <button 
                                        type="submit" 
                                        class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 hover:shadow-lg hover:scale-105 transition-all duration-200 cursor-pointer font-medium"
                                    >
                                        Actualizar Plantilla
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Templates List -->
                        <div class="bg-white rounded-lg shadow-sm">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-900">Plantillas Existentes</h3>
                            </div>
                            
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Código</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Título</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Imagen</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Archivo</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @forelse($plantillas as $plantilla)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-gray-900">{{ $plantilla->codigo }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $plantilla->fecha }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-900">{{ $plantilla->titulo }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if($plantilla->imagen)
                                                <div class="w-16 h-12 bg-gray-200 rounded flex items-center justify-center">
                                                    <img src="{{ asset('storage/plantillas/' . $plantilla->imagen) }}" alt="Imagen" class="w-full h-full object-cover rounded">
                                                </div>
                                                @else
                                                <div class="w-16 h-12 bg-gray-200 rounded flex items-center justify-center">
                                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                </div>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4">
                                                @if($plantilla->archivo)
                                                <div class="flex items-center justify-between">
                                                    <div class="flex items-center">
                                                        <svg class="w-5 h-5 text-red-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                                        </svg>
                                                        <span class="text-sm text-gray-600 truncate max-w-xs">{{ $plantilla->archivo }}</span>
                                                    </div>
                                                    <a href="{{ asset('storage/plantillas/' . $plantilla->archivo) }}" download="{{ $plantilla->archivo }}" class="text-green-600 hover:text-green-800 hover:bg-green-50 p-2 rounded-md transition-all duration-200 cursor-pointer flex items-center justify-center">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                                @else
                                                <div class="flex items-center">
                                                    <svg class="w-5 h-5 text-gray-400 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                    </svg>
                                                    <span class="text-sm text-gray-400">Sin archivo</span>
                                                </div>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <div class="flex space-x-3">
                                                    <button onclick="editPlantilla({{ $plantilla->id }}, '{{ addslashes($plantilla->titulo) }}', '{{ $plantilla->codigo }}', '{{ addslashes($plantilla->imagen ?? '') }}', '{{ addslashes($plantilla->archivo ?? '') }}')" class="px-3 py-1 text-blue-600 hover:text-blue-900 hover:bg-blue-50 rounded-md transition-all duration-200 cursor-pointer font-medium">Editar</button>
                                                    <button onclick="showDeletePlantillaConfirmation({{ $plantilla->id }}, '{{ addslashes($plantilla->titulo) }}')" class="px-3 py-1 text-red-600 hover:text-red-900 hover:bg-red-50 rounded-md transition-all duration-200 cursor-pointer font-medium">Eliminar</button>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                                No hay plantillas disponibles
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>

        <script>
            function toggleForm() {
                const form = document.getElementById('addForm');
                form.classList.toggle('hidden');
            }

            function handlePdfSelect(input) {
                const file = input.files[0];
                const maxSize = 3 * 1024 * 1024; // 3MB en bytes
                
                if (file) {
                    // Validar tamaño
                    if (file.size > maxSize) {
                        alert('El archivo es demasiado grande. El tamaño máximo es 3MB.');
                        input.value = '';
                        return;
                    }

                    // Validar tipo
                    const allowedTypes = ['application/pdf', 'pdf'];
                    const fileExtension = file.name.toLowerCase().split('.').pop();
                    
                    if (!allowedTypes.includes(file.type) && fileExtension !== 'pdf') {
                        alert('Solo se permiten archivos PDF.');
                        input.value = '';
                        return;
                    }

                    // Mostrar vista previa
                    document.getElementById('pdfFileName').textContent = file.name;
                    document.getElementById('pdfFileSize').textContent = formatFileSize(file.size);
                    document.getElementById('pdfPreview').classList.remove('hidden');
                    document.getElementById('pdfUpload').classList.add('hidden');
                }
            }

            function handleImagenSelect(input) {
                const file = input.files[0];
                const maxSize = 3 * 1024 * 1024; // 3MB en bytes
                
                if (file) {
                    // Validar tamaño
                    if (file.size > maxSize) {
                        alert('El archivo es demasiado grande. El tamaño máximo es 3MB.');
                        input.value = '';
                        return;
                    }

                    // Validar tipo
                    const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                    if (!allowedTypes.includes(file.type)) {
                        alert('Solo se permiten archivos JPG, PNG y GIF.');
                        input.value = '';
                        return;
                    }

                    // Mostrar vista previa
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('imagenPreviewImg').src = e.target.result;
                        document.getElementById('imagenFileName').textContent = file.name;
                        document.getElementById('imagenFileSize').textContent = formatFileSize(file.size);
                        document.getElementById('imagenPreview').classList.remove('hidden');
                        document.getElementById('imagenUpload').classList.add('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            }

            function removePdf() {
                document.getElementById('pdf').value = '';
                document.getElementById('pdfPreview').classList.add('hidden');
                document.getElementById('pdfUpload').classList.remove('hidden');
            }

            function removeImagen() {
                document.getElementById('imagen').value = '';
                document.getElementById('imagenPreview').classList.add('hidden');
                document.getElementById('imagenUpload').classList.remove('hidden');
            }

            function formatFileSize(bytes) {
                if (bytes === 0) return '0 Bytes';
                const k = 1024;
                const sizes = ['Bytes', 'KB', 'MB', 'GB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));
                return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
            }

            // Edit functions
            function editPlantilla(id, titulo, codigo, imagen, archivo) {
                // Ocultar formulario de agregar si está visible
                document.getElementById('addForm').classList.add('hidden');
                
                // Mostrar formulario de edición
                document.getElementById('editForm').classList.remove('hidden');
                
                // Configurar el formulario
                document.getElementById('editId').value = id;
                document.getElementById('editTitle').value = titulo;
                document.getElementById('editCode').value = codigo;
                document.getElementById('editDate').value = new Date().toISOString().split('T')[0];
                
                // Configurar la acción del formulario
                document.getElementById('editFormElement').action = `/admin/plantillas/${id}`;
                
                // Mostrar imagen actual si existe
                if (imagen && imagen !== '') {
                    console.log('Imagen actual:', imagen);
                    const imageSrc = `/storage/plantillas/${imagen}`;
                    console.log('URL de imagen:', imageSrc);
                    document.getElementById('editCurrentImagenSrc').src = imageSrc;
                    document.getElementById('editCurrentImagen').classList.remove('hidden');
                    document.getElementById('editImagenUpload').classList.add('hidden');
                } else {
                    document.getElementById('editCurrentImagen').classList.add('hidden');
                    document.getElementById('editImagenUpload').classList.remove('hidden');
                }
                
                // Mostrar archivo actual si existe
                if (archivo && archivo !== '') {
                    document.getElementById('editCurrentArchivoName').textContent = archivo;
                    document.getElementById('editCurrentArchivo').classList.remove('hidden');
                    document.getElementById('editPdfUpload').classList.add('hidden');
                } else {
                    document.getElementById('editCurrentArchivo').classList.add('hidden');
                    document.getElementById('editPdfUpload').classList.remove('hidden');
                }
                
                // Scroll al formulario
                document.getElementById('editForm').scrollIntoView({ behavior: 'smooth' });
            }

            function toggleEditForm() {
                const form = document.getElementById('editForm');
                form.classList.toggle('hidden');
            }

            function handleEditPdfSelect(input) {
                const file = input.files[0];
                const maxSize = 3 * 1024 * 1024; // 3MB en bytes
                
                if (file) {
                    // Validar tamaño
                    if (file.size > maxSize) {
                        alert('El archivo es demasiado grande. El tamaño máximo es 3MB.');
                        input.value = '';
                        return;
                    }

                    // Validar tipo
                    const allowedTypes = ['application/pdf', 'pdf'];
                    const fileExtension = file.name.toLowerCase().split('.').pop();
                    
                    if (!allowedTypes.includes(file.type) && fileExtension !== 'pdf') {
                        alert('Solo se permiten archivos PDF.');
                        input.value = '';
                        return;
                    }

                    // Mostrar vista previa
                    document.getElementById('editPdfFileName').textContent = file.name;
                    document.getElementById('editPdfFileSize').textContent = formatFileSize(file.size);
                    document.getElementById('editPdfPreview').classList.remove('hidden');
                    document.getElementById('editPdfUpload').classList.add('hidden');
                }
            }

            function handleEditImagenSelect(input) {
                const file = input.files[0];
                const maxSize = 3 * 1024 * 1024; // 3MB en bytes
                
                if (file) {
                    // Validar tamaño
                    if (file.size > maxSize) {
                        alert('El archivo es demasiado grande. El tamaño máximo es 3MB.');
                        input.value = '';
                        return;
                    }

                    // Validar tipo
                    const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                    if (!allowedTypes.includes(file.type)) {
                        alert('Solo se permiten archivos JPG, PNG y GIF.');
                        input.value = '';
                        return;
                    }

                    // Mostrar vista previa
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('editImagenPreviewImg').src = e.target.result;
                        document.getElementById('editImagenFileName').textContent = file.name;
                        document.getElementById('editImagenFileSize').textContent = formatFileSize(file.size);
                        document.getElementById('editImagenPreview').classList.remove('hidden');
                        document.getElementById('editImagenUpload').classList.add('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            }

            function removeEditPdf() {
                document.getElementById('editPdf').value = '';
                document.getElementById('editPdfPreview').classList.add('hidden');
                document.getElementById('editPdfUpload').classList.remove('hidden');
            }

            function removeEditImagen() {
                document.getElementById('editImagen').value = '';
                document.getElementById('editImagenPreview').classList.add('hidden');
                document.getElementById('editImagenUpload').classList.remove('hidden');
            }

            function showEditImagenUpload() {
                document.getElementById('editCurrentImagen').classList.add('hidden');
                document.getElementById('editImagenUpload').classList.remove('hidden');
            }

            function showEditPdfUpload() {
                document.getElementById('editCurrentArchivo').classList.add('hidden');
                document.getElementById('editPdfUpload').classList.remove('hidden');
            }

            function closeEditImagenUpload() {
                document.getElementById('editImagenUpload').classList.add('hidden');
                document.getElementById('editCurrentImagen').classList.remove('hidden');
                // Limpiar el input de archivo
                document.getElementById('editImagen').value = '';
            }

            function closeEditPdfUpload() {
                document.getElementById('editPdfUpload').classList.add('hidden');
                document.getElementById('editCurrentArchivo').classList.remove('hidden');
                // Limpiar el input de archivo
                document.getElementById('editPdf').value = '';
            }

            function removeCurrentImagen() {
                showDeleteFileConfirmation('imagen', 'imagen actual');
            }

            function removeCurrentArchivo() {
                showDeleteFileConfirmation('archivo', 'archivo actual');
            }

            function showDeleteFileConfirmation(fileType, fileDescription) {
                const modal = document.getElementById('deleteModal');
                const modalTitle = document.getElementById('deleteModalTitle');
                const modalMessage = document.getElementById('deleteModalMessage');
                const confirmButton = document.getElementById('deleteConfirmButton');
                
                modalTitle.textContent = 'Eliminar ' + fileDescription;
                modalMessage.textContent = `¿Estás seguro de que quieres eliminar la ${fileDescription}? Esta acción no se puede deshacer.`;
                
                confirmButton.onclick = function() {
                    if (fileType === 'imagen') {
                        document.getElementById('editCurrentImagen').classList.add('hidden');
                        document.getElementById('editImagenUpload').classList.remove('hidden');
                        // Agregar un campo hidden para indicar que se debe eliminar la imagen
                        let removeImagenField = document.getElementById('removeImagen');
                        if (!removeImagenField) {
                            removeImagenField = document.createElement('input');
                            removeImagenField.type = 'hidden';
                            removeImagenField.name = 'remove_imagen';
                            removeImagenField.id = 'removeImagen';
                            document.getElementById('editFormElement').appendChild(removeImagenField);
                        }
                        removeImagenField.value = '1';
                    } else if (fileType === 'archivo') {
                        document.getElementById('editCurrentArchivo').classList.add('hidden');
                        document.getElementById('editPdfUpload').classList.remove('hidden');
                        // Agregar un campo hidden para indicar que se debe eliminar el archivo
                        let removeArchivoField = document.getElementById('removeArchivo');
                        if (!removeArchivoField) {
                            removeArchivoField = document.createElement('input');
                            removeArchivoField.type = 'hidden';
                            removeArchivoField.name = 'remove_archivo';
                            removeArchivoField.id = 'removeArchivo';
                            document.getElementById('editFormElement').appendChild(removeArchivoField);
                        }
                        removeArchivoField.value = '1';
                    }
                    closeDeleteModal();
                };
                
                modal.classList.remove('hidden');
            }

            // Modal de confirmación personalizado para plantillas
            function showDeletePlantillaConfirmation(plantillaId, plantillaTitle) {
                const modal = document.getElementById('deleteModal');
                const modalTitle = document.getElementById('deleteModalTitle');
                const modalMessage = document.getElementById('deleteModalMessage');
                const confirmButton = document.getElementById('deleteConfirmButton');
                
                modalTitle.textContent = 'Eliminar Plantilla';
                modalMessage.textContent = `¿Estás seguro de que quieres eliminar la plantilla "${plantillaTitle}"? Esta acción no se puede deshacer.`;
                
                confirmButton.onclick = function() {
                    // Crear y enviar el formulario de eliminación
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `/admin/plantillas/${plantillaId}`;
                    
                    const csrfToken = document.createElement('input');
                    csrfToken.type = 'hidden';
                    csrfToken.name = '_token';
                    csrfToken.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    
                    const methodField = document.createElement('input');
                    methodField.type = 'hidden';
                    methodField.name = '_method';
                    methodField.value = 'DELETE';
                    
                    form.appendChild(csrfToken);
                    form.appendChild(methodField);
                    document.body.appendChild(form);
                    form.submit();
                };
                
                modal.classList.remove('hidden');
            }

            function closeDeleteModal() {
                document.getElementById('deleteModal').classList.add('hidden');
            }

            // Cerrar modal al hacer clic fuera de él
            document.addEventListener('DOMContentLoaded', function() {
                const modal = document.getElementById('deleteModal');
                
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        closeDeleteModal();
                    }
                });
            });
        </script>

        <!-- Modal de Confirmación de Eliminación -->
        <div id="deleteModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
            <div id="deleteModalContent" class="bg-white rounded-xl shadow-2xl max-w-md w-full mx-4 transform transition-all border border-gray-200 backdrop-blur-sm">
                <div class="flex items-center justify-between p-6 border-b border-gray-100">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 id="deleteModalTitle" class="text-lg font-semibold text-gray-900">Eliminar Plantilla</h3>
                        </div>
                    </div>
                    <button onclick="closeDeleteModal()" class="text-gray-400 hover:text-gray-600 transition-colors duration-200 p-1 rounded-full hover:bg-gray-100">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                
                <div class="p-6">
                    <p id="deleteModalMessage" class="text-gray-600 mb-6 leading-relaxed">¿Estás seguro de que quieres eliminar esta plantilla? Esta acción no se puede deshacer.</p>
                    
                    <div class="flex justify-center space-x-3">
                        <button onclick="closeDeleteModal()" class="modal-cancel-button px-4 py-2 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-all duration-200 font-medium hover:shadow-md">
                            Cancelar
                        </button>
                        <button id="deleteConfirmButton" class="modal-delete-button px-4 py-2 bg-red-500 text-white hover:bg-red-600 rounded-lg transition-all duration-200 font-medium hover:shadow-md">
                            Eliminar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html> 