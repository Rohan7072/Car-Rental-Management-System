<?php

session_start();

echo "displayed";

include('../config/dbconn.php');
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


if (isset($_POST['send'])) {

    echo "inside post send";
    $user_id = $_POST['delete_id'];

    $sql = "SELECT email FROM registration WHERE id='$user_id'";
    $result = mysqli_query($conn, $sql);



    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        echo "inside mysqli_num_rows";

        echo $row['email'];
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'rohanraikar0007@gmail.com';
        $mail->Password = 'pqbdrlmwlxsjcnek';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom($row['email']);
        $mail->addAddress('rohanraikar0007@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = "subject...sdasdasdasd";
        $mail->Body = "message...asdasdasd";
        $mail->send();
        // admin_send();




        if ($result) {
            header("Location: ../index.php");
            exit();

        } else {
            header("Location: ../index.php");
            exit();
        }

    }
}
?>