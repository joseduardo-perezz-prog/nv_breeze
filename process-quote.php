<?php
/**
 * =====================================================================
 *  PROCESS-QUOTE.PHP — Manejador del formulario de cotización
 * =====================================================================
 *  Flujo: honeypot → validación server-side → envío SMTP (PHPMailer)
 *         → redirección a thank-you.php (éxito) o /contact?err=… (fallo).
 *  Las credenciales viven en includes/config.secret.php (fuera de Git).
 * =====================================================================
 */
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

/* Solo POST */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /contact');
    exit;
}

/* Redirección helper */
function nv_redirect($to) { header('Location: ' . $to); exit; }

/* 1. Honeypot: si el campo trampa viene lleno, es un bot → cortar en silencio */
if (!empty($_POST['website_url'])) {
    nv_redirect('/thank-you');   // respondemos OK para no dar pistas al bot
}

/* 2. Recoger y limpiar datos */
$name    = trim(strip_tags($_POST['name']    ?? ''));
$phone   = trim(strip_tags($_POST['phone']   ?? ''));
$email   = trim($_POST['email']   ?? '');
$service = trim(strip_tags($_POST['service'] ?? ''));
$message = trim(strip_tags($_POST['message'] ?? ''));

/* 3. Validación server-side */
if ($name === '' || $phone === '' || $email === '' || $service === '') {
    nv_redirect('/contact?err=fields');
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    nv_redirect('/contact?err=email');
}

/* 4. Construir y enviar el correo por SMTP autenticado */
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host       = SMTP_HOST;
    $mail->SMTPAuth   = true;
    $mail->Username   = SMTP_USER;
    $mail->Password   = SMTP_PASS;
    // Cifrado automático: 465 = SSL/SMTPS, cualquier otro (587) = STARTTLS/TLS
    $mail->Port       = (int) SMTP_PORT;
    $mail->SMTPSecure = ((int) SMTP_PORT === 465)
        ? PHPMailer::ENCRYPTION_SMTPS
        : PHPMailer::ENCRYPTION_STARTTLS;
    $mail->CharSet    = 'UTF-8';

    $mail->setFrom(SMTP_FROM, SMTP_FROM_NAME);
    $mail->addAddress(SMTP_TO, $business['name']);
    $mail->addReplyTo($email, $name);   // "Responder" va directo al cliente

    $safe = fn($v) => htmlspecialchars($v, ENT_QUOTES, 'UTF-8');

    $mail->isHTML(true);
    $mail->Subject = "New Quote Request: {$service} — {$name}";
    $mail->Body = "
        <div style='font-family:Arial,sans-serif;max-width:600px;border:1px solid #1a253d;border-radius:8px;overflow:hidden'>
            <div style='background:#1a253d;color:#fff;padding:18px 24px'>
                <h2 style='margin:0;font-size:18px'>New Website Quote Request</h2>
            </div>
            <div style='padding:24px;color:#333'>
                <p><strong>Name:</strong> {$safe($name)}</p>
                <p><strong>Phone:</strong> {$safe($phone)}</p>
                <p><strong>Email:</strong> {$safe($email)}</p>
                <p><strong>Service:</strong> {$safe($service)}</p>
                <p><strong>Message:</strong><br>" . nl2br($safe($message)) . "</p>
                <hr style='border:none;border-top:1px solid #eee;margin:18px 0'>
                <p style='font-size:12px;color:#888'>Sent from the Nevada Breeze website contact form.</p>
            </div>
        </div>";
    $mail->AltBody = "New Quote Request\n\nName: {$name}\nPhone: {$phone}\nEmail: {$email}\nService: {$service}\nMessage: {$message}";

    $mail->send();
    nv_redirect('/thank-you');

} catch (Exception $e) {
    /* Log silencioso para diagnóstico (no expone nada al usuario) */
    @error_log('[NevadaBreeze] Form send failed: ' . $mail->ErrorInfo, 3, __DIR__ . '/form-errors.log');
    nv_redirect('/contact?err=send');
}
