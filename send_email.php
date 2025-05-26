<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/send_mail/PHPMailer-master/src/PHPMailer.php';
require_once __DIR__ . '/send_mail/PHPMailer-master/src/SMTP.php';
require_once __DIR__ . '/send_mail/PHPMailer-master/src/Exception.php';

function sendWelcomeEmail($to, $name) {
    $mail = new PHPMailer(true);

    try {
        // $mail->SMTPDebug = 2;
        // $mail->Debugoutput = 'html';

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'festimi2005gashi@gmail.com'; 
        $mail->Password = 'lvbe wqes qrsu hfzb';   
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('festimi2005gashi@gmail.com', 'Space World');
        $mail->addAddress($to, $name);

        $mail->isHTML(true);
        $mail->Subject = 'Welcome to Space World!';
        $mail->Body    = "Hello <strong>$name</strong>,<br><br>You have successfully registered!<br><br>Enjoy your journey! 🚀";

        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "<div style='background:#ffdddd;padding:10px;color:red;border:1px solid darkred;'>Email Error: " . $mail->ErrorInfo . "</div>";
        return false;
    }
}

?>
