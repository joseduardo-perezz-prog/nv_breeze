<?php
require_once 'includes/config.php';

$page_title       = 'HVAC Services in Reno, NV | AC, Heating, Ductless & Boilers — ' . SITE_NAME;
$page_description = 'Complete HVAC services in Reno, Nevada: air conditioning installation & repair, heating and furnace service, ductless mini-splits, boiler repair, maintenance and indoor air quality.';
$active = 'services';

/* Detalle ampliado por servicio (texto + bullets + imagen) */
$details = [
    'air-conditioning' => [
        'tag'    => 'Climate Optimization',
        'lead'   => 'We handle residential and light-commercial cooling systems engineered to keep your home stable and efficient through the hottest Nevada summers.',
        'image'  => 'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?q=80&w=1000&auto=format&fit=crop',
        'points' => [
            ['Install AC Systems', 'Right-sized unit selection matched precisely to your home\'s footprint.'],
            ['AC Repair', 'Fast diagnostics, refrigerant checks and circuit restoration.'],
            ['Seasonal Tune-Ups', 'Preventive maintenance that lowers bills and prevents breakdowns.'],
        ],
    ],
    'heating-furnace' => [
        'tag'    => 'Winter Thermal Care',
        'lead'   => 'Protect your home from the cold with complete furnace installation, repair and tune-ups for classic and modern gas heating systems.',
        'image'  => 'https://images.unsplash.com/photo-1585338107529-13afc5f02586?q=80&w=1000&auto=format&fit=crop',
        'points' => [
            ['Furnace Installation', 'High-efficiency furnaces and clean, code-compliant ventilation.'],
            ['Heating Repair', 'Rapid troubleshooting to restore warmth when you need it most.'],
            ['Safety Inspections', 'Carbon monoxide and combustion checks for total peace of mind.'],
        ],
    ],
    'ductless-mini-split' => [
        'tag'    => 'Zoned Efficiency',
        'lead'   => 'Ductless mini-splits deliver targeted, energy-efficient comfort — perfect for additions, garages, offices or whole-home solutions.',
        'image'  => 'https://images.unsplash.com/photo-1631545806609-24a8a3f4c0b9?q=80&w=1000&auto=format&fit=crop',
        'points' => [
            ['Mini-Split Installation', 'Sleek, quiet indoor units with flexible zoning options.'],
            ['Heat Pump Systems', 'Year-round heating and cooling from a single efficient system.'],
            ['Smart Controls', 'Wi-Fi thermostats and app-based comfort management.'],
        ],
    ],
    'boiler-service' => [
        'tag'    => 'Hydronic Systems',
        'lead'   => 'Expert care for residential and light-commercial boilers, with targeted pressure balancing across custom hydronic machinery.',
        'image'  => 'https://images.unsplash.com/photo-1607400201515-c2c41c07d307?q=80&w=1000&auto=format&fit=crop',
        'points' => [
            ['Boiler Repair', 'Leak detection, pressure balancing and component replacement.'],
            ['Boiler Maintenance', 'Annual servicing to keep systems safe and efficient.'],
            ['System Upgrades', 'Modern, efficient replacements for aging equipment.'],
        ],
    ],
    'hvac-maintenance' => [
        'tag'    => 'Preventive Care',
        'lead'   => 'Routine maintenance is the single best way to extend equipment life and avoid costly emergency repairs down the line.',
        'image'  => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?q=80&w=1000&auto=format&fit=crop',
        'points' => [
            ['Tune-Up Plans', 'Scheduled seasonal service for cooling and heating systems.'],
            ['Filter & Coil Care', 'Cleaner air, better airflow and improved efficiency.'],
            ['Thermostat Upgrades', 'Smart automation that pays for itself in savings.'],
        ],
    ],
    'indoor-air-quality' => [
        'tag'    => 'Healthier Homes',
        'lead'   => 'Breathe easier with ventilation, filtration and purification solutions tailored to Northern Nevada\'s dry, dusty climate.',
        'image'  => 'https://images.unsplash.com/photo-1556909190-eccf4a8bf97a?q=80&w=1000&auto=format&fit=crop',
        'points' => [
            ['Air Purification', 'Whole-home systems that capture dust, allergens and more.'],
            ['Ventilation', 'Balanced fresh-air solutions for tighter, modern homes.'],
            ['Humidity Control', 'Comfort and protection from over-dry indoor air.'],
        ],
    ],
];

include 'includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1>Our Professional Services</h1>
        <p>Premium Heating &amp; Air Conditioning for Reno</p>
        <div class="breadcrumb"><a href="/">Home</a> &rsaquo; Services</div>
    </div>
</section>

<section class="section">
    <div class="container">
        <?php $i = 0; foreach ($business['services'] as $s):
            $d = $details[$s['slug']];
            $reverse = ($i % 2 === 1) ? ' reverse' : '';
        ?>
        <div class="srow<?= $reverse ?> reveal" id="<?= htmlspecialchars($s['slug']) ?>">
            <div class="srow-media">
                <img src="<?= htmlspecialchars($d['image']) ?>" alt="<?= htmlspecialchars($s['title']) ?> service in Reno, NV" loading="lazy" width="1000" height="320">
            </div>
            <div class="srow-body">
                <span class="tag"><i class="fas fa-<?= htmlspecialchars($s['icon']) ?>"></i> <?= htmlspecialchars($d['tag']) ?></span>
                <h2><?= htmlspecialchars($s['title']) ?></h2>
                <p><?= htmlspecialchars($d['lead']) ?></p>
                <ul class="check-list">
                    <?php foreach ($d['points'] as $p): ?>
                        <li><i class="fas fa-check"></i> <span><strong><?= htmlspecialchars($p[0]) ?></strong><?= htmlspecialchars($p[1]) ?></span></li>
                    <?php endforeach; ?>
                </ul>
                <div style="margin-top:26px;"><a href="/contact" class="btn btn-primary">Request This Service</a></div>
            </div>
        </div>
        <?php $i++; endforeach; ?>
    </div>
</section>

<section class="cta-banner">
    <div class="container">
        <h2>Not Sure What You Need?</h2>
        <p>Call <?= htmlspecialchars($business['contact_name']) ?> for a free, honest assessment — we'll recommend the right solution for your home and budget.</p>
        <div class="cta-actions">
            <a href="/contact" class="btn btn-primary btn-lg">Get a Free Quote</a>
            <a href="tel:<?= $business['phone_raw'] ?>" class="btn btn-outline btn-lg"><i class="fas fa-phone"></i> <?= htmlspecialchars($business['phone']) ?></a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
