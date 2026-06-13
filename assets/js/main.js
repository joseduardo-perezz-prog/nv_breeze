/* =====================================================================
   NEVADA BREEZE — JavaScript vanilla (sin librerías)
   Hero slider · Nav móvil accesible · Dropdown · Reveal on scroll
   ===================================================================== */
(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {

        /* -------------------------------------------------------------
         * 1. NAVEGACIÓN MÓVIL ACCESIBLE
         * ----------------------------------------------------------- */
        var toggle   = document.querySelector('.nav-toggle');
        var menu     = document.getElementById('nav-menu');
        var backdrop = document.querySelector('.nav-backdrop');

        function closeMenu() {
            if (!menu) return;
            menu.classList.remove('is-open');
            if (backdrop) backdrop.classList.remove('is-open');
            document.body.classList.remove('nav-locked');
            if (toggle) toggle.setAttribute('aria-expanded', 'false');
        }
        function openMenu() {
            menu.classList.add('is-open');
            if (backdrop) backdrop.classList.add('is-open');
            document.body.classList.add('nav-locked');
            toggle.setAttribute('aria-expanded', 'true');
        }

        if (toggle && menu) {
            toggle.addEventListener('click', function () {
                if (menu.classList.contains('is-open')) closeMenu();
                else openMenu();
            });
            if (backdrop) backdrop.addEventListener('click', closeMenu);
            menu.querySelectorAll('a').forEach(function (link) {
                link.addEventListener('click', function () {
                    // No cerrar si es el toggle de un dropdown en móvil
                    if (!link.classList.contains('dropdown-toggle')) closeMenu();
                });
            });
            // Cerrar con tecla Escape
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') closeMenu();
            });
        }

        /* Dropdown en móvil: expandir/colapsar con click en el padre */
        document.querySelectorAll('.has-dropdown > .dropdown-toggle').forEach(function (t) {
            t.addEventListener('click', function (e) {
                if (window.innerWidth < 900) {
                    e.preventDefault();
                    t.parentElement.classList.toggle('is-expanded');
                }
            });
        });

        /* -------------------------------------------------------------
         * 2. HERO SLIDER (auto-rotación + dots)
         * ----------------------------------------------------------- */
        var slides   = document.querySelectorAll('.hero-slide');
        var contents = document.querySelectorAll('.hero-content');
        var dots     = document.querySelectorAll('.hero-dots button');

        if (slides.length > 1) {
            var current = 0;
            var timer   = null;
            var DELAY   = 6000;

            function goTo(i) {
                slides[current].classList.remove('is-active');
                if (contents[current]) contents[current].classList.remove('is-active');
                if (dots[current]) dots[current].classList.remove('is-active');

                current = (i + slides.length) % slides.length;

                slides[current].classList.add('is-active');
                if (contents[current]) contents[current].classList.add('is-active');
                if (dots[current]) dots[current].classList.add('is-active');
            }
            function next() { goTo(current + 1); }
            function start() { timer = setInterval(next, DELAY); }
            function reset() { clearInterval(timer); start(); }

            dots.forEach(function (dot, i) {
                dot.addEventListener('click', function () { goTo(i); reset(); });
            });
            start();
        }

        /* -------------------------------------------------------------
         * 3. REVEAL ON SCROLL (animaciones sutiles)
         * ----------------------------------------------------------- */
        var reveals = document.querySelectorAll('.reveal');
        if ('IntersectionObserver' in window && reveals.length) {
            var io = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        io.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.12 });
            reveals.forEach(function (el) { io.observe(el); });
        } else {
            reveals.forEach(function (el) { el.classList.add('is-visible'); });
        }

        /* -------------------------------------------------------------
         * 4. FORMULARIO — anti doble-envío (honeypot va en servidor)
         * ----------------------------------------------------------- */
        var form = document.getElementById('quoteForm');
        if (form) {
            form.addEventListener('submit', function () {
                var btn = form.querySelector('button[type="submit"]');
                if (btn) {
                    btn.dataset.label = btn.innerHTML;
                    btn.innerHTML = 'Sending…';
                    btn.disabled = true;
                    btn.style.opacity = '0.75';
                }
            });
        }
    });
})();
