<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Admin Dashboard - DICAPI</title>

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
            
            /* Forzar efectos hover para botones de acciones rápidas */
            .quick-action-button:hover {
                background-color: #f0fdf4 !important;
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06) !important;
            }
            
            .quick-action-button:hover svg {
                color: #15803d !important;
            }
            
            .quick-action-button:hover span {
                color: #15803d !important;
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
                    
                    <a href="/admin/dashboard" class="flex items-center px-6 py-3 text-white bg-blue-800 border-l-4 border-yellow-400">
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
                    
                    <a href="/admin/plantillas" class="flex items-center px-6 py-3 text-blue-100 hover:text-white hover:bg-blue-800 hover:border-l-4 hover:border-green-400 transition-all duration-200 cursor-pointer">
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
                        <h2 class="main-title">Dashboard</h2>
                    </div>
                </header>

                <!-- Page Content -->
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                    <div class="container mx-auto px-6 py-8">
                        <!-- Stats Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
                            <a href="/admin/publicaciones" class="bg-white rounded-lg shadow-sm p-8 hover:shadow-md hover:scale-105 transition-all duration-200 cursor-pointer">
                                <div class="flex items-center">
                                    <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium descriptive-text">Publicaciones</p>
                                        <p class="text-2xl font-semibold text-gray-900">{{ $publicacionesCount }}</p>
                                    </div>
                                </div>
                            </a>

                            <a href="/admin/plantillas" class="bg-white rounded-lg shadow-sm p-8 hover:shadow-md hover:scale-105 transition-all duration-200 cursor-pointer">
                                <div class="flex items-center">
                                    <div class="p-3 rounded-full bg-green-100 text-green-600">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium descriptive-text">Plantillas</p>
                                        <p class="text-2xl font-semibold text-gray-900">{{ $plantillasCount }}</p>
                                    </div>
                                </div>
                            </a>

                            <div class="bg-white rounded-lg shadow-sm p-8">
                                <div class="flex items-center">
                                    <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium descriptive-text">Última Actualización</p>
                                        <p class="text-lg font-semibold text-gray-900">{{ $lastUpdateTime }}</p>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <!-- Quick Actions -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <div class="bg-white rounded-lg shadow-sm p-8">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">Acciones Rápidas</h3>
                                <div class="space-y-3">
                                    <a href="/admin/publicaciones?showForm=true" class="flex items-center p-3 rounded-lg border border-gray-200 hover:bg-blue-50 hover:border-blue-300 hover:shadow-sm transition-all duration-200 cursor-pointer">
                                        <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        <span class="text-gray-700">Agregar Nueva Publicación</span>
                                    </a>
                                    <a href="/admin/plantillas?showForm=true" class="quick-action-button flex items-center p-3 rounded-lg border border-gray-200 transition-all duration-200 cursor-pointer">
                                        <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        <span class="text-gray-700">Agregar Nueva Plantilla</span>
                                    </a>
                                </div>
                            </div>

                            <div class="bg-white rounded-lg shadow-sm p-8">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">Actividad Reciente</h3>
                                <div class="space-y-3">
                                    @forelse($recentActivities as $activity)
                                    <div class="flex items-center text-sm text-gray-600">
                                        <div class="w-2 h-2 {{ $activity->action === 'create' ? 'bg-blue-500' : ($activity->action === 'update' ? 'bg-green-500' : 'bg-red-500') }} rounded-full mr-3"></div>
                                        {{ $activity->formatted_description }}
                                        <span class="text-xs text-gray-400 ml-2">{{ $activity->time_ago }}</span>
                                    </div>
                                    @empty
                                    <div class="text-sm text-gray-500 italic">
                                        No hay actividad reciente
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </body>
</html> 