<?php
// Tu código PHP aquí
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'aeroductos/bat/PHPMailer/Exception.php';
require 'aeroductos/bat/PHPMailer/PHPMailer.php';
require 'aeroductos/bat/PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';      // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                   // Enable SMTP authentication
    $mail->Username   = 'ezequiel.cetraro@gmail.com'; // SMTP username
    $mail->Password   = 'zzdskouhkgvmyvug';     // SMTP password
    $mail->SMTPSecure = 'tls';                  // Enable implicit TLS encryption
    $mail->Port       = 587;                    // TCP port to connect to

    // Recipients
    $mail->setFrom('ezequiel.cetraro@gmail.com', 'Contacto Aeroductos');
    $mail->addAddress('ezequiel.cetraro@gmail.com', 'Contacto Aeroductos'); // Add a recipient

    // Captura de datos del formulario
    $name = $_POST['name'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $consulta = $_POST['consulta'];

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Contacto Aeroductos';

    // Cuerpo del mensaje con los datos del formulario
    $mail->Body = "<strong>Nombre:</strong> $name<br>
                   <strong>Email:</strong> $email<br>
                   <strong>Teléfono:</strong> $telefono<br>
                   <strong>Consulta:</strong> $consulta";

    $mail->send();
    echo 'Mensaje enviado correctamente';
    
    // Redirigir al índice después de 2 segundos
    header("Location: /index.html");
    exit(); // Asegúrate de usar exit después de header para detener la ejecución del script
} catch (Exception $e) {
    echo "El mensaje no pudo ser enviado. Error: {$mail->ErrorInfo}";
}
?>
