<?php
require_once 'includes/config.php';

$page_title       = 'About Nevada Breeze | Trusted HVAC Company in Reno, NV';
$page_description = 'Learn about Nevada Breeze Heating & Air — a licensed, insured, family-operated HVAC company serving Reno, Sparks, Carson City and Northern Nevada with honest, expert service.';
$active = 'about';

include 'includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1>About Nevada Breeze</h1>
        <p>Your Trusted Local Comfort Experts</p>
        <div class="breadcrumb"><a href="/">Home</a> &rsaquo; About</div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="split">
            <div class="split-media reveal">
                <img src="img/img1.png" alt="Nevada Breeze HVAC technician at work in Reno" loading="lazy" width="600" height="400">
                <div class="badge"><strong>15+</strong><span>Years of Experience</span></div>
            </div>
            <div class="reveal">
                <span class="eyebrow">Our Story</span>
                <h2>Comfort You Can Count On, Service You Can Trust</h2>
                <p>Nevada Breeze Heating &amp; Air was built on a simple belief: homeowners deserve honest advice, expert workmanship and fair pricing. Led by <?= htmlspecialchars($business['contact_name']) ?>, our team treats every home like our own.</p>
                <p>From the first phone call to the final system check, we focus on doing the job right the first time — diagnosing root causes instead of selling quick fixes. That's how we've earned the trust of families across Reno and the surrounding valley.</p>
                <div class="feature-list">
                    <div class="feature"><span class="tick"><i class="fas fa-check"></i></span><div><h4>Licensed &amp; Insured</h4><p><?= htmlspecialchars($business['license']) ?> — fully covered on every project.</p></div></div>
                    <div class="feature"><span class="tick"><i class="fas fa-check"></i></span><div><h4>Bilingual Service</h4><p>We proudly serve our community in English and Spanish.</p></div></div>
                    <div class="feature"><span class="tick"><i class="fas fa-check"></i></span><div><h4>Locally Operated</h4><p>Real people from Northern Nevada, invested in our neighbors' comfort.</p></div></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Areas served -->
<section class="section section-cream">
    <div class="container">
        <div class="section-head reveal">
            <span class="eyebrow">Service Area</span>
            <h2>Proudly Serving Northern Nevada</h2>
            <div class="rule"></div>
            <p>Fast, reliable HVAC service across the greater Reno region and beyond.</p>
        </div>
        <div class="grid grid-3">
            <?php foreach ($business['areas'] as $area): ?>
                <div class="service-card reveal" style="text-align:center;">
                    <div class="service-icon" style="margin:0 auto 16px;"><i class="fas fa-map-marker-alt"></i></div>
                    <h3 style="font-size:1.1rem;"><?= htmlspecialchars($area) ?>, NV</h3>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="cta-banner">
    <div class="container">
        <h2>Experience the Nevada Breeze Difference</h2>
        <p>Honest, professional HVAC service is just one call away.</p>
        <div class="cta-actions">
            <a href="/contact" class="btn btn-primary btn-lg">Get a Free Quote</a>
            <a href="tel:<?= $business['phone_raw'] ?>" class="btn btn-outline btn-lg"><i class="fas fa-phone"></i> <?= htmlspecialchars($business['phone']) ?></a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
