<?php
/** Banner reutilizable de la tarifa de visita ($119 service call). */
if (!isset($business)) { require_once __DIR__ . '/config.php'; }
?>
<section class="fee-band" aria-label="Service call fee">
    <div class="container">
        <div class="fee-price"><span class="cur">$</span><span class="amt"><?= htmlspecialchars(ltrim($business['service_fee'], '$')) ?></span></div>
        <div class="fee-copy">
            <strong>Flat Service-Call Fee · <?= htmlspecialchars($business['service_fee_areas']) ?></strong>
            <span><?= htmlspecialchars($business['service_fee_note']) ?> <?= htmlspecialchars($business['phone_hours']) ?>.</span>
        </div>
        <a href="tel:<?= $business['phone_raw'] ?>" class="btn btn-outline"><i class="fas fa-phone"></i> Call Now</a>
    </div>
</section>
