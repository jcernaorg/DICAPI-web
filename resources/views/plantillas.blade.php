<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Plantillas - DICAPI</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Custom CSS for Plantillas -->
        <style>

            
            /* Estilos para el año en móviles */
            @media (max-width: 768px) {
                .text-xs.sm\:text-sm {
                    font-size: 0.625rem !important; /* 10px */
                    line-height: 0.75rem !important;
                }
            }
            
            @media (max-width: 640px) {
                .text-xs.sm\:text-sm {
                    font-size: 0.5rem !important; /* 8px */
                    line-height: 0.625rem !important;
                }
            }
        </style>
    </head>
    <body class="antialiased">
        <!-- Navbar -->
        <nav class="bg-white shadow-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('imagenes/dicapilogo.png') }}" alt="DICAPI Logo" class="w-8 h-8">
                        </div>
                    </div>
                    
                    <!-- Desktop Menu -->
                    <div class="hidden md:flex items-center space-x-4 lg:space-x-8">
                        <a href="/home" class="text-gray-800 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Inicio</a>
                        <a href="/publicaciones" class="text-gray-800 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Publicaciones</a>
                        <a href="/plantillas" class="text-gray-800 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Plantillas</a>
                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="md:hidden">
                        <button id="mobile-menu-button" class="text-gray-800 hover:text-blue-600 focus:outline-none focus:text-blue-600">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu -->
                <div id="mobile-menu" class="hidden md:hidden">
                    <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t border-gray-200">
                        <a href="/home" class="text-gray-800 hover:text-blue-600 block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200">Inicio</a>
                        <a href="/publicaciones" class="text-gray-800 hover:text-blue-600 block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200">Publicaciones</a>
                        <a href="/plantillas" class="text-gray-800 hover:text-blue-600 block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200">Plantillas</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Error Messages -->
        @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 mx-auto max-w-7xl mt-4">
            {{ session('error') }}
        </div>
        @endif



        <!-- Bottom Section -->
        <div class="">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <!-- Plantillas Section -->
                <div class="text-left mb-8 animate-fade-in animate-delay-200">
                    <h2 class="main-title animate-fade-in animate-delay-300">PLANTILLAS</h2>
                    <div class="space-y-2 animate-fade-in animate-delay-400">
                        <p class="descriptive-text text-justify">Hemos producido cantidades de plantillas, entre ellos libros, investigaciones cientificas, informes, y proyectos de ley, que registran y evidencian los avances de nuestra labor.</p>
                    </div>
                </div>

                <!-- Table Block -->
                <div class="rounded-none overflow-hidden animate-fade-in animate-delay-400">
                    <!-- Search and Filter Section Inside Table -->
                    <div class="px-6 py-4">
                        <form id="search-form" method="GET" action="{{ route('plantillas.index') }}" class="space-y-4">
                            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
                                <!-- Order Button Section -->
                                <div class="w-full lg:w-auto">
                                    <div class="relative">
                                        <button 
                                            type="button" 
                                            id="order-dropdown-button"
                                            class="bg-transparent text-gray-800 px-4 py-2 rounded-none hover:bg-gray-100 transition-colors duration-200 flex items-center gap-2"
                                        >
                                            <span id="order-button-text">Ordenar</span>
                                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </button>
                                        
                                        <!-- Dropdown Menu -->
                                        <div id="order-dropdown-menu" class="hidden absolute z-10 mt-1 w-full lg:w-48 bg-white border border-gray-200 shadow-lg">
                                            <a href="{{ request()->fullUrlWithQuery(['order' => 'desc']) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ request('order', 'desc') == 'desc' ? 'bg-gray-100' : '' }}">
                                                Más recientes
                                            </a>
                                            <a href="{{ request()->fullUrlWithQuery(['order' => 'asc']) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ request('order') == 'asc' ? 'bg-gray-100' : '' }}">
                                                Más antiguos
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Search Section -->
                                <div class="w-full lg:w-auto lg:ml-auto">
                                    <div class="relative">
                                        <input 
                                            type="text" 
                                            id="search-input"
                                            name="search" 
                                            value="{{ request('search') }}"
                                            placeholder="Buscar" 
                                            class="w-full lg:w-80 pl-4 pr-12 py-2 border-0 rounded-none focus:outline-none"
                                        >
                                        <button 
                                            type="button" 
                                            id="search-button"
                                            class="absolute right-2 top-2.5 w-5 h-5 text-gray-400 hover:text-blue-600 transition-colors duration-200 cursor-pointer"
                                        >
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Table Header -->
                    <div class="text-gray-800 px-6 py-4 border-b border-gray-300">
                        <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-2 sm:col-span-1 font-semibold text-sm sm:text-base">ID</div>
                            <div class="col-span-2 sm:col-span-2 font-semibold text-sm sm:text-base">AÑO</div>
                            <div class="col-span-8 sm:col-span-9 font-semibold text-sm sm:text-base">PLANTILLA</div>
                        </div>
                    </div>

                    <!-- Table Body -->
                    <div id="table-body">
                        @forelse($plantillas as $plantilla)
                        <div class="px-6 py-4 transition-colors duration-200 border-b border-gray-200">
                            <div class="grid grid-cols-12 gap-4">
                                <div class="col-span-2 sm:col-span-1">
                                    <div class="text-xs sm:text-sm font-mono text-gray-600">{{ $plantilla->codigo }}</div>
                                </div>
                                <div class="col-span-2 sm:col-span-2">
                                    <div class="text-xs sm:text-sm text-gray-500">
                                        <span class="text-xs sm:text-sm">{{ date('d/m/Y', strtotime($plantilla->fecha)) }}</span>
                                    </div>
                                </div>
                                <div class="col-span-8 sm:col-span-9">
                                    <div class="text-gray-800 font-medium text-sm sm:text-base">
                                        <a href="{{ route('plantillas.show', $plantilla->id) }}" class="hover:text-blue-600 transition-colors duration-200">{{ $plantilla->titulo }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="px-6 py-8 text-center text-gray-500">
                            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <p class="text-lg font-medium">No se encontraron plantillas</p>
                            <p class="text-sm text-gray-400 mt-2">Intenta ajustar los filtros de búsqueda</p>
                        </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="px-6 py-4">
                        <div class="flex flex-col items-center space-y-4">
                            <!-- Pagination Controls -->
                            <div class="flex items-center space-x-3">
                                <!-- Previous Button -->
                                @if($plantillas->onFirstPage())
                                    <button disabled class="bg-blue-600 text-white px-4 py-2 rounded-none cursor-not-allowed opacity-50">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                        </svg>
                                    </button>
                                @else
                                    <a href="{{ $plantillas->previousPageUrl() }}" class="bg-blue-600 text-white px-4 py-2 rounded-none hover:bg-blue-700 transition-colors duration-200">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                        </svg>
                                    </a>
                                @endif

                                <!-- Page Number -->
                                <div class="bg-blue-600 text-white px-4 py-2 rounded-none font-medium text-lg">
                                    {{ $plantillas->currentPage() }}
                                </div>

                                <!-- Next Button -->
                                @if($plantillas->hasMorePages())
                                    <a href="{{ $plantillas->nextPageUrl() }}" class="bg-blue-600 text-white px-4 py-2 rounded-none hover:bg-blue-700 transition-colors duration-200">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                @else
                                    <button disabled class="bg-blue-600 text-white px-4 py-2 rounded-none cursor-not-allowed opacity-50">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </button>
                                @endif
                            </div>
                            
                            <!-- Page Info -->
                            <div class="text-center space-y-1">
                                <div class="text-sm text-blue-600">
                                    Página {{ $plantillas->currentPage() }} de {{ $plantillas->lastPage() }}
                                </div>
                                <div class="text-sm text-blue-600">
                                    @if(request('search') || request('year') || request('month'))
                                        Se encontraron {{ $plantillas->total() }} resultado(s)
                                        @if(request('search'))
                                            para "{{ request('search') }}"
                                        @endif
                                    @else
                                        Se encontraron {{ $plantillas->total() }} resultado(s)
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                </div>
            </div>
        </div>

        <!-- Espacio adicional al final de la página -->
        <div class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Espacio en blanco para mejor espaciado -->
            </div>
        </div>

        <!-- Mobile Menu JavaScript -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const mobileMenuButton = document.getElementById('mobile-menu-button');
                const mobileMenu = document.getElementById('mobile-menu');
                
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
                
                // Close menu when clicking outside
                document.addEventListener('click', function(event) {
                    if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                        mobileMenu.classList.add('hidden');
                    }
                });

                // Order dropdown functionality
                const orderDropdownButton = document.getElementById('order-dropdown-button');
                const orderDropdownMenu = document.getElementById('order-dropdown-menu');
                const orderButtonText = document.getElementById('order-button-text');

                if (orderDropdownButton && orderDropdownMenu) {
                    orderDropdownButton.addEventListener('click', function(e) {
                        e.stopPropagation();
                        orderDropdownMenu.classList.toggle('hidden');
                    });

                    // Close dropdown when clicking outside
                    document.addEventListener('click', function(event) {
                        if (!orderDropdownButton.contains(event.target) && !orderDropdownMenu.contains(event.target)) {
                            orderDropdownMenu.classList.add('hidden');
                        }
                    });

                    // Keep button text as "Ordenar" (like in publicaciones)
                    orderButtonText.textContent = 'Ordenar';
                }

                // Search functionality
                const searchInput = document.getElementById('search-input');
                const searchButton = document.getElementById('search-button');


            });
        </script>

        <!-- AJAX Script for Search -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchForm = document.getElementById('search-form');
                const searchInput = document.getElementById('search-input');
                const searchButton = document.getElementById('search-button');
                const tableBody = document.getElementById('table-body');
                let searchTimeout;

                // Prevenir el envío del formulario
                searchForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    performSearch();
                });

                // Función para realizar búsqueda AJAX
                function performSearch() {
                    const searchTerm = searchInput.value;
                    const currentUrl = new URL(window.location);
                    currentUrl.searchParams.set('search', searchTerm);
                    
                    // Mostrar indicador de carga
                    tableBody.innerHTML = '<div class="px-6 py-8 text-center text-gray-500"><div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600 mx-auto"></div><p class="mt-2">Buscando...</p></div>';
                    
                    fetch(currentUrl.toString(), {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.text())
                    .then(html => {
                        // Crear un elemento temporal para extraer solo la tabla
                        const tempDiv = document.createElement('div');
                        tempDiv.innerHTML = html;
                        
                        // Extraer solo el contenido de la tabla
                        const newTableBody = tempDiv.querySelector('#table-body');
                        if (newTableBody) {
                            tableBody.innerHTML = newTableBody.innerHTML;
                        }
                    })
                    .catch(error => {
                        console.error('Error en la búsqueda:', error);
                        tableBody.innerHTML = '<div class="px-6 py-8 text-center text-gray-500"><p class="text-lg font-medium">Error en la búsqueda</p></div>';
                    });
                }

                // Búsqueda al hacer clic en el botón
                searchButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    performSearch();
                });

                // Búsqueda al presionar Enter
                searchInput.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        performSearch();
                    }
                });
            });
        </script>
    </body>
</html> 