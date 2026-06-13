<?php
require_once 'includes/config.php';

$page_title       = SITE_NAME . ' | Heating & Air Conditioning in Reno, NV';
$page_description = 'Professional HVAC in Reno, NV. AC installation & repair, heating & furnace service, ductless mini-splits, boilers and maintenance. Licensed & insured — free estimates from Nevada Breeze.';
$active = 'home';

include 'includes/header.php';
?>

<!-- ============ HERO SLIDER ============ -->
<section class="hero" aria-label="Welcome">
    <div class="hero-slides">
        <div class="hero-slide is-active" style="background-image:url('https://images.unsplash.com/photo-1581094288338-2314dddb7ece?q=80&w=1920&auto=format&fit=crop');"></div>
        <div class="hero-slide" style="background-image:url('https://images.unsplash.com/photo-1635348729202-eaad9c3f6e6a?q=80&w=1920&auto=format&fit=crop');"></div>
        <div class="hero-slide" style="background-image:url('https://images.unsplash.com/photo-1621905251918-48416bd8575a?q=80&w=1920&auto=format&fit=crop');"></div>
    </div>

    <div class="container">
        <div class="hero-inner">
            <!-- Slide 1: contiene el unico encabezado principal de la pagina -->
            <div class="hero-content is-active">
                <span class="eyebrow">Professional HVAC Services · Reno, NV</span>
                <h1>Ultimate Climate Control For <span class="accent">Your Home</span></h1>
                <p>From high-efficiency AC installs to emergency heating repairs — we bring comfort, efficiency and reliability to every Nevada home.</p>
                <div class="hero-actions">
                    <a href="/contact" class="btn btn-primary btn-lg">Get a Free Quote</a>
                    <a href="/services" class="btn btn-outline btn-lg">Explore Services</a>
                </div>
            </div>
            <!-- Slide 2 (NO es h1) -->
            <div class="hero-content">
                <span class="eyebrow">Stay Cool All Summer</span>
                <p class="hero-heading">High-Efficiency <span class="accent">Air Conditioning</span></p>
                <p>Expert AC installation, repair and tune-ups designed to beat the Nevada heat while lowering your energy bills.</p>
                <div class="hero-actions">
                    <a href="/services#air-conditioning" class="btn btn-primary btn-lg">Cooling Services</a>
                    <a href="tel:<?= $business['phone_raw'] ?>" class="btn btn-outline btn-lg"><i class="fas fa-phone"></i> <?= htmlspecialchars($business['phone']) ?></a>
                </div>
            </div>
            <!-- Slide 3 (NO es h1) -->
            <div class="hero-content">
                <span class="eyebrow">Warm &amp; Worry-Free Winters</span>
                <p class="hero-heading">Heating &amp; <span class="accent">Furnace Experts</span></p>
                <p>Reliable furnace and boiler service to keep your family warm when temperatures drop across Northern Nevada.</p>
                <div class="hero-actions">
                    <a href="/services#heating-furnace" class="btn btn-primary btn-lg">Heating Services</a>
                    <a href="/contact" class="btn btn-outline btn-lg">Book a Tune-Up</a>
                </div>
            </div>
        </div>
    </div>

    <div class="hero-dots" role="tablist" aria-label="Slides">
        <button class="is-active" aria-label="Slide 1"></button>
        <button aria-label="Slide 2"></button>
        <button aria-label="Slide 3"></button>
    </div>
</section>

<!-- ============ TRUST STRIP ============ -->
<section class="trust">
    <div class="container">
        <div class="trust-item"><i class="fas fa-shield-alt"></i><div><strong>Licensed &amp; Insured</strong><span><?= htmlspecialchars($business['license']) ?></span></div></div>
        <div class="trust-item"><i class="fas fa-bolt"></i><div><strong>Fast Response</strong><span>Same-day service available</span></div></div>
        <div class="trust-item"><i class="fas fa-hand-holding-usd"></i><div><strong>Honest Pricing</strong><span>No hidden fees, ever</span></div></div>
        <div class="trust-item"><i class="fas fa-star"></i><div><strong>5-Star Service</strong><span>Trusted across Reno</span></div></div>
    </div>
</section>

<!-- ============ SERVICE FEE BAND ============ -->
<?php include 'includes/fee-band.php'; ?>

<!-- ============ SERVICES ============ -->
<section class="section">
    <div class="container">
        <div class="section-head reveal">
            <span class="eyebrow">What We Do</span>
            <h2>Three Ways We Keep You Comfortable</h2>
            <div class="rule"></div>
            <p>Full-service heating and cooling tailored to keep your home efficient, safe and comfortable in every season.</p>
        </div>

        <div class="grid grid-3">
            <?php foreach ($business['services'] as $s): ?>
                <article class="service-card reveal">
                    <div class="service-icon"><i class="fas fa-<?= htmlspecialchars($s['icon']) ?>"></i></div>
                    <h3><?= htmlspecialchars($s['title']) ?></h3>
                    <p><?= htmlspecialchars($s['short']) ?></p>
                    <a href="/services#<?= htmlspecialchars($s['slug']) ?>" class="service-link">Explore <i class="fas fa-arrow-right"></i></a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============ WHY CHOOSE US ============ -->
<section class="section section-cream">
    <div class="container">
        <div class="split">
            <div class="reveal">
                <span class="eyebrow">Uncompromised Quality</span>
                <h2>Why Homeowners Choose Nevada Breeze</h2>
                <p>We don't just patch up broken machinery — we deliver sustainable peace of mind. Our experienced technicians diagnose the root cause to maximize the lifespan of every component.</p>
                <div class="feature-list">
                    <div class="feature">
                        <span class="tick"><i class="fas fa-check"></i></span>
                        <div><h4>Licensed &amp; Insured</h4><p>Full compliance and property protection on every job (<?= htmlspecialchars($business['license']) ?>).</p></div>
                    </div>
                    <div class="feature">
                        <span class="tick"><i class="fas fa-check"></i></span>
                        <div><h4>Transparent, Honest Pricing</h4><p>Upfront estimates with no surprise line items or hidden processing fees.</p></div>
                    </div>
                    <div class="feature">
                        <span class="tick"><i class="fas fa-check"></i></span>
                        <div><h4>Local &amp; Family-Operated</h4><p>Proudly serving Reno, Sparks, Carson City and the surrounding valley.</p></div>
                    </div>
                </div>
                <div style="margin-top:30px;"><a href="/about" class="btn btn-dark">More About Us</a></div>
            </div>
            <div class="split-media reveal">
                <img src="img/img1.png" alt="Nevada Breeze HVAC technician installing equipment" loading="lazy" width="600" height="400">
                <div class="badge"><strong>15+</strong><span>Years of Experience</span></div>
            </div>
        </div>
    </div>
</section>

<!-- ============ STATS ============ -->
<section class="section section-navy">
    <div class="container">
        <div class="stats">
            <div class="stat"><div class="num">15+</div><div class="label">Years Experience</div></div>
            <div class="stat"><div class="num">2K+</div><div class="label">Homes Serviced</div></div>
            <div class="stat"><div class="num">24/7</div><div class="label">Emergency Support</div></div>
            <div class="stat"><div class="num">100%</div><div class="label">Satisfaction Focus</div></div>
        </div>
    </div>
</section>

<!-- ============ CTA BANNER ============ -->
<section class="cta-banner">
    <div class="container">
        <h2>Ready to Improve Your Home's Comfort?</h2>
        <p>Connect with <?= htmlspecialchars($business['contact_name']) ?> today for a premium, no-pressure estimate anywhere across the Reno area.</p>
        <div class="cta-actions">
            <a href="/contact" class="btn btn-primary btn-lg">Get Your Free Estimate</a>
            <a href="tel:<?= $business['phone_raw'] ?>" class="btn btn-outline btn-lg"><i class="fas fa-phone"></i> Call <?= htmlspecialchars($business['phone']) ?></a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
