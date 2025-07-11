@extends('layouts.app')

@section('title', 'Donaciones - Cread ONG')

@section('description', 'Haz una donación para apoyar nuestros programas y crear un impacto real en comunidades necesitadas.')

@push('styles')
<style>
    .donation-amount.selected {
        background-color: #dc2626;
        color: white;
        border-color: #dc2626;
    }
    .fade-in {
        opacity: 0;
        transform: translateY(20px);
    }
    .fade-in.animate {
        animation: fadeIn 0.8s ease-out forwards;
    }
    .fade-in-delay-1 {
        animation-delay: 0.2s;
    }
    .fade-in-delay-2 {
        animation-delay: 0.4s;
    }
    .fade-in-delay-3 {
        animation-delay: 0.6s;
    }
    @keyframes fadeIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .hover-scale {
        transition: transform 0.3s ease-in-out;
    }
    .hover-scale:hover {
        transform: scale(1.05);
    }
    .hover-lift {
        transition: all 0.3s ease-in-out;
    }
    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.07);
    }
    .navbar, nav.navbar, .navbar.bg-transparent {
        background: #fff !important;
        box-shadow: 0 2px 8px rgba(0,0,0,0.03);
    }
    .navbar-link, .navbar a, .navbar .nav-link {
        color: #222 !important;
        font-weight: 600;
        transition: color 0.2s;
    }
    .navbar-link:hover, .navbar a:hover, .navbar .nav-link:hover {
        color: #dc2626 !important;
        font-weight: 700 !important;
    }
    /* Forzar el fondo blanco del navbar siempre, sin importar scroll */
    .navbar.fixed, .navbar.sticky, .navbar.is-scrolled {
        background: #fff !important;
        box-shadow: 0 2px 8px rgba(0,0,0,0.03) !important;
    }
    .btn-donar {
        background-color: #dc2626;
        color: #fff;
        transition: all 0.3s ease-in-out;
    }
    .btn-donar:hover {
        background-color: #b91c1c;
        transform: scale(1.05);
    }
    /* Si existe un botón 'Únete a nuestra causa' con clase .btn-unete o similar, también lo actualizamos */
    .btn-unete, .btn-unete-a-causa {
        background-color: #dc2626 !important;
        color: #fff !important;
        border: none;
        transition: all 0.3s ease-in-out;
    }
    .btn-unete:hover, .btn-unete-a-causa:hover {
        background-color: #b91c1c !important;
        color: #fff !important;
    }
    @media (max-width: 768px) {
        .donation-title-fix {
            margin-top: 6rem !important;
        }
        .donation-section-fix {
            margin-top: 2rem !important;
            padding-left: 0.5rem !important;
            padding-right: 0.5rem !important;
        }
        .grid-cols-2, .md\:grid-cols-2, .lg\:grid-cols-2 {
            grid-template-columns: 1fr !important;
        }
    }
</style>
@endpush

@section('content')
    <!-- Main Content -->
    <main>
        <!-- Donation Section -->
        <section class="py-12 md:py-24 donation-section-fix">
            <div class="container mx-auto px-6">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <!-- Left Column: Information -->
                    <div class="fade-in">
                        <h1 class="text-display font-bold text-black mb-6 donation-title-fix">Tu donación marca la diferencia</h1>
                        <p class="text-body-large text-gray-600 mb-8">Con tu apoyo, podemos impulsar el acceso equitativo a la educación digital y transformar el aprendizaje en comunidades educativas de todo Perú. Tu contribución ayuda a proporcionar herramientas digitales a docentes y estudiantes, asegurando que todos tengan la oportunidad de acceder a una educación de calidad, inclusiva y adaptada a los retos del siglo XXI.</p>
                        <div class="space-y-6">
                            <div class="flex items-start fade-in-delay-1">
                                <svg class="w-6 h-6 text-[#FB8E6D] mr-4 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                <div>
                                    <h3 class="text-heading-3 font-bold">Transparencia Total</h3>
                                    <p class="text-body text-gray-600">En CREAD, nos comprometemos con la transparencia en el uso de los recursos. Cada donación es dirigida directamente a programas que capacitan a docentes y mejoran la infraestructura educativa, asegurando un impacto real en las comunidades.</p>
                                </div>
                            </div>
                            <div class="flex items-start fade-in-delay-2">
                                <svg class="w-6 h-6 text-[#FB8E6D] mr-4 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                <div>
                                    <h3 class="text-heading-3 font-bold">Impacto Directo</h3>
                                    <p class="text-body text-gray-600">Tu apoyo nos permite fortalecer la infraestructura educativa y proporcionar herramientas digitales a docentes y estudiantes, asegurando que todos tengan la oportunidad de acceder a una educación de calidad, inclusiva y adaptada a los retos del siglo XXI.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Donation Form -->
                    <div class="bg-gray-50 p-8 rounded-2xl shadow-lg hover-lift fade-in fade-in-delay-1">
                        <form id="donation-form" method="POST" action="{{ route('donations.store') }}">
                            @csrf
                            <h2 class="text-heading-2 font-bold mb-6 text-center">Haz tu Donación</h2>
                            
                            <!-- Amount Selection -->
                            <div class="mb-6">
                                <label class="block text-gray-700 font-semibold mb-3">Selecciona una cantidad</label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <button type="button" class="donation-amount text-center py-3 px-2 rounded-lg border-2 border-gray-300 hover:border-[#FB8E6D] transition-all" data-amount="10">$10</button>
                                    <button type="button" class="donation-amount text-center py-3 px-2 rounded-lg border-2 border-gray-300 hover:border-[#FB8E6D] transition-all" data-amount="25">$25</button>
                                    <button type="button" class="donation-amount text-center py-3 px-2 rounded-lg border-2 border-gray-300 hover:border-[#FB8E6D] transition-all" data-amount="50">$50</button>
                                    <button type="button" class="donation-amount text-center py-3 px-2 rounded-lg border-2 border-gray-300 hover:border-[#FB8E6D] transition-all" data-amount="100">$100</button>
                                </div>
                                <input type="number" id="custom-amount" name="custom-amount" placeholder="Otra cantidad" class="w-full mt-3 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FB8E6D]">
                            </div>

                             <!-- Personal Information -->
                            <div class="mb-6">
                                <label class="block text-gray-700 font-semibold mb-3">Información Personal</label>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <label for="firstName" class="block text-gray-600 text-sm mb-1">Nombres *</label>
                                        <input type="text" id="firstName" name="firstName" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FB8E6D]" required>
                                    </div>
                                    <div>
                                        <label for="lastName" class="block text-gray-600 text-sm mb-1">Apellidos *</label>
                                        <input type="text" id="lastName" name="lastName" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FB8E6D]" required>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <label for="phone" class="block text-gray-600 text-sm mb-1">Teléfono</label>
                                        <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FB8E6D]">
                                    </div>
                                    <div>
                                        <label for="email" class="block text-gray-600 text-sm mb-1">Email *</label>
                                        <input type="email" id="email" name="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FB8E6D]" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Payment Method (Simplified) -->
                            <div class="mb-6">
                                 <label class="block text-gray-700 font-semibold mb-2">Método de Pago</label>
                                
                                <!-- Tarjeta de Crédito/Débito -->
                                <div class="bg-white border border-gray-300 rounded-lg px-4 py-3 flex items-center justify-between mb-3">
                                    <span class="text-gray-600">Tarjeta de Crédito / Débito</span>
                                    <div class="flex space-x-2">
                                        <div class="w-8 h-5 bg-blue-600 rounded flex items-center justify-center">
                                            <span class="text-white text-xs font-bold">VISA</span>
                                        </div>
                                        <div class="w-8 h-5 bg-red-600 rounded flex items-center justify-center">
                                            <span class="text-white text-xs font-bold">MC</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Yape -->
                                <div class="bg-white border border-gray-300 rounded-lg px-4 py-3 flex items-center justify-between mb-3">
                                    <span class="text-gray-600">Yape</span>
                                    <div class="flex items-center space-x-2">
                                        <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                                            <span class="text-white text-xs font-bold">Y</span>
                                        </div>
                                        <span class="text-sm text-gray-500"></span>
                                    </div>
                                </div>

                                <!-- Plin -->
                                <div class="bg-white border border-gray-300 rounded-lg px-4 py-3 flex items-center justify-between mb-3">
                                    <span class="text-gray-600">Plin</span>
                                    <div class="flex items-center space-x-2">
                                        <div class="w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center">
                                            <span class="text-white text-xs font-bold">P</span>
                                        </div>
                                        <span class="text-sm text-gray-500"></span>
                                    </div>
                                </div>

                                <!-- Transferencia Bancaria -->
                                <div class="bg-white border border-gray-300 rounded-lg px-4 py-3 mb-3">
                                    <div class="flex items-center justify-center mb-2">
                                        <span class="text-gray-600">Transferencia Bancaria</span>
                                        <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded ml-2">Recomendado</span>
                                    </div>
                                    <div class="text-sm text-gray-600 space-y-1 text-center">
                                        <div><strong>Banco:</strong> </div>
                                        <div><strong>Cuenta Corriente:</strong> </div>
                                        <div><strong>Titular:</strong> </div>
                                        <div><strong>CCI:</strong> </div>
                                    </div>
                                </div>
                            </div>
                            
                            <button type="submit" class="w-full btn-donar px-6 py-4 rounded-full font-semibold text-lg transition-all">Donar Ahora</button>
                            
                            <p class="text-xs text-gray-500 mt-4 text-center">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                Transacción segura. Al donar, aceptas nuestros <a href="{{ route('terms-conditions') }}" class="underline text-[#FB8E6D]">Términos y Condiciones</a>.
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Thank You Message (Hidden by default) -->
        <div id="thankYouMessage" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-3xl p-8 md:p-12 max-w-md mx-4 text-center transform scale-95 opacity-0 transition-all duration-500" id="thankYouContent">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">¡Gracias por tu Donación!</h3>
                <p class="text-gray-600 mb-6">Tu generosidad hace posible que continuemos ayudando a quienes más lo necesitan. Recibirás un email de confirmación en breve.</p>
                <button onclick="closeThankYouMessage()" class="bg-[#FB8E6D] text-white px-8 py-3 rounded-full font-semibold hover:bg-[#e67e5d] transition-all">
                    Continuar
                </button>
            </div>
        </div>
    </main>

    <!-- CTA Section -->
    <!-- Bloque Únete a Nuestra Causa eliminado -->
@endsection

@push('scripts')
<script>
    const donationForm = document.getElementById('donation-form');
    const amountButtons = donationForm.querySelectorAll('.donation-amount');
    const customAmountInput = donationForm.querySelector('#custom-amount');

    amountButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Unselect all buttons
            amountButtons.forEach(btn => btn.classList.remove('selected'));
            // Select clicked button
            button.classList.add('selected');
            // Clear custom amount
            customAmountInput.value = '';
            // Set the value for the form
            customAmountInput.dataset.selectedAmount = button.dataset.amount;
        });
    });

    customAmountInput.addEventListener('input', () => {
        // Unselect all buttons when typing a custom amount
        amountButtons.forEach(btn => btn.classList.remove('selected'));
         customAmountInput.dataset.selectedAmount = '';
    });

    // Trigger fade-in animations when page loads
    document.addEventListener('DOMContentLoaded', function() {
        const fadeElements = document.querySelectorAll('.fade-in');
        fadeElements.forEach(element => {
            void element.offsetWidth;
            element.classList.add('animate');
        });
    });

    donationForm.addEventListener('submit', (e) => {
        e.preventDefault();
        
        // Validación básica - verificar que los campos requeridos no estén vacíos
        const firstName = document.getElementById('firstName').value.trim();
        const lastName = document.getElementById('lastName').value.trim();
        const email = document.getElementById('email').value.trim();
        const customAmount = document.getElementById('custom-amount').value.trim();
        const selectedAmount = customAmountInput.dataset.selectedAmount;
        
        // Verificar que al menos un campo de cantidad esté lleno
        const hasAmount = (customAmount !== '' || selectedAmount !== '');
        
        if (firstName === '' || lastName === '' || email === '' || !hasAmount) {
            alert('Por favor, completa todos los campos requeridos y selecciona una cantidad.');
            return;
        }

        // Enviar el formulario usando AJAX
        fetch(donationForm.action, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                firstName,
                lastName,
                email,
                phone: document.getElementById('phone').value.trim(),
                amount: customAmount || selectedAmount
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showThankYouMessage();
            } else {
                alert('Hubo un error al procesar tu donación. Por favor, intenta nuevamente.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Hubo un error al procesar tu donación. Por favor, intenta nuevamente.');
        });
    });

    // Función para mostrar el mensaje de agradecimiento
    function showThankYouMessage() {
        const modal = document.getElementById('thankYouMessage');
        const content = document.getElementById('thankYouContent');
        
        modal.classList.remove('hidden');
        
        // Animar la entrada
        setTimeout(() => {
            content.classList.remove('scale-95', 'opacity-0');
            content.classList.add('scale-100', 'opacity-100');
        }, 100);
    }

    // Función para cerrar el mensaje de agradecimiento
    function closeThankYouMessage() {
        const modal = document.getElementById('thankYouMessage');
        const content = document.getElementById('thankYouContent');
        
        // Animar la salida
        content.classList.remove('scale-100', 'opacity-100');
        content.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            modal.classList.add('hidden');
            // Resetear el formulario
            donationForm.reset();
            amountButtons.forEach(btn => btn.classList.remove('selected'));
            customAmountInput.dataset.selectedAmount = '';
        }, 500);
    }

    // Cerrar modal al hacer clic fuera de él
    document.getElementById('thankYouMessage').addEventListener('click', (e) => {
        if (e.target.id === 'thankYouMessage') {
            closeThankYouMessage();
        }
    });
</script>
@endpush 