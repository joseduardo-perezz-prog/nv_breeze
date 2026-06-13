<?php
require_once 'includes/config.php';

$page_title       = 'Contact Nevada Breeze | Free HVAC Quote in Reno, NV';
$page_description = 'Get a free HVAC quote from Nevada Breeze in Reno, NV. Call (775) 515-4777 or request air conditioning, heating, furnace or boiler service online today.';
$active = 'contact';

/* Mensajes de validación devueltos por process-quote.php */
$error = $_GET['err'] ?? '';
$error_messages = [
    'fields'  => 'Please complete all required fields.',
    'email'   => 'Please enter a valid email address.',
    'send'    => 'Sorry, your message could not be sent. Please call us directly.',
];

include 'includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1>Get a Free Estimate</h1>
        <p>Expert HVAC Solutions in Reno, NV</p>
        <div class="breadcrumb"><a href="/">Home</a> &rsaquo; Contact</div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="contact-grid">

            <!-- Info -->
            <div class="contact-info reveal">
                <span class="eyebrow">Let's Talk Comfort</span>
                <h2>We're Here to Help</h2>
                <p>Have a question or ready to book service? Reach out and <?= htmlspecialchars($business['contact_name']) ?> will get back to you quickly with honest advice and a fair estimate.</p>

                <div class="info-list">
                    <div class="info-item">
                        <div class="ic"><i class="fas fa-phone"></i></div>
                        <div>
                            <h4>Call Us</h4>
                            <a href="tel:<?= $business['phone_raw'] ?>"><?= htmlspecialchars($business['phone']) ?></a> ·
                            <a href="tel:<?= $business['phone_alt_raw'] ?>"><?= htmlspecialchars($business['phone_alt']) ?></a>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="ic"><i class="fas fa-envelope"></i></div>
                        <div><h4>Email Us</h4><a href="mailto:<?= htmlspecialchars($business['email']) ?>"><?= htmlspecialchars($business['email']) ?></a></div>
                    </div>
                    <div class="info-item">
                        <div class="ic"><i class="fas fa-map-marker-alt"></i></div>
                        <div><h4>Service Area</h4><span>Serving <?= htmlspecialchars($business['city']) ?>, <?= htmlspecialchars($business['state_full']) ?> &amp; surrounding areas</span></div>
                    </div>
                    <div class="info-item">
                        <div class="ic"><i class="fas fa-clock"></i></div>
                        <div><h4>Hours</h4><span><?= htmlspecialchars($business['hours_human']) ?></span></div>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <div class="form-card reveal">
                <h3>Request Your Quote</h3>
                <p class="sub">Fill out the form and we'll reach out shortly.</p>

                <?php if ($error && isset($error_messages[$error])): ?>
                    <div class="alert alert-error"><i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars($error_messages[$error]) ?></div>
                <?php endif; ?>

                <form action="/process-quote.php" method="POST" id="quoteForm" novalidate>
                    <!-- Honeypot anti-spam (oculto) -->
                    <div class="hp-field" aria-hidden="true">
                        <label for="website_url">Leave this field empty</label>
                        <input type="text" name="website_url" id="website_url" tabindex="-1" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="name">Full Name *</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number *</label>
                        <input type="tel" name="phone" id="phone" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="service">Service Needed *</label>
                        <select name="service" id="service" class="form-control" required>
                            <option value="">Select a service…</option>
                            <?php foreach ($business['services'] as $s): ?>
                                <option value="<?= htmlspecialchars($s['title']) ?>"><?= htmlspecialchars($s['title']) ?></option>
                            <?php endforeach; ?>
                            <option value="Emergency Repair">Emergency Repair</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message">How Can We Help?</label>
                        <textarea name="message" id="message" rows="4" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Send Request</button>
                    <p class="form-note">We respect your privacy. Your details are never shared.</p>
                </form>
            </div>
        </div>

        <!-- Mapa -->
        <div class="map-embed reveal">
            <iframe
                title="Nevada Breeze service area map — Reno, NV"
                src="https://www.google.com/maps?q=Reno,NV&output=embed"
                loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
