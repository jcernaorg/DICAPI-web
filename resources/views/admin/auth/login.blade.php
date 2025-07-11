<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">
    <link rel="canonical" href="{{ request()->fullUrl() }}">
    <meta name="keywords" content="panel, admin, login, acceso, CREAD, administración, blogs, usuarios, dashboard">
    <!-- Open Graph -->
    <meta property="og:title" content="Admin Login - Cread ONG">
    <meta property="og:description" content="Acceso al panel de administración de Cread ONG.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->fullUrl() }}">
    <meta property="og:image" content="{{ asset('assets/logocread1.png') }}">
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Admin Login - Cread ONG">
    <meta name="twitter:description" content="Acceso al panel de administración de Cread ONG.">
    <meta name="twitter:image" content="{{ asset('assets/logocread1.png') }}">
    <title>Admin Login - Cread ONG</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/logo.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Manrope', sans-serif;
            background-color: #FCF9F6;
            margin: 0;
            overflow: hidden;
        }
        
        /* Canvas para las partículas */
        #particles-canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 5;
            pointer-events: auto;
        }
        
        .transition-all {
            transition: all 0.3s ease-in-out;
        }
        .btn-google {
            background-color: #4285f4;
            color: white;
            transition: all 0.3s ease-in-out;
        }
        .btn-google:hover {
            background-color: #357ae8;
            transform: scale(1.02);
        }
        .login-title {
            font-family: 'Montserrat', 'Manrope', sans-serif;
            font-weight: 400;
            letter-spacing: 0.01em;
            text-transform: uppercase;
        }
        .login-subtitle {
            font-family: 'Manrope', sans-serif;
            font-weight: 300;
            letter-spacing: 0.01em;
        }
        .login-glow-box {
            transition: box-shadow 0.4s, border 0.4s;
            cursor: pointer;
        }
        .login-glow-box:hover {
            box-shadow: 0 0 32px 8px rgba(255,255,255,0.35), 0 0 8px 2px rgba(255,255,255,0.12);
            border: none;
        }
        .login-link-blue {
            color: #9CA3AF !important;
            font-weight: 500;
            transition: color 0.2s;
        }
        .login-link-blue .login-arrow {
            color: #9CA3AF !important;
            display: inline-block;
            transition: transform 0.3s, color 0.2s;
        }
        .login-link-blue:hover, .login-link-blue:hover .login-arrow, .login-link-blue:hover span {
            color: #000000 !important;
        }
        .login-link-blue:hover .login-arrow {
            transform: translateX(-12px);
        }
        
        /* Animaciones de entrada */
        .fade-in-up {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.8s ease-out forwards;
        }
        
        .fade-in-up-delay-1 {
            animation-delay: 0.2s;
        }
        
        .fade-in-up-delay-2 {
            animation-delay: 0.4s;
        }
        
        .fade-in-up-delay-3 {
            animation-delay: 0.6s;
        }
        
        .fade-in-up-delay-4 {
            animation-delay: 0.8s;
        }
        
        .fade-in-up-delay-5 {
            animation-delay: 1.0s;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Animación para el contenedor principal */
        .container-fade-in {
            opacity: 0;
            animation: containerFadeIn 1.2s ease-out forwards;
        }
        
        @keyframes containerFadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>
<body class="text-gray-800">
    <canvas id="particles-canvas"></canvas>
    <div class="fixed inset-0 z-0" style="background: radial-gradient(ellipse at center, rgba(60,60,60,0.7) 0%, rgba(0,0,0,1) 100%);"></div>
    <div class="min-h-screen flex items-center justify-center bg-transparent py-12 px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-md w-full flex flex-col items-center">
            <div class="w-full max-w-2xl flex flex-col items-center bg-white/20 backdrop-blur-md shadow-xl p-10 px-16 login-glow-box container-fade-in" style="border-radius:0; transition: box-shadow 0.3s;">
                <div class="flex justify-center mb-4 fade-in-up fade-in-up-delay-1">
                    <img src="{{ asset('assets/dicapilogo.png') }}" alt="Dicapi Logo" style="height:60px;">
                </div>
                <h2 class="text-center text-3xl login-title text-white mb-2 fade-in-up fade-in-up-delay-2">
                    PANEL DE ADMINISTRACIÓN
                </h2>
                <p class="text-center text-sm login-subtitle text-white mb-8 fade-in-up fade-in-up-delay-3">
                    Inicia sesión para acceder al panel de administración
                </p>
                <a href="{{ route('admin.auth.google') }}" 
                   class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium btn-google focus:outline-none mb-6 bg-blue-500/70 text-white fade-in-up fade-in-up-delay-4" style="border-radius:0;">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <i class="fab fa-google text-white"></i>
                    </span>
                    Continuar con Google
                </a>
                <div class="text-center w-full fade-in-up fade-in-up-delay-5">
                    <a href="{{ route('home') }}" class="login-link-blue flex items-center justify-center gap-2 transition-all group">
                        <span class="login-arrow transition-transform duration-300"> <i class="fas fa-arrow-left"></i> </span>
                        <span>Volver al sitio principal</span>
                    </a>
                </div>
            </div>
            @if(session('error'))
                <div class="p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg mt-6 w-full">
                    {{ session('error') }}
                </div>
            @endif
            @if(session('success'))
                <div id="success-message" class="p-4 mt-6 w-full bg-blue-500/40 text-white text-center font-light opacity-0" style="border-radius:0; font-family: 'Manrope', 'Montserrat', sans-serif; letter-spacing:0.5px; font-size:1.1rem;">
                    <span id="matrix-text"></span>
                </div>
                <style>
                    @keyframes fadeInSoft {
                        from { opacity: 0; transform: translateY(20px); }
                        to { opacity: 1; transform: translateY(0); }
                    }
                    #success-message.fade-in {
                        animation: fadeInSoft 1.2s cubic-bezier(0.4,0,0.2,1) forwards;
                    }
                </style>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const msg = @json(session('success'));
                        const el = document.getElementById('matrix-text');
                        const container = document.getElementById('success-message');
                        let i = 0;
                        let display = '';
                        let interval = setInterval(() => {
                            display += msg[i];
                            el.textContent = display;
                            i++;
                            if (i >= msg.length) {
                                clearInterval(interval);
                            }
                        }, 35); // velocidad matrix
                        setTimeout(() => {
                            container.classList.add('fade-in');
                            container.style.opacity = 1;
                        }, 100);
                    });
                </script>
            @endif
        </div>
    </div>

    <script>
        // Sistema de partículas tipo red con efecto imán
        class ParticleNetwork {
            constructor() {
                this.canvas = document.getElementById('particles-canvas');
                this.ctx = this.canvas.getContext('2d');
                this.particles = [];
                this.mouse = { x: 0, y: 0 };
                this.particleCount = 80;
                this.connectionDistance = 150;
                this.magnetStrength = 0.3;
                
                this.init();
                this.animate();
                this.addEventListeners();
            }
            
            init() {
                this.resize();
                
                // Crear partículas
                for (let i = 0; i < this.particleCount; i++) {
                    this.particles.push({
                        x: Math.random() * this.canvas.width,
                        y: Math.random() * this.canvas.height,
                        vx: (Math.random() - 0.5) * 0.5,
                        vy: (Math.random() - 0.5) * 0.5,
                        size: Math.random() * 2 + 1,
                        opacity: Math.random() * 0.5 + 0.2
                    });
                }
            }
            
            resize() {
                this.canvas.width = window.innerWidth;
                this.canvas.height = window.innerHeight;
            }
            
            addEventListeners() {
                window.addEventListener('resize', () => this.resize());
                
                // Eventos del mouse en el documento completo
                document.addEventListener('mousemove', (e) => {
                    this.mouse.x = e.clientX;
                    this.mouse.y = e.clientY;
                });
                
                document.addEventListener('mouseleave', () => {
                    this.mouse.x = -1000;
                    this.mouse.y = -1000;
                });
                
                // También en el canvas por si acaso
                this.canvas.addEventListener('mousemove', (e) => {
                    this.mouse.x = e.clientX;
                    this.mouse.y = e.clientY;
                });
                
                this.canvas.addEventListener('mouseleave', () => {
                    this.mouse.x = -1000;
                    this.mouse.y = -1000;
                });
            }
            
            updateParticles() {
                this.particles.forEach(particle => {
                    // Efecto imán hacia el cursor
                    const dx = this.mouse.x - particle.x;
                    const dy = this.mouse.y - particle.y;
                    const distance = Math.sqrt(dx * dx + dy * dy);
                    
                    if (distance < 200 && this.mouse.x > 0) {
                        const force = (200 - distance) / 200 * this.magnetStrength;
                        particle.vx += (dx / distance) * force * 0.15;
                        particle.vy += (dy / distance) * force * 0.15;
                    }
                    
                    // Movimiento natural de las partículas
                    particle.vx += (Math.random() - 0.5) * 0.02;
                    particle.vy += (Math.random() - 0.5) * 0.02;
                    
                    // Actualizar posición
                    particle.x += particle.vx;
                    particle.y += particle.vy;
                    
                    // Fricción
                    particle.vx *= 0.99;
                    particle.vy *= 0.99;
                    
                    // Mantener partículas en pantalla
                    if (particle.x < 0 || particle.x > this.canvas.width) {
                        particle.vx *= -0.8;
                    }
                    if (particle.y < 0 || particle.y > this.canvas.height) {
                        particle.vy *= -0.8;
                    }
                    
                    particle.x = Math.max(0, Math.min(this.canvas.width, particle.x));
                    particle.y = Math.max(0, Math.min(this.canvas.height, particle.y));
                });
            }
            
            drawConnections() {
                this.ctx.strokeStyle = 'rgba(135, 206, 235, 0.3)'; // Celeste con baja opacidad
                this.ctx.lineWidth = 1;
                
                for (let i = 0; i < this.particles.length; i++) {
                    for (let j = i + 1; j < this.particles.length; j++) {
                        const dx = this.particles[i].x - this.particles[j].x;
                        const dy = this.particles[i].y - this.particles[j].y;
                        const distance = Math.sqrt(dx * dx + dy * dy);
                        
                        if (distance < this.connectionDistance) {
                            const opacity = (this.connectionDistance - distance) / this.connectionDistance * 0.3;
                            this.ctx.strokeStyle = `rgba(135, 206, 235, ${opacity})`;
                            this.ctx.beginPath();
                            this.ctx.moveTo(this.particles[i].x, this.particles[i].y);
                            this.ctx.lineTo(this.particles[j].x, this.particles[j].y);
                            this.ctx.stroke();
                        }
                    }
                }
            }
            
            drawParticles() {
                this.particles.forEach(particle => {
                    // Efecto neon celeste
                    this.ctx.shadowColor = 'rgba(135, 206, 235, 0.8)';
                    this.ctx.shadowBlur = 8;
                    this.ctx.fillStyle = `rgba(135, 206, 235, ${particle.opacity})`;
                    this.ctx.beginPath();
                    this.ctx.arc(particle.x, particle.y, particle.size, 0, Math.PI * 2);
                    this.ctx.fill();
                    
                    // Resetear sombra
                    this.ctx.shadowBlur = 0;
                });
            }
            
            animate() {
                this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
                
                this.updateParticles();
                this.drawConnections();
                this.drawParticles();
                
                requestAnimationFrame(() => this.animate());
            }
        }
        
        // Inicializar el sistema de partículas cuando la página cargue
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                console.log('Inicializando sistema de partículas...');
                const particleSystem = new ParticleNetwork();
                console.log('Sistema de partículas inicializado:', particleSystem);
            }, 100);
        });
    </script>
</body>
</html> 