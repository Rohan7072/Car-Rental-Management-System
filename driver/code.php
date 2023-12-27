<?php
session_start();
include('config/dbconn.php');

if (isset($_POST['updateStatus'])) {

    if (isset($_SESSION['usename'])) {

        $usename = $_SESSION['usename'];

        $tripstatus = $_POST['tripstatus'];
        $tripid = $_POST['tripid'];

        $sql = "UPDATE tripregister SET tripstatus='$tripstatus' WHERE tripid='$tripid'";
        $result = mysqli_query($conn, $sql);

        if ($result) {

            if ($tripstatus === "Finished") {

                $driverUpdateSql = "UPDATE driverregistration SET status='Available' WHERE name = '$usename'";
                $driverUpdateResult = mysqli_query($conn, $driverUpdateSql);

                if ($driverUpdateResult) {
                    $_SESSION['status'] .= " and driver status updated";
                } else {
                    $_SESSION['status'] .= " but driver status update failed";
                }
            }

            $_SESSION['status'] = "Trip updated successfully";
            header("Location: AllotedTrip.php");
            exit();

        } else {
            $_SESSION['status'] = "Trip updating failed";
            header("Location: AllotedTrip.php");
            exit();
        }
    } else {
        $_SESSION['status'] = "session is not geeting drivername";
        header("Location: AllotedTrip.php");
        exit();
    }

}


if (isset($_POST['driverExpenses'])) {

    $food = $_POST['food'];
    $parking = $_POST['parking'];
    $fuel = $_POST['fuel'];
    $generalmaintainance = $_POST['generalmaintainance'];
    $tolltax = $_POST['tolltax'];
    $rtofines = $_POST['rtofines'];
    $medicalinsurance = $_POST['medicalinsurance'];
    $roadsideassistance = $_POST['roadsideassistance'];
    $tripid = $_POST['tripid'];

    $tripStatusQuery = "SELECT tripstatus FROM tripregister WHERE tripid = '$tripid'";
    $tripStatusResult = mysqli_query($conn, $tripStatusQuery);

    if ($tripStatusResult) {
        $tripStatusRow = mysqli_fetch_assoc($tripStatusResult);
        $status = $tripStatusRow['tripstatus'];

        $allowedStatus = array("Approved", "Picked Up", "Dropped");
        if (in_array($status, $allowedStatus)) {
            $sql = "INSERT INTO tripexpense(food, parking, fuel, generalmaintainance, tolltax, rtofines, medicalinsurance, roadsideassistance, tripid) VALUES('$food', '$parking', '$fuel', '$generalmaintainance', '$tolltax', '$rtofines', '$medicalinsurance', '$roadsideassistance', '$tripid')";

            if (mysqli_query($conn, $sql)) {
                $_SESSION['status'] = "Trip Expenses added successfully";
            } else {
                $_SESSION['status'] = "Error: " . mysqli_error($conn);
            }
        } else {
            $_SESSION['status'] = "Cannot add expenses for trips with status: $status";
        }
    } else {
        $_SESSION['status'] = "Error fetching trip status: " . mysqli_error($conn);
    }

    header("Location: DriverIncomeExpenses.php");
    exit();
}



// User

if (isset($_POST['addUser'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $conpass = $_POST['conpass'];

    if ($pass === $conpass) {

        $checkmail = "SELECT email FROM registration WHERE email = '$email'";
        $result = mysqli_query($conn, $checkmail);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['status'] = "Email id already taken";
            header("Location: register.php");
        }


        $sql = "INSERT INTO registration(name, phone, email, pass) VALUES('$name', '$phone', '$email', '$pass')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $_SESSION['status'] = "user added successfully";
            header("Location: register.php");
            exit();

        } else {
            $_SESSION['status'] = "user registration failed";
            header("Location: register.php");
            exit();

        }
    } else {
        $_SESSION['status'] = "Password and confirm password not matched";
        header("Location: register.php");
    }
}


if (isset($_POST['updateUser'])) {
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $sql = "UPDATE registration SET name='$name', phone='$phone', email='$email', pass='$pass' WHERE id='$user_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "user updated successfully";
        header("Location: register.php");
        exit();

    } else {
        $_SESSION['status'] = "user updating failed";
        header("Location: register.php");
        exit();
    }

}


if (isset($_POST['DeleteUser'])) {
    $user_id = $_POST['delete_id'];


    $sql = "delete from registration where id = '$user_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "user deleted successfully";
        header("Location: register.php");
        exit();

    } else {
        $_SESSION['status'] = "user deleting failed";
        header("Location: register.php");
        exit();

    }
}



// cab
if (isset($_POST['addCab'])) {

    $cabmodel = $_POST['cabmodel'];
    $cabtype = $_POST['cabtype'];
    $cabcolor = $_POST['cabcolor'];
    $cabnumber = $_POST['cabnumber'];
    $cabfare = $_POST['cabfare'];



    $sql = "INSERT INTO cabregistration (cabmodel, cabtype, cabcolor, cabnumber, cabfare) VALUES('$cabmodel', '$cabtype', '$cabcolor', '$cabnumber', '$cabfare')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "Cab added successfully";
        header("Location: cabRegister.php");
        exit();
    } else {
        $_SESSION['status'] = "Cab registration failed";
        header("Location: cabRegister.php");
        exit();

    }

}

if (isset($_POST['updateCab'])) {

    $user_id = $_POST['user_id'];
    $cabmodel = $_POST['cabmodel'];
    $cabtype = $_POST['cabtype'];
    $cabcolor = $_POST['cabcolor'];
    $cabnumber = $_POST['cabnumber'];
    $cabfare = $_POST['cabfare'];

    $sql = "UPDATE cabregistration SET cabmodel='$cabmodel', cabtype='$cabtype', cabcolor='$cabcolor', cabnumber='$cabnumber', cabfare='$cabfare' WHERE id='$user_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "Cab updated successfully";
        header("Location: cabRegister.php");
        exit();

    } else {
        $_SESSION['status'] = "Cab updating failed";
        header("Location: cabRegister.php");
        exit();
    }

}

if (isset($_POST['DeleteCab'])) {
    $user_id = $_POST['delete_id'];


    $sql = "delete from cabregistration where id = '$user_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "user deleted successfully";
        header("Location: cabRegister.php");
        exit();

    } else {
        $_SESSION['status'] = "user deleting failed";
        header("Location: cabRegister.php");
        exit();

    }
}


//driver

if (isset($_POST['updateDriver'])) {

    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $liecenseno = $_POST['liecenseno'];
    $address = $_POST['address'];
    $experiance = $_POST['experiance'];
    $pancard = $_POST['pancard'];
    $status = $_POST['status'];


    // Check if a new image file is uploaded
    if ($_FILES['photo']['name'] !== '') {
        $target_directory = "../uploads/"; // Update with the actual directory path
        $target_file = $target_directory . basename($_FILES['photo']['name']);

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
            // File upload success, update the database with the new file name
            $photo = basename($_FILES['photo']['name']);
        } else {
            $_SESSION['status'] = "Photo upload failed";
            header("Location: MyDetails.php");
            exit();
        }
    } else {
        // User did not upload a new image, keep the existing image filename in the database
        $sql_get_photo = "SELECT photo FROM driverregistration WHERE id='$user_id'";
        $result_get_photo = mysqli_query($conn, $sql_get_photo);
        $row_get_photo = mysqli_fetch_assoc($result_get_photo);
        $photo = $row_get_photo['photo'];
    }


    $sql = "UPDATE driverregistration SET name='$name', email='$email', age='$age', phone='$phone', liecenseno='$liecenseno', address='$address', experiance='$experiance', pancard='$pancard', status='$status', photo='$photo' WHERE id='$user_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "Profile updated successfully";
        header("Location: MyDetails.php");
        exit();

    } else {
        $_SESSION['status'] = "Profile updating failed";
        header("Location: MyDetails.php");
        exit();
    }
}

if (isset($_POST['addDriver'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $liecenseno = $_POST['liecenseno'];
    $expairydate = $_POST['expairydate'];
    $address = $_POST['address'];
    $experiance = $_POST['experiance'];

    $sql = "INSERT INTO driverregistration (name, email, age, phone, liecenseno, expairydate, address, experiance) VALUES('$name', '$email', '$age', '$phone', '$liecenseno', '$expairydate', '$address', '$experiance')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "Cab added successfully";
        header("Location: cabRegister.php");
        exit();
    } else {
        $_SESSION['status'] = "Cab registration failed";
        header("Location: cabRegister.php");
        exit();

    }

}
?>