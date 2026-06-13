<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. VALIDACIÓN ANTI-SPAM (Honeypot)
    // Si el campo 'website_url' no está vacío, es un bot.
    if (!empty($_POST['website_url'])) {
        die("Spam detectado."); 
    }

    $nombre   = strip_tags(trim($_POST['nombre']));
    $telefono = strip_tags(trim($_POST['telefono']));
    $email    = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $servicio = $_POST['servicio'];
    $mensaje  = strip_tags(trim($_POST['mensaje']));

    $mail = new PHPMailer(true);

    try {
        // Configuración SMTP Profesional
        $mail->isSMTP();
        $mail->Host       = 'mail.nevadabreezehvac.com'; // O el de tu hosting
        $mail->SMTPAuth   = true;
        $mail->Username   = 'sal@nevadabreezehvac.com'; // Tu cuenta
        $mail->Password   = 'TU_CONTRASEÑA_AQUÍ'; // Cambia esto
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // Quien envía y quien recibe
        $mail->setFrom('sal@nevadabreezehvac.com', 'Web Nevada Breeze');
        $mail->addAddress('sal@nevadabreezehvac.com', 'Sal - Nevada Breeze');
        $mail->addReplyTo($email, $nombre); // Para que al dar "Responder" le llegue al cliente

        // Contenido del Correo
        $mail->isHTML(true);
        $mail->Subject = "NUEVA SOLICITUD: $servicio - $nombre";
        
        $mail->Body = "
        <div style='font-family: Arial, sans-serif; border: 1px solid #1a253d; padding: 20px;'>
            <h2 style='color: #1a253d;'>Nueva solicitud de servicio web</h2>
            <p><strong>Cliente:</strong> $nombre</p>
            <p><strong>Teléfono:</strong> $telefono</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Servicio:</strong> $servicio</p>
            <p><strong>Mensaje:</strong><br>$mensaje</p>
            <hr>
            <p style='font-size: 0.8rem; color: #777;'>Enviado desde el formulario oficial de Nevada Breeze HVAC.</p>
        </div>";

        $mail->send();
        echo "<script>alert('Message sent successfully!'); window.location.href='index.php';</script>";
    } catch (Exception $e) {
        echo "Error al enviar: {$mail->ErrorInfo}";
    }
}