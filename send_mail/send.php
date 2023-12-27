<?php
// session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';


if (isset($_POST["send"])) {

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'rohanraikar0007@gmail.com';
    $mail->Password = 'pqbdrlmwlxsjcnek';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('mayurzambare16@gmail.com');
    $mail->addAddress('rohanraikar0007@gmail.com');
    $mail->isHTML(true);
    $mail->Subject = "This is subject";
    $mail->Body = "I need a help!";
    $mail->send();
    admin_send();
    echo
        "
    <script>
    alert('Sent Successfully');
    document.location.href= '../User/index.php';
    </script>
    ";

}
function admin_send()
{
    if (isset($_POST["send"])) {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'rohanraikar0007@gmail.com';
        $mail->Password = 'pqbdrlmwlxsjcnek';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('rohanraikar0007@gmail.com');
        $mail->addAddress('mayurzambare16@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = 'subject of mail';
        $mail->Body = 'Your msg successfully sent';
        $mail->send();
        echo
            "
    <script>
    alert('Sent Successfully');
    document.location.href= '../User/index.php';
    </script>
    ";
    }
}
?>