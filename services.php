<?php
require_once 'includes/config.php';

$page_title       = 'HVAC Services in Reno, NV | AC, Heating, Ductless & Boilers — ' . SITE_NAME;
$page_description = 'Complete HVAC services in Reno, Nevada: air conditioning installation & repair, heating and furnace service, ductless mini-splits, boiler repair, maintenance and indoor air quality.';
$active = 'services';

/* Detalle ampliado por servicio (texto persuasivo + bullets + imagen) */
$details = [
    'air-conditioning' => [
        'tag'    => 'Cooling You Can Rely On',
        'lead'   => 'When the Nevada sun is relentless, the last thing you need is an AC that quits. Our certified technicians install, repair and fine-tune cooling systems built to keep your family comfortable on the hottest days — while cutting down those summer energy bills. We diagnose the real problem the first time, so you\'re not paying for the same repair twice.',
        'image'  => 'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?q=80&w=1000&auto=format&fit=crop',
        'points' => [
            ['New AC Installation', 'Right-sized, high-efficiency systems matched perfectly to your home.'],
            ['Fast AC Repair', 'Same-day diagnostics, refrigerant checks and component fixes.'],
            ['Seasonal Tune-Ups', 'Preventive maintenance that stops breakdowns before they start.'],
        ],
        'cta'    => 'Cool My Home',
    ],
    'heating-furnace' => [
        'tag'    => 'Warm, Safe Winters',
        'lead'   => 'A cold home in a Northern Nevada winter is more than uncomfortable — it can be unsafe. We install and repair furnaces and heating systems with a focus on safety, efficiency and reliability, so your family stays warm no matter how low the temperature drops. Every job includes a safety check for total peace of mind.',
        'image'  => 'https://images.unsplash.com/photo-1585338107529-13afc5f02586?q=80&w=1000&auto=format&fit=crop',
        'points' => [
            ['Furnace Installation', 'High-efficiency furnaces with clean, code-compliant ventilation.'],
            ['Heating Repair', 'Rapid troubleshooting to restore warmth when you need it most.'],
            ['Safety Inspections', 'Carbon monoxide and combustion checks on every visit.'],
        ],
        'cta'    => 'Heat My Home',
    ],
    'hvac-maintenance' => [
        'tag'    => 'Total Home Comfort',
        'lead'   => 'Comfort is about more than just heating and cooling. From energy-saving ductless mini-splits and smart thermostats to boiler service and routine maintenance plans, we keep every part of your system running at its best. Regular care is the single smartest way to extend equipment life and avoid expensive emergency repairs.',
        'image'  => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?q=80&w=1000&auto=format&fit=crop',
        'points' => [
            ['Ductless Mini-Splits', 'Quiet, efficient, zoned comfort for additions, garages and offices.'],
            ['Boiler Service', 'Repair, maintenance and upgrades for hydronic heating systems.'],
            ['Maintenance & Thermostats', 'Tune-up plans and smart controls that pay for themselves.'],
        ],
        'cta'    => 'Book Maintenance',
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

<?php include 'includes/fee-band.php'; ?>

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
                <div style="margin-top:26px;display:flex;flex-wrap:wrap;gap:12px;">
                    <a href="/contact" class="btn btn-primary"><?= htmlspecialchars($d['cta']) ?></a>
                    <a href="tel:<?= $business['phone_raw'] ?>" class="btn btn-dark"><i class="fas fa-phone"></i> <?= htmlspecialchars($business['phone']) ?></a>
                </div>
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
