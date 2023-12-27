<?php
session_start();
include('config/dbconn.php');


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
            header("Location: MyDetails.php");
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
        $_SESSION['status'] = "Profile updated successfully";
        header("Location: MyDetails.php");
        exit();

    } else {
        $_SESSION['status'] = "Profile updating failed";
        header("Location: MyDetails.php");
        exit();
    }

}


//update trip register

if (isset($_POST['updateTripRegister'])) {

    if (isset($_SESSION['tripid'])) {

        $tripid = $_SESSION['tripid'];

        $fuel_rate = $_POST['fuelrate'];
        $customer_name = $_POST['customername'];
        $customer_email = $_POST['customeremail'];
        $customer_phone = $_POST['customerphone'];
        $customer_address = $_POST['customeraddress'];



        $carname = $_POST['cabmodel'];
        $carno = $_POST['cabnumber'];
        $tripratekm = $_POST['cabfare'];
        $carrentalfee = $_POST['carrentalfee'];


        // Perform the UPDATE query
        $sql = "UPDATE tripregister SET customername='$customer_name', customeremail='$customer_email',
        customerphone='$customer_phone', customeraddress='$customer_address', carno='$carno', carname = '$carname', tripratekm='$tripratekm', carrentalfee='$carrentalfee' WHERE tripid='$tripid'";

        if (mysqli_query($conn, $sql)) {
            // Update successful
            if (isset($_POST['user_id'])) {

                $user_id = $_POST['user_id'];

                $updateStatusSql = "UPDATE cabregistration SET caravailability='Not Available' WHERE id='$user_id'";
                mysqli_query($conn, $updateStatusSql);
            }
            // Redirect to a success page or do something else
            $_SESSION['status'] = "Trip Booking is successfully done";

            header('Location: CurrentTrip.php');
            exit();
        } else {
            // Update failed
            // Handle the error or redirect to an error page
            echo "Error: " . mysqli_error($conn);
        }
    }

    echo "<script>alert('Please Register Trip First to Book Car');</script>";
    echo "<script>console.log('Redirecting...'); window.location.href = '../index.php';</script>";

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

if (isset($_POST['cancelTrip'])) {
    $delete_id = $_POST['delete_id'];

    $sql = "delete from tripregister where tripid = '$delete_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "trip cancelled successfully";
        header("Location: CurrentTrip.php");
        exit();

    } else {
        $_SESSION['status'] = "trip cancelling failed";
        header("Location: CurrentTrip.php");
        exit();

    }
}

//driver

if (isset($_POST['updatedriver'])) {

    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $liecenseno = $_POST['liecenseno'];
    $expairydate = $_POST['expairydate'];
    $address = $_POST['address'];
    $experiance = $_POST['experiance'];

    $sql = "UPDATE driverregistration SET name='$name', email='$email', age='$age', phone='$phone', liecenseno='$liecenseno', expairydate='$expairydate', address='$address', experiance='$experiance' WHERE id='$user_id'";
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