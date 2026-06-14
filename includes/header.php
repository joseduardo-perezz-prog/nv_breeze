<?php
/**
 * HEADER GLOBAL — <head> dinámico por página + navegación.
 * Cada página define $page_title, $page_description, etc. ANTES de
 * incluir este archivo. Aquí se construyen canonical, OG, Twitter,
 * geo-tags y el JSON-LD del negocio.
 */
require_once __DIR__ . '/config.php';

/* ---- Variables SEO con valores por defecto ---- */
$page_title       = $page_title       ?? SITE_NAME . ' | Heating & Air Conditioning in Reno, NV';
$page_description = $page_description ?? 'Professional HVAC services in Reno, Nevada. AC installation & repair, heating, furnace, ductless mini-splits and boiler service. Licensed & insured. Free estimates.';
$page_robots      = $page_robots      ?? 'index, follow';
$active           = $active           ?? '';

/* ---- Canonical dinámico: deriva de la URL, sin .php ni /index ---- */
$path = strtok($_SERVER['REQUEST_URI'] ?? '/', '?');   // quita querystring
$path = preg_replace('/\.php$/', '', $path);            // quita .php
$path = preg_replace('#/index$#', '/', $path);          // /index -> /
if ($path !== '/' && substr($path, -1) === '/') {
    $path = rtrim($path, '/');                          // sin barra final (salvo home)
}
$canonical = $page_canonical ?? (SITE_URL . $path);

/* ---- Imagen social por defecto ---- */
$og_image = $page_og_image ?? (SITE_URL . '/img/img1.png');

/* Versionado de assets para romper caché */
$css_v = @filemtime(__DIR__ . '/../assets/css/style.css') ?: time();
$js_v  = @filemtime(__DIR__ . '/../assets/js/main.js')   ?: time();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($page_title) ?></title>
    <meta name="description" content="<?= htmlspecialchars($page_description) ?>">
    <meta name="robots" content="<?= htmlspecialchars($page_robots) ?>">
    <link rel="canonical" href="<?= htmlspecialchars($canonical) ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?= htmlspecialchars(SITE_NAME) ?>">
    <meta property="og:title" content="<?= htmlspecialchars($page_title) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($page_description) ?>">
    <meta property="og:url" content="<?= htmlspecialchars($canonical) ?>">
    <meta property="og:image" content="<?= htmlspecialchars($og_image) ?>">
    <meta property="og:locale" content="en_US">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= htmlspecialchars($page_title) ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($page_description) ?>">
    <meta name="twitter:image" content="<?= htmlspecialchars($og_image) ?>">

    <!-- Geo tags -->
    <meta name="geo.region" content="US-NV">
    <meta name="geo.placename" content="<?= htmlspecialchars($business['city']) ?>">
    <meta name="geo.position" content="<?= $business['lat'] ?>;<?= $business['lng'] ?>">
    <meta name="ICBM" content="<?= $business['lat'] ?>, <?= $business['lng'] ?>">

    <meta name="theme-color" content="#1a253d">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

    <!-- Font Awesome (iconos) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Estilos del sitio (versionado) -->
    <link rel="stylesheet" href="/assets/css/style.css?v=<?= $css_v ?>">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/img/logo.png">
    <link rel="apple-touch-icon" href="/img/logo.png">

    <!-- JSON-LD schema.org -->
    <?= nv_jsonld() ?>
</head>
<body<?= isset($body_class) ? ' class="' . htmlspecialchars($body_class) . '"' : '' ?>>

    <!-- TOP BAR -->
    <div class="topbar">
        <div class="container">
            <span class="tb-item tb-hide-sm"><i class="fas fa-certificate"></i> <?= htmlspecialchars($business['license']) ?> · Licensed &amp; Insured</span>
            <span class="tb-item"><i class="fas fa-phone-alt"></i> <a href="tel:<?= $business['phone_raw'] ?>"><?= htmlspecialchars($business['phone']) ?></a></span>
            <span class="tb-item tb-hide-sm"><i class="fas fa-envelope"></i> <a href="mailto:<?= htmlspecialchars($business['email']) ?>"><?= htmlspecialchars($business['email']) ?></a></span>
        </div>
    </div>

    <!-- HEADER / NAV -->
    <header class="site-header">
        <nav class="nav container" aria-label="Primary">
            <a href="/" class="brand" aria-label="<?= htmlspecialchars(SITE_NAME) ?> home">
                <img src="/img/logo.png" alt="<?= htmlspecialchars(SITE_NAME) ?> logo">
                <span class="brand-text" translate="no">NEVADA <span>BREEZE</span></span>
            </a>

            <button class="nav-toggle" aria-label="Open menu" aria-controls="nav-menu" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>

            <ul class="nav-menu" id="nav-menu">
                <li><a href="/" class="<?= $active === 'home' ? 'is-active' : '' ?>">Home</a></li>
                <li class="has-dropdown">
                    <a href="/services" class="dropdown-toggle <?= $active === 'services' ? 'is-active' : '' ?>">Services</a>
                    <ul class="dropdown">
                        <?php foreach ($business['services'] as $s): ?>
                            <li><a href="/services#<?= htmlspecialchars($s['slug']) ?>"><?= htmlspecialchars($s['title']) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li><a href="/projects" class="<?= $active === 'projects' ? 'is-active' : '' ?>">Projects</a></li>
                <li><a href="/about" class="<?= $active === 'about' ? 'is-active' : '' ?>">About</a></li>
                <li><a href="/contact" class="<?= $active === 'contact' ? 'is-active' : '' ?>">Contact</a></li>
                <li class="nav-cta"><a href="/contact" class="btn btn-primary">Get a Quote</a></li>
            </ul>
        </nav>
    </header>
    <div class="nav-backdrop" hidden></div>

    <main>
