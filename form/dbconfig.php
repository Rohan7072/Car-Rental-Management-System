<?php

$sname = "localhost";
$unmae = "root";
$password = "";
$db_name = "TaxiBookingSystem";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
    echo "Connection failed!" . mysqli_connect_error();
}

?>