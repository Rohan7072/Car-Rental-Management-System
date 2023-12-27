<?php

$sname = "localhost";
$unmae = "root";
$password = "Rohan@12345678";
$db_name = "taxibookingsystem";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
    // echo "Connection failed!" . mysqli_connect_error();
    header("Location: ./errors/db.php");
    exit();
}

?>