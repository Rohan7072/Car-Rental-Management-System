<?php
session_start();
include('config/dbconn.php');


if (isset($_POST['updateAdminTripApprove'])) {

    $tripid = $_POST['user_id'];

    $drivername = $_POST['drivername'];
    $tripcost = $_POST['tripcost'];
    $triptime = $_POST['triptime'];
    $triproute = $_POST['triproute'];
    $tripkilometers = $_POST['tripkilometers'];

    $sql = "UPDATE tripregister SET drivername='$drivername', tripcost='$tripcost', triptime='$triptime', triproute='$triproute', tripkilometers='$tripkilometers', tripstatus='Approved' WHERE tripid='$tripid'";

    $updateDriverStatusQuery = "UPDATE driverregistration SET status='Not Available' WHERE name='$drivername'";

    // Perform both updates
    if (mysqli_query($conn, $sql) && mysqli_query($conn, $updateDriverStatusQuery)) {
        $_SESSION['status'] = "Trip Booking is Approved and Driver Alloted For it";
        header('Location: PendingTrip.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}


// User

if (isset($_POST['addUser'])) {

    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];
    $address = $_POST['address'];
    $aadharnumber = $_POST['aadharnumber'];
    $panno = $_POST['panno'];

    $conpass = $_POST['conpass'];

    if ($pass === $conpass) {

        $checkmail = "SELECT email FROM registration WHERE email = '$email'";
        $result = mysqli_query($conn, $checkmail);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['status'] = "Email id already taken";
            header("Location: register.php");
        }

        $photo_tmp = $_FILES['photo']['tmp_name'];
        $photo_name = $_FILES['photo']['name'];
        $photo_ext = strtolower(pathinfo($photo_name, PATHINFO_EXTENSION));

        $target_dir = "../uploads/";
        $target_file = $target_dir . uniqid() . '.' . $photo_ext;

        // Create the target directory if it doesn't exist
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        if (move_uploaded_file($photo_tmp, $target_file)) {
            echo "The file " . basename($target_file) . " has been uploaded successfully.";

            // Save the photo filename in the session
            $_SESSION['photo'] = basename($target_file);
            $photo1 = $_SESSION['photo'];

            $sql = "INSERT INTO registration(name, username, phone, email, age, pass, address, aadharnumber, panno, photo) VALUES('$name', '$username', '$phone', '$email', '$age', '$pass', '$address', '$aadharnumber', '$panno', '$photo1')";
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
        }
    } else {
        $_SESSION['status'] = "Password and confirm password not matched";
        header("Location: register.php");
    }
}


if (isset($_POST['updateUser'])) {
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];
    $address = $_POST['address'];
    $aadharnumber = $_POST['aadharnumber'];
    $panno = $_POST['panno'];

    // Check if a new image file is uploaded
    if ($_FILES['photo']['name'] !== '') {
        $target_directory = "../uploads/"; // Update with the actual directory path
        $target_file = $target_directory . basename($_FILES['photo']['name']);

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
            // File upload success, update the database with the new file name
            $photo = basename($_FILES['photo']['name']);
        } else {
            $_SESSION['status'] = "Photo upload failed";
            header("Location: cabRegister.php");
            exit();
        }
    } else {
        // User did not upload a new image, keep the existing image filename in the database
        $sql_get_photo = "SELECT photo FROM registration WHERE id='$user_id'";
        $result_get_photo = mysqli_query($conn, $sql_get_photo);
        $row_get_photo = mysqli_fetch_assoc($result_get_photo);
        $photo = $row_get_photo['photo'];
    }

    $sql = "UPDATE registration SET name='$name', phone='$phone', email='$email', age='$age', pass='$pass', address='$address', aadharnumber='$aadharnumber', panno='$panno',  photo='$photo' WHERE id='$user_id'";
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
    $carfueltype = $_POST['carfueltype'];
    $currentmilage = $_POST['currentmilage'];
    $cabcolor = $_POST['cabcolor'];
    $cabnumber = $_POST['cabnumber'];
    $yearofmanufacture = $_POST['yearofmanufacture'];
    $cabfare = $_POST['cabfare'];
    $caravailability = $_POST['caravailability'];
    $carrentalfee = $_POST['carrentalfee'];

    $photo_tmp = $_FILES['photo']['tmp_name'];
    $photo_name = $_FILES['photo']['name'];
    $photo_ext = strtolower(pathinfo($photo_name, PATHINFO_EXTENSION));

    $target_dir = "../uploads/";
    $target_file = $target_dir . uniqid() . '.' . $photo_ext;

    // Create the target directory if it doesn't exist
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    if (move_uploaded_file($photo_tmp, $target_file)) {
        echo "The file " . basename($target_file) . " has been uploaded successfully.";

        // Save the photo filename in the session
        $_SESSION['photo'] = basename($target_file);
        $photo1 = $_SESSION['photo'];

        $sql = "INSERT INTO cabregistration (cabmodel, carfueltype, carrentalfee, currentmilage, cabcolor, cabnumber, yearofmanufacture, cabfare, caravailability, photo) VALUES('$cabmodel', '$carfueltype', '$carrentalfee', '$currentmilage', '$cabcolor', '$cabnumber', '$yearofmanufacture', '$cabfare', '$caravailability', '$photo1')";
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

}

if (isset($_POST['updateCab'])) {
    $user_id = $_POST['user_id'];
    $cabmodel = $_POST['cabmodel'];
    $cabtype = $_POST['cabtype'];
    $cabcolor = $_POST['cabcolor'];
    $cabnumber = $_POST['cabnumber'];
    $cabfare = $_POST['cabfare'];
    $caravailability = $_POST['caravailability'];
    $carrentalfee = $_POST['carrentalfee'];


    // Check if a new image file is uploaded
    if ($_FILES['photo']['name'] !== '') {
        $target_directory = "../uploads/"; // Update with the actual directory path
        $target_file = $target_directory . basename($_FILES['photo']['name']);

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
            // File upload success, update the database with the new file name
            $photo = basename($_FILES['photo']['name']);
        } else {
            $_SESSION['status'] = "Photo upload failed";
            header("Location: cabRegister.php");
            exit();
        }
    } else {
        // User did not upload a new image, keep the existing image filename in the database
        $sql_get_photo = "SELECT photo FROM cabregistration WHERE id='$user_id'";
        $result_get_photo = mysqli_query($conn, $sql_get_photo);
        $row_get_photo = mysqli_fetch_assoc($result_get_photo);
        $photo = $row_get_photo['photo'];
    }

    $sql = "UPDATE cabregistration SET cabmodel='$cabmodel', cabtype='$cabtype', cabcolor='$cabcolor', cabnumber='$cabnumber', cabfare='$cabfare', caravailability='$caravailability', carrentalfee='$carrentalfee', photo='$photo' WHERE id='$user_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "Cab updated successfully";
    } else {
        $_SESSION['status'] = "Cab updating failed";
    }

    header("Location: cabRegister.php");
    exit();
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
            header("Location: driverRegister.php");
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
        $_SESSION['status'] = "Driver updated successfully";
        header("Location: driverRegister.php");
        exit();

    } else {
        $_SESSION['status'] = "Driver updating failed";
        header("Location: driverRegister.php");
        exit();
    }
}

if (isset($_POST['addDriver'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $liecenseno = $_POST['liecenseno'];
    $address = $_POST['address'];
    $experiance = $_POST['experiance'];
    $pancard = $_POST['pancard'];
    $status = $_POST['status'];


    $photo_tmp = $_FILES['photo']['tmp_name'];
    $photo_name = $_FILES['photo']['name'];
    $photo_ext = strtolower(pathinfo($photo_name, PATHINFO_EXTENSION));

    $target_dir = "../uploads/";
    $target_file = $target_dir . uniqid() . '.' . $photo_ext;

    // Create the target directory if it doesn't exist
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    if (move_uploaded_file($photo_tmp, $target_file)) {
        echo "The file " . basename($target_file) . " has been uploaded successfully.";

        // Save the photo filename in the session
        $_SESSION['photo'] = basename($target_file);
        $photo1 = $_SESSION['photo'];

        $sql = "INSERT INTO driverregistration (name, email, age, phone, liecenseno, address, experiance, pancard, status, photo) VALUES('$name', '$email', '$age', '$phone', '$liecenseno', '$address', '$experiance', '$pancard', '$status' , '$photo1')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $_SESSION['status'] = "Driver added successfully";
            header("Location: driverRegister.php");
            exit();
        } else {
            $_SESSION['status'] = "Driver registration failed";
            header("Location: driverRegister.php");
            exit();

        }
    }
}

if (isset($_POST['DeleteDriver'])) {
    $user_id = $_POST['delete_id'];


    $sql = "delete from driverregistration where id = '$user_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "user deleted successfully";
        header("Location: driverRegister.php");
        exit();

    } else {
        $_SESSION['status'] = "user deleting failed";
        header("Location: driverRegister.php");
        exit();

    }
}
?>