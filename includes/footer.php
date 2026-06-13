</main>

    <footer class="bg-navy text-white pt-16 pb-8 border-t-2 border-orange mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-12 pb-12 border-b border-white/10">
            
            <div class="space-y-4 text-center md:text-left">
                <h3 class="text-2xl font-bold tracking-tight">NEVADA BREEZE</h3>
                <p class="text-slate-300 text-sm max-w-md mx-auto md:mx-0">Keeping Reno and surrounding areas comfortable all year round with professional heating and air conditioning solutions.</p>
                <p class="text-orange text-xs font-semibold tracking-wider bg-white/5 inline-block px-3 py-1 rounded-full">Lic# 0094733</p>
                <div class="pt-4 space-y-2 text-slate-300 text-sm">
                    <p class="flex items-center justify-center md:justify-start gap-3"><i class="fas fa-envelope text-orange w-5 text-center"></i> sal@nevadabreezehvac.com</p>
                    <p class="flex items-center justify-center md:justify-start gap-3"><i class="fas fa-phone text-orange w-5 text-center"></i> (775) 515-4777</p>
                </div>
            </div>
            
            <div class="flex flex-col items-center justify-center space-y-6 md:items-end md:justify-start">
                <div class="text-center md:text-right">
                    <h3 class="text-xl font-bold tracking-tight mb-4">Connect With Us</h3>
                    <div class="flex space-x-4 justify-center md:justify-end">
                        <a href="#" target="_blank" class="w-10 h-10 rounded-full bg-white/10 hover:bg-orange flex items-center justify-center text-lg transition-all duration-300 hover:-translate-y-1 shadow" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" target="_blank" class="w-10 h-10 rounded-full bg-white/10 hover:bg-orange flex items-center justify-center text-lg transition-all duration-300 hover:-translate-y-1 shadow" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" target="_blank" class="w-10 h-10 rounded-full bg-white/10 hover:bg-orange flex items-center justify-center text-lg transition-all duration-300 hover:-translate-y-1 shadow" aria-label="TikTok"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
                <div class="text-center md:text-right w-full">
                    <p class="text-sm text-slate-300 mb-2">Happy with our service?</p>
                    <a href="#" target="_blank" class="inline-flex items-center gap-2 border border-orange/40 hover:border-orange bg-transparent hover:bg-orange text-orange hover:text-white px-5 py-2 rounded-xl transition-all duration-300 text-sm font-semibold shadow-sm">Leave a Review <i class="fas fa-star text-xs"></i></a>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 text-center flex flex-col items-center justify-center space-y-2">
            <p class="text-xs sm:text-sm text-slate-400 font-medium tracking-wide">&copy; <?php echo date('Y'); ?> Nevada Breeze Heating and Air. All rights reserved.</p>
            <p class="text-xs sm:text-sm text-slate-400 font-medium tracking-wide">Designed by <a href="https://renotechsystems.com" target="_blank" class="text-orange hover:underline font-bold transition-all duration-200">Reno Tech Systems</a></p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            // --- REGULA 3: CONTROLADOR INTERACTIVO NAVEGACIÓN MÓVIL ---
            const toggleBtn = document.getElementById('menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');
            const menuIcon = document.getElementById('menu-icon');
            const mobileLinks = document.querySelectorAll('.mobile-link');

            if(toggleBtn && mobileMenu) {
                toggleBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    mobileMenu.classList.toggle('hidden');
                    if(mobileMenu.classList.contains('hidden')) {
                        menuIcon.className = "fas fa-bars text-xl";
                    } else {
                        menuIcon.className = "fas fa-times text-xl";
                    }
                });

                // Cierre automático al tocar fuera del panel
                document.addEventListener('click', function(e) {
                    if(!mobileMenu.contains(e.target) && !toggleBtn.contains(e.target)) {
                        mobileMenu.classList.add('hidden');
                        menuIcon.className = "fas fa-bars text-xl";
                    }
                });

                // Cierre automático al pulsar un enlace de navegación responsiva
                mobileLinks.forEach(link => {
                    link.addEventListener('click', () => {
                        mobileMenu.classList.add('hidden');
                        menuIcon.className = "fas fa-bars text-xl";
                    });
                });
            }

            // --- REGLA 4: MOTOR DE SEGURIDAD ASÍNCRONO ANTI-BOTS ---
            const secureForm = document.getElementById('hvacForm');
            if(secureForm) {
                secureForm.addEventListener('submit', function(e) {
                    e.preventDefault();

                    // 1. Intercepción Silenciosa del Campo Trampa (Honeypot)
                    const botTrap = secureForm.querySelector('input[name="bot_trap"]').value;
                    if(botTrap.trim() !== '') {
                        console.warn('Bot detection active. Submission stopped.');
                        return; // Bloquea el envío silenciosamente
                    }

                    // 2. Control Protector contra Doble Clic (Lockout State)
                    const submitBtn = secureForm.querySelector('button[type="submit"]');
                    const originalBtnText = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<i class="fas fa-spinner animate-spin mr-2"></i> Processing...';
                    submitBtn.classList.add('cursor-not-allowed', 'opacity-75');
                    submitBtn.disabled = true;

                    // 3. Ejecución de la API Fetch Asíncrona (No reloads)
                    const formData = new FormData(secureForm);
                    
                    // Nota: Usamos el truco del filemtime de manera automática para mitigar problemas de caché en desarrollo
                    fetch('process.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if(data.status === 'success') {
                            // Ocultar formulario de forma limpia y proyectar tarjeta de éxito
                            secureForm.classList.add('hidden');
                            const successMsg = document.getElementById('success-message');
                            if(successMsg) {
                                successMsg.classList.remove('hidden');
                                successMsg.scrollIntoView({ behavior: 'smooth', block: 'center' });
                            }
                        } else {
                            alert('Error de validación: ' + (data.message || 'Inténtelo de nuevo.'));
                            // Restaurar estados en fallo de datos
                            submitBtn.innerHTML = originalBtnText;
                            submitBtn.classList.remove('cursor-not-allowed', 'opacity-75');
                            submitBtn.disabled = false;
                        }
                    })
                    .catch(error => {
                        console.error('Fetch System Error:', error);
                        alert('Fallo de red. Revisa tu conexión e intenta de nuevo.');
                        submitBtn.innerHTML = originalBtnText;
                        submitBtn.classList.remove('cursor-not-allowed', 'opacity-75');
                        submitBtn.disabled = false;
                    });
                });
            }
        });
    </script>
</body>
</html>