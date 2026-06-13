<?php
require_once 'includes/config.php';

$page_title       = 'Our Projects | HVAC Installations in Reno, NV — ' . SITE_NAME;
$page_description = 'See recent HVAC projects by Nevada Breeze: AC installs, furnace replacements, ductless mini-splits and maintenance work across Reno and Northern Nevada.';
$active = 'projects';

/* Galería de proyectos */
$projects = [
    ['cat' => 'Air Conditioning', 'title' => 'High-Efficiency AC Install', 'img' => 'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?q=80&w=900&auto=format&fit=crop'],
    ['cat' => 'Heating',          'title' => 'Furnace Replacement',       'img' => 'https://images.unsplash.com/photo-1585338107529-13afc5f02586?q=80&w=900&auto=format&fit=crop'],
    ['cat' => 'Ductless',         'title' => 'Mini-Split Zoning',         'img' => 'https://images.unsplash.com/photo-1631545806609-24a8a3f4c0b9?q=80&w=900&auto=format&fit=crop'],
    ['cat' => 'Maintenance',      'title' => 'Rooftop Unit Service',      'img' => 'https://images.unsplash.com/photo-1581094288338-2314dddb7ece?q=80&w=900&auto=format&fit=crop'],
    ['cat' => 'Boilers',          'title' => 'Boiler System Upgrade',     'img' => 'https://images.unsplash.com/photo-1607400201515-c2c41c07d307?q=80&w=900&auto=format&fit=crop'],
    ['cat' => 'Indoor Air',       'title' => 'Whole-Home Air Purifier',   'img' => 'https://images.unsplash.com/photo-1556909190-eccf4a8bf97a?q=80&w=900&auto=format&fit=crop'],
];

include 'includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1>Recent Projects</h1>
        <p>Quality Workmanship Across Reno</p>
        <div class="breadcrumb"><a href="/">Home</a> &rsaquo; Projects</div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head reveal">
            <span class="eyebrow">Our Work</span>
            <h2>Comfort We've Delivered</h2>
            <div class="rule"></div>
            <p>A look at the installations and service calls we're proud to have completed for Northern Nevada homeowners.</p>
        </div>
        <div class="gallery">
            <?php foreach ($projects as $p): ?>
                <article class="project reveal">
                    <img src="<?= htmlspecialchars($p['img']) ?>" alt="<?= htmlspecialchars($p['title']) ?> — Nevada Breeze HVAC project in Reno" loading="lazy" width="900" height="280">
                    <div class="project-cap">
                        <span><?= htmlspecialchars($p['cat']) ?></span>
                        <h3><?= htmlspecialchars($p['title']) ?></h3>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="cta-banner">
    <div class="container">
        <h2>Your Project Could Be Next</h2>
        <p>Tell us what you need and we'll deliver comfort that lasts.</p>
        <div class="cta-actions">
            <a href="/contact" class="btn btn-primary btn-lg">Start Your Project</a>
            <a href="tel:<?= $business['phone_raw'] ?>" class="btn btn-outline btn-lg"><i class="fas fa-phone"></i> <?= htmlspecialchars($business['phone']) ?></a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
