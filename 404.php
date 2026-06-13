<?php
require_once 'includes/config.php';
http_response_code(404);

$page_title       = 'Page Not Found | ' . SITE_NAME;
$page_description = 'The page you are looking for could not be found.';
$page_robots      = 'noindex, follow';
$active = '';

include 'includes/header.php';
?>

<section class="section" style="text-align:center;">
    <div class="container" style="max-width:620px;">
        <div class="serif accent" style="font-size:clamp(4rem,14vw,7rem);line-height:1;">404</div>
        <h1 style="margin:10px 0 16px;">Page Not Found</h1>
        <p style="margin-bottom:30px;">Sorry, the page you're looking for doesn't exist or has moved. Let's get you back on track.</p>
        <div class="cta-actions" style="justify-content:center;">
            <a href="/" class="btn btn-primary btn-lg">Back to Home</a>
            <a href="/contact" class="btn btn-dark btn-lg">Contact Us</a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
