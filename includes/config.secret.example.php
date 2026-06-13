<?php
/**
 * =====================================================================
 *  PLANTILLA DE CREDENCIALES SMTP  —  config.secret.example.php
 * =====================================================================
 *  CÓMO USAR (en el hosting, por consola o File Manager):
 *    1. Copia este archivo a:  includes/config.secret.php
 *    2. Rellena tus credenciales reales abajo.
 *    3. NUNCA subas config.secret.php a Git (ya está en .gitignore).
 *
 *  Recomendado: Google Workspace / Gmail con TLS en el puerto 587.
 *  Si usas Gmail con 2FA, genera una "App Password" (16 caracteres).
 * =====================================================================
 */

define('SMTP_HOST',      'smtp.gmail.com');             // Host SMTP
define('SMTP_PORT',      587);                          // 587 = TLS (STARTTLS)
define('SMTP_USER',      'sal@nevadabreezehvac.com');   // Usuario / cuenta
define('SMTP_PASS',      'PEGA_AQUI_TU_APP_PASSWORD');  // Contraseña o App Password
define('SMTP_FROM',      'sal@nevadabreezehvac.com');   // Remitente (debe coincidir con la cuenta)
define('SMTP_FROM_NAME', 'Nevada Breeze Website');      // Nombre visible del remitente
define('SMTP_TO',        'sal@nevadabreezehvac.com');   // A dónde llegan las solicitudes
