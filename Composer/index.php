<?php

require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Recibir los datos del otro archivo

function enviarCorreo($asunto, $cuerpo, $destinatario) {
    // Crear una nueva instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'horaciomunoz686@gmail.com';
        $mail->Password = 'vbhebjrelfdotwkt'; // Aquí va la contraseña de aplicación
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configuración del correo
        $mail->setFrom('horaciomunoz686@gmail.com', 'Horaio Events');
        $mail->addAddress($destinatario);
        $mail->Subject = $asunto;
        $mail->Body = $cuerpo;

        $mail->send();
        return 'Correo enviado correctamente';
    } catch (Exception $e) {
        return 'Error al enviar el correo: ' . $mail->ErrorInfo;
        #echo "Error al enviar el correo: " . $mail->ErrorInfo;
    }
}

?>
