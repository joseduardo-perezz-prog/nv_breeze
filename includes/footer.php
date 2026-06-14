<?php
/** FOOTER GLOBAL — NAP, enlaces rápidos, redes y copyright dinámico. */
if (!isset($business)) { require_once __DIR__ . '/config.php'; }
?>
    </main>

    <footer class="site-footer">
        <div class="container">
            <div class="footer-grid">

                <!-- Marca + NAP -->
                <div class="footer-col brand-col">
                    <h3 translate="no">NEVADA <span>BREEZE</span></h3>
                    <p>Keeping Reno and surrounding areas comfortable all year round with professional, honest heating and air conditioning service.</p>
                    <span class="footer-license"><?= htmlspecialchars($business['license']) ?></span>
                    <div class="socials">
                        <?php if ($business['social']['facebook']): ?><a href="<?= htmlspecialchars($business['social']['facebook']) ?>" target="_blank" rel="noopener" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a><?php endif; ?>
                        <?php if ($business['social']['instagram']): ?><a href="<?= htmlspecialchars($business['social']['instagram']) ?>" target="_blank" rel="noopener" aria-label="Instagram"><i class="fab fa-instagram"></i></a><?php endif; ?>
                        <?php if ($business['social']['tiktok']): ?><a href="<?= htmlspecialchars($business['social']['tiktok']) ?>" target="_blank" rel="noopener" aria-label="TikTok"><i class="fab fa-tiktok"></i></a><?php endif; ?>
                        <?php if ($business['social']['google']): ?><a href="<?= htmlspecialchars($business['social']['google']) ?>" target="_blank" rel="noopener" aria-label="Google reviews"><i class="fab fa-google"></i></a><?php endif; ?>
                    </div>
                </div>

                <!-- Enlaces rápidos -->
                <div class="footer-col">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="/">Home</a></li>
                        <li><a href="/services">Services</a></li>
                        <li><a href="/projects">Projects</a></li>
                        <li><a href="/about">About Us</a></li>
                        <li><a href="/contact">Get a Quote</a></li>
                    </ul>
                </div>

                <!-- Contacto -->
                <div class="footer-col">
                    <h3>Contact</h3>
                    <ul class="footer-contact">
                        <li><i class="fas fa-map-marker-alt"></i> <span>Serving <?= htmlspecialchars($business['city']) ?>, <?= htmlspecialchars($business['state_full']) ?> &amp; surrounding areas</span></li>
                        <li><i class="fas fa-phone"></i> <a href="tel:<?= $business['phone_raw'] ?>"><?= htmlspecialchars($business['phone']) ?></a></li>
                        <li><i class="fas fa-phone"></i> <a href="tel:<?= $business['phone_alt_raw'] ?>"><?= htmlspecialchars($business['phone_alt']) ?></a></li>
                        <li><i class="fas fa-envelope"></i> <a href="mailto:<?= htmlspecialchars($business['email']) ?>"><?= htmlspecialchars($business['email']) ?></a></li>
                        <li><i class="fas fa-clock"></i> <span><?= htmlspecialchars($business['hours_human']) ?></span></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <span>&copy; <?= date('Y') ?> <?= htmlspecialchars($business['legal_name']) ?>. All rights reserved.</span>
                <span>·</span>
                <span>Designed by <a href="https://renotechsystems.com" target="_blank" rel="noopener">Reno Tech Systems</a></span>
            </div>
        </div>
    </footer>

    <script src="/assets/js/main.js?v=<?= @filemtime(__DIR__ . '/../assets/js/main.js') ?: time() ?>" defer></script>
</body>
</html>
