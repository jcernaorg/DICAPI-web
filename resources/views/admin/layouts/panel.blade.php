@php
    $user = Auth::user();
@endphp
<!DOCTYPE html>
<html lang="es" x-data="{ darkMode: localStorage.getItem('adminDarkMode') === 'true' }" x-bind:class="darkMode ? 'dark' : ''" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <meta name="robots" content="noindex, nofollow">
    <link rel="canonical" href="{{ request()->fullUrl() }}">
    <meta name="keywords" content="panel, admin, CREAD, gestión, administración, blogs, usuarios, dashboard">
    <!-- Open Graph -->
    <meta property="og:title" content="Panel Admin">
    <meta property="og:description" content="Panel de administración de Cread ONG.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->fullUrl() }}">
    <meta property="og:image" content="{{ asset('assets/dicapilogo.png') }}">
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Panel Admin">
    <meta name="twitter:description" content="Panel de administración de Cread ONG.">
    <meta name="twitter:image" content="{{ asset('assets/dicapilogo.png') }}">
    <style>
        body { font-family: 'Manrope', sans-serif; }
        .sidebar-link.active {
            background: #f3f4f6;
            color: #2563eb;
        }
        .dark .sidebar-link.active {
            background: #1e293b;
            color: #38bdf8;
        }
        .sidebar-clock {
            font-family: 'Montserrat', 'Manrope', sans-serif;
            background: rgba(20, 30, 40, 0.85);
            color: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 16px 0 rgba(0,0,0,0.18);
            padding: 10px 0 6px 0;
            min-width: 0;
            text-align: center;
            margin-bottom: 18px;
        }
        .sidebar-clock .fecha {
            font-size: 0.95rem;
            font-weight: 400;
            letter-spacing: 0.5px;
            margin-bottom: 0.2rem;
        }
        .sidebar-clock .hora-row {
            display: flex;
            align-items: flex-end;
            justify-content: center;
            gap: 0.5rem;
        }
        .sidebar-clock .hora-completa {
            font-size: 2.1rem;
            font-weight: 700;
            letter-spacing: 1px;
            line-height: 1;
        }
        .sidebar-clock .ampm {
            font-size: 1rem;
            font-weight: 400;
            vertical-align: super;
            margin-bottom: 0.2rem;
            margin-left: 0.3rem;
        }
        @media (max-width: 600px) {
            .sidebar-clock .hora-completa { font-size: 1.2rem; }
            .sidebar-clock .fecha { font-size: 0.8rem; }
        }
    </style>
</head>
<body class="h-full bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
<div class="min-h-screen flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 flex flex-col py-6 px-4">
        <div class="flex items-center justify-center mb-6">
            <img src="{{ asset('assets/dicapilogo.png') }}" alt="Logo" style="height:60px;">
        </div>
        <!-- Reloj digital dentro del sidebar -->
        <div class="sidebar-clock" id="sidebar-clock">
            <div class="fecha" id="sidebar-clock-fecha">Jueves 29 de Octubre del 2015</div>
            <div class="hora-row">
                <span class="hora-completa" id="sidebar-clock-hora-completa">1:30:24</span>
                <span class="ampm" id="sidebar-clock-ampm">AM</span>
            </div>
        </div>
        <nav class="flex-1">
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-link flex items-center gap-3 px-4 py-2 transition-all duration-300 hover:opacity-80 hover:scale-105 @if(request()->routeIs('admin.dashboard')) active @endif">
                        <span class="fa fa-home"></span> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.blogs.index') }}" class="sidebar-link flex items-center gap-3 px-4 py-2 transition-all duration-300 hover:opacity-80 hover:scale-105 @if(request()->routeIs('admin.blogs.*')) active @endif">
                        <span class="fa fa-newspaper"></span> Blogs
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="sidebar-link flex items-center gap-3 px-4 py-2 transition-all duration-300 hover:opacity-80 hover:scale-105">
                        <span class="fa fa-sign-out-alt"></span> Salir
                    </a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="hidden">@csrf</form>
                </li>
            </ul>
        </nav>
        <div class="mt-10 space-y-3">
            <!-- Información del usuario -->
            <div class="flex items-center gap-2">
                <img src="{{ $user->avatar ?? asset('assets/dicapilogo.png') }}" class="h-11 w-11 rounded-full border border-gray-300 dark:border-gray-600" alt="Avatar">
                <div class="flex-1">
                    <div class="font-semibold text-base">{{ $user->name ?? 'Admin' }}</div>
                    <div class="text-sm text-gray-300 dark:text-gray-400">{{ $user->email ?? 'admin@cread.org' }}</div>
                </div>
            </div>
            
            <!-- Hora actual eliminada -->
            
        </div>
    </aside>
    <!-- Main content -->
    <main class="flex-1 p-8 overflow-y-auto">
        <h1 class="text-2xl font-bold mb-6">@yield('title', 'Panel')</h1>
        @yield('content')
    </main>
</div>
<!-- FontAwesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
<script>
    // Reloj digital para el sidebar
    function updateSidebarClock() {
        const meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        const dias = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sabado'];
        const now = new Date();
        const diaSemana = dias[now.getDay()];
        const dia = now.getDate();
        const mes = meses[now.getMonth()];
        const anio = now.getFullYear();
        const fecha = `${diaSemana} ${dia} de ${mes} del ${anio}`;
        document.getElementById('sidebar-clock-fecha').textContent = fecha;

        let horas = now.getHours();
        const minutos = now.getMinutes();
        const segundos = now.getSeconds();
        const ampm = horas >= 12 ? 'PM' : 'AM';
        horas = horas % 12;
        horas = horas ? horas : 12;
        const horaCompleta = `${horas}:${minutos.toString().padStart(2, '0')}:${segundos.toString().padStart(2, '0')}`;
        document.getElementById('sidebar-clock-hora-completa').textContent = horaCompleta;
        document.getElementById('sidebar-clock-ampm').textContent = ampm;
    }
    updateSidebarClock();
    setInterval(updateSidebarClock, 1000);

    // Eliminada la función updateTime para la hora pequeña
</script>
@stack('scripts')
</body>
</html> 