<?php
/**
 * =====================================================================
 *  NEVADA BREEZE — CONFIGURACIÓN CENTRAL DEL SITIO
 * =====================================================================
 *  Punto único de verdad para: identidad del negocio (NAP), constantes
 *  globales, generación de JSON-LD (schema.org) y el registro central
 *  de páginas indexables que alimenta el sitemap.
 *
 *  Las credenciales SMTP NUNCA viven aquí: se cargan desde
 *  includes/config.secret.php (excluido por .gitignore).
 * =====================================================================
 */

/* ---------------------------------------------------------------------
 * 1. CONSTANTES GLOBALES
 * ------------------------------------------------------------------- */
define('SITE_URL',  'https://www.nevadabreezehvac.com');   // https + www, sin barra final
define('SITE_NAME', 'Nevada Breeze Heating & Air');
define('FORM_ENDPOINT', SITE_URL . '/process-quote.php');   // Acción del formulario de cotización

/* Zona horaria para fechas dinámicas (copyright, lastmod, etc.) */
date_default_timezone_set('America/Los_Angeles');

/* ---------------------------------------------------------------------
 * 2. DATOS DEL NEGOCIO (NAP completo)
 *    Edita SOLO aquí: el resto del sitio lee de este arreglo.
 * ------------------------------------------------------------------- */
$business = [
    'name'        => 'Nevada Breeze Heating & Air',
    'legal_name'  => 'Nevada Breeze Heating and Air LLC',
    'tagline'     => 'Reno\'s Trusted Heating & Air Conditioning Experts',
    'license'     => 'NV Lic# 0094733',

    // Teléfonos (el primero es el principal)
    'phone'       => '(775) 515-4777',
    'phone_raw'   => '+17755154777',
    'phone_alt'   => '(775) 220-0320',
    'phone_alt_raw' => '+17752200320',

    'email'       => 'sal@nevadabreezehvac.com',
    'contact_name'=> 'Sal',

    // Dirección — completa los campos street/postal con tu dirección real.
    'street'      => '',                 // <-- COMPLETAR (ej. "123 Example St, Suite 4")
    'city'        => 'Reno',
    'state'       => 'NV',
    'state_full'  => 'Nevada',
    'postal'      => '89501',            // <-- AJUSTAR a tu código postal real
    'country'     => 'US',
    'lat'         => 39.5296,
    'lng'         => -119.8138,

    // Horario de atención (formato schema.org openingHours)
    'hours_human' => 'Mon–Sat: 7:00 AM – 7:00 PM · Sun: Emergency service',
    'hours_spec'  => [
        ['days' => ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'], 'opens' => '07:00', 'closes' => '19:00'],
    ],

    'languages'   => ['English', 'Spanish'],
    'price_range' => '$$',

    // Redes sociales (sameAs). Deja en '' las que no uses.
    'social' => [
        'facebook'  => '',
        'instagram' => '',
        'tiktok'    => '',
        'google'    => '',   // Perfil de Google Business / reviews
    ],

    // Áreas servidas
    'areas' => ['Reno', 'Sparks', 'Carson City', 'Washoe Valley', 'Sun Valley', 'Spanish Springs', 'Cold Springs'],

    // Catálogo de servicios (alimenta home, services y schema)
    'services' => [
        [
            'slug'  => 'air-conditioning',
            'icon'  => 'snowflake',
            'title' => 'Air Conditioning',
            'short' => 'Beat the Nevada heat with high-efficiency AC installation, repair, and maintenance.',
        ],
        [
            'slug'  => 'heating-furnace',
            'icon'  => 'fire',
            'title' => 'Heating & Furnace',
            'short' => 'Stay warm all winter with furnace installation, repair, and seasonal tune-ups.',
        ],
        [
            'slug'  => 'ductless-mini-split',
            'icon'  => 'wind',
            'title' => 'Ductless Mini-Splits',
            'short' => 'Energy-efficient zoned comfort for additions, garages, and whole homes.',
        ],
        [
            'slug'  => 'boiler-service',
            'icon'  => 'temperature',
            'title' => 'Boiler Service',
            'short' => 'Expert repair and maintenance for residential and light-commercial boilers.',
        ],
        [
            'slug'  => 'hvac-maintenance',
            'icon'  => 'tools',
            'title' => 'HVAC Maintenance',
            'short' => 'Preventive tune-ups and smart thermostat upgrades that extend system life.',
        ],
        [
            'slug'  => 'indoor-air-quality',
            'icon'  => 'leaf',
            'title' => 'Indoor Air Quality',
            'short' => 'Ventilation, filtration, and air purification for a healthier home.',
        ],
    ],
];

/* ---------------------------------------------------------------------
 * 3. REGISTRO CENTRAL DE PÁGINAS INDEXABLES
 *    Alimenta el sitemap dinámico (sitemap.php). 'loc' es relativa a la
 *    raíz, sin .php (URLs limpias). 'file' apunta al archivo real para
 *    calcular lastmod con filemtime().
 * ------------------------------------------------------------------- */
function nv_site_pages() {
    return [
        ['loc' => '/',          'file' => 'index.php',    'priority' => '1.0', 'changefreq' => 'weekly'],
        ['loc' => '/services',  'file' => 'services.php',  'priority' => '0.9', 'changefreq' => 'monthly'],
        ['loc' => '/projects',  'file' => 'projects.php',  'priority' => '0.7', 'changefreq' => 'monthly'],
        ['loc' => '/about',     'file' => 'about.php',     'priority' => '0.7', 'changefreq' => 'yearly'],
        ['loc' => '/contact',   'file' => 'contact.php',   'priority' => '0.8', 'changefreq' => 'yearly'],
    ];
}

/* ---------------------------------------------------------------------
 * 4. GENERADOR DE JSON-LD (schema.org @graph)
 *    Devuelve el bloque <script application/ld+json> con HVACBusiness +
 *    WebSite, listo para imprimir en el <head>.
 * ------------------------------------------------------------------- */
function nv_jsonld() {
    global $business;

    // Construye openingHoursSpecification
    $hours = [];
    foreach ($business['hours_spec'] as $h) {
        $hours[] = [
            '@type'        => 'OpeningHoursSpecification',
            'dayOfWeek'    => $h['days'],
            'opens'        => $h['opens'],
            'closes'       => $h['closes'],
        ];
    }

    // sameAs: solo redes con valor
    $sameAs = array_values(array_filter($business['social']));

    // areaServed
    $areaServed = array_map(function ($a) use ($business) {
        return ['@type' => 'City', 'name' => $a, 'addressRegion' => $business['state']];
    }, $business['areas']);

    // Catálogo de servicios (OfferCatalog)
    $offers = array_map(function ($s) {
        return [
            '@type' => 'Offer',
            'itemOffered' => ['@type' => 'Service', 'name' => $s['title'], 'description' => $s['short']],
        ];
    }, $business['services']);

    // Nodo del negocio local (HVACBusiness es subtipo de LocalBusiness)
    $localBusiness = [
        '@type'    => 'HVACBusiness',
        '@id'      => SITE_URL . '/#business',
        'name'     => $business['name'],
        'legalName'=> $business['legal_name'],
        'url'      => SITE_URL,
        'image'    => SITE_URL . '/img/logo.png',
        'logo'     => SITE_URL . '/img/logo.png',
        'telephone'=> $business['phone'],
        'email'    => $business['email'],
        'priceRange' => $business['price_range'],
        'address'  => array_filter([
            '@type'          => 'PostalAddress',
            'streetAddress'  => $business['street'] ?: null,
            'addressLocality'=> $business['city'],
            'addressRegion'  => $business['state'],
            'postalCode'     => $business['postal'],
            'addressCountry' => $business['country'],
        ]),
        'geo' => [
            '@type'    => 'GeoCoordinates',
            'latitude' => $business['lat'],
            'longitude'=> $business['lng'],
        ],
        'openingHoursSpecification' => $hours,
        'contactPoint' => [
            '@type'             => 'ContactPoint',
            'telephone'         => $business['phone'],
            'contactType'       => 'customer service',
            'areaServed'        => $business['state'],
            'availableLanguage' => $business['languages'],
        ],
        'areaServed' => $areaServed,
        'hasOfferCatalog' => [
            '@type' => 'OfferCatalog',
            'name'  => 'HVAC Services',
            'itemListElement' => $offers,
        ],
    ];
    if ($sameAs) {
        $localBusiness['sameAs'] = $sameAs;
    }

    // Nodo WebSite
    $website = [
        '@type' => 'WebSite',
        '@id'   => SITE_URL . '/#website',
        'url'   => SITE_URL,
        'name'  => SITE_NAME,
        'publisher' => ['@id' => SITE_URL . '/#business'],
        'inLanguage' => 'en-US',
    ];

    $graph = [
        '@context' => 'https://schema.org',
        '@graph'   => [$localBusiness, $website],
    ];

    return '<script type="application/ld+json">'
        . json_encode($graph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
        . '</script>';
}

/* ---------------------------------------------------------------------
 * 5. CARGA DE CREDENCIALES SMTP (secreto, fuera de Git)
 *    Define fallbacks por si el archivo secreto aún no existe, para
 *    que el sitio no rompa (el envío fallará de forma controlada).
 * ------------------------------------------------------------------- */
$secret = __DIR__ . '/config.secret.php';
if (is_readable($secret)) {
    require $secret;
}

if (!defined('SMTP_HOST'))     define('SMTP_HOST', 'smtp.gmail.com');
if (!defined('SMTP_PORT'))     define('SMTP_PORT', 587);
if (!defined('SMTP_USER'))     define('SMTP_USER', '');
if (!defined('SMTP_PASS'))     define('SMTP_PASS', '');
if (!defined('SMTP_FROM'))     define('SMTP_FROM', 'sal@nevadabreezehvac.com');
if (!defined('SMTP_FROM_NAME'))define('SMTP_FROM_NAME', 'Nevada Breeze Website');
if (!defined('SMTP_TO'))       define('SMTP_TO', 'sal@nevadabreezehvac.com');
