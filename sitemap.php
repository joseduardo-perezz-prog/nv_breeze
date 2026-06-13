<?php
/**
 * SITEMAP XML DINÁMICO
 * Recorre nv_site_pages() y usa lastmod real con filemtime().
 * Se sirve como /sitemap.xml vía .htaccess.
 */
require_once __DIR__ . '/includes/config.php';

header('Content-Type: application/xml; charset=UTF-8');

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

foreach (nv_site_pages() as $page) {
    $loc  = SITE_URL . $page['loc'];
    $file = __DIR__ . '/' . $page['file'];
    $mod  = is_file($file) ? date('Y-m-d', filemtime($file)) : date('Y-m-d');

    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($loc) . "</loc>\n";
    echo "    <lastmod>{$mod}</lastmod>\n";
    echo "    <changefreq>{$page['changefreq']}</changefreq>\n";
    echo "    <priority>{$page['priority']}</priority>\n";
    echo "  </url>\n";
}

echo '</urlset>';
