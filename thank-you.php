<?php
require_once 'includes/config.php';

$page_title       = 'Thank You | ' . SITE_NAME;
$page_description = 'Thank you for contacting Nevada Breeze. We have received your request and will be in touch shortly.';
$page_robots      = 'noindex, follow';
$active = '';

include 'includes/header.php';
?>

<section class="section" style="text-align:center;">
    <div class="container" style="max-width:680px;">
        <div class="service-icon" style="margin:0 auto 26px;width:84px;height:84px;font-size:2.2rem;background:var(--accent);color:#fff;border-radius:50%;">
            <i class="fas fa-check"></i>
        </div>
        <span class="eyebrow">Request Received</span>
        <h1 style="font-size:clamp(2rem,5vw,2.8rem);margin-bottom:16px;">Thank You!</h1>
        <p style="font-size:1.1rem;max-width:520px;margin:0 auto 14px;">
            We've received your request and <?= htmlspecialchars($business['contact_name']) ?> will get back to you as soon as possible — usually within one business day.
        </p>
        <p style="margin-bottom:32px;">Need immediate help? Give us a call directly.</p>
        <div class="cta-actions" style="justify-content:center;">
            <a href="tel:<?= $business['phone_raw'] ?>" class="btn btn-primary btn-lg"><i class="fas fa-phone"></i> <?= htmlspecialchars($business['phone']) ?></a>
            <a href="/" class="btn btn-dark btn-lg">Back to Home</a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
