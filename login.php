<?php
session_start();

include('./includes/dbconfig.php');

if (isset($_POST['booktrip'])) {

    // Check if the user is logged in by checking if the 'username' key is set in the session
    if (isset($_SESSION['username'])) {
        // User is logged in, proceed with booking

        $username = $_SESSION['username'];
        $usename = $_SESSION['usename'];

        $dropoffdate = $_POST['dropoffdate'];
        $pickupdate = $_POST['pickupdate'];
        $pickupaddress = $_POST['pickupaddress'];
        $dropoffadress = $_POST['dropoffadress'];
        $pickuptime = $_POST['pickuptime'];

        $sql = "INSERT INTO tripregister (customername, pickupaddress, dropoffadress, pickupdate, dropoffdate, pickuptime, tripstatus, payment_status) VALUES('$usename', '$pickupaddress', '$dropoffadress', '$pickupdate', '$dropoffdate', '$pickuptime', 'Pending', 0)";
        $result = mysqli_query($conn, $sql);

        if ($result) {

            // Get the last inserted tripid
            $tripid = mysqli_insert_id($conn);

            // Set the tripid as a session variable
            $_SESSION['tripid'] = $tripid;

            // $_SESSION['status'] = "Cab added successfully";
            header("Location: User/index.php");
            exit();
        } else {
            // $_SESSION['status'] = "Cab registration failed";
            echo '<script>alert("Failed to register book a trip.");</script>';
            echo '<script>window.location.href = "index.php";</script>';
            exit();
        }
    } else {
        // User is not logged in, show a message to do registration first
        echo '<script>alert("Please register or login to book a trip.");</script>';
        echo '<script>window.location.href = "index.php";</script>';
        exit();

    }
}


if (isset($_POST['ChangePassword'])) {

    $oldPassword = $_POST['pass'];
    $newPassword = $_POST['passNew'];
    $newPasswordVerify = $_POST['passCheck'];

    // Retrieve user's current password from the database
    // $userId = $_SESSION['user_id']; 
    $username = $_SESSION['username'];

    echo "<script>console.log('<?php echo $username ?>');</script>";

    // Sanitize the input to prevent SQL injection
    $safeUsername = mysqli_real_escape_string($conn, $username);

    $getUserQuery = "SELECT pass FROM registration WHERE username = '$safeUsername'";
    $getUserResult = mysqli_query($conn, $getUserQuery);

    if ($getUserResult) {
        $userRow = mysqli_fetch_assoc($getUserResult);
        $currentPassword = $userRow['pass'];

        // Check if the current password matches
        if (password_verify($oldPassword, $currentPassword)) {
            if ($newPassword === $newPasswordVerify) {
                // Hash the new password
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                // Update the password in the database
                $updateQuery = "UPDATE registration SET pass = '$hashedPassword' WHERE username = '$safeUsername'";
                mysqli_query($conn, $updateQuery);

                $_SESSION['status'] = "Password updated successfully";
                echo "<script>
alert('Password updated successfully');
</script>";
            } else {
                $_SESSION['status'] = "New passwords do not match";
                echo "<script>
alert('New passwords do not match');
</script>";
            }
        } else {
            $_SESSION['status'] = "Incorrect current password";
            echo "<script>
alert('Incorrect current password');
</script>";
        }
    } else {
        $_SESSION['status'] = "Error fetching user data: " . mysqli_error($conn);
        echo "<script>
alert('Error fetching user data');
</script>";
    }

    // header("Location: ChangePassword.php");
// exit();
}



if (isset($_POST['recover-submit'])) {
    $email = $_POST['email'];

    // Sanitize the email input to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $email);

    // Check if the email exists in the 'registration' table
    $reg_check_sql = "SELECT COUNT(*) AS count FROM registration WHERE email = '$email'";
    $reg_result = mysqli_query($conn, $reg_check_sql);
    $reg_row = mysqli_fetch_assoc($reg_result);

    // Check if the email exists in the 'driverregistration' table
    $driver_check_sql = "SELECT COUNT(*) AS count FROM driverregistration WHERE email = '$email'";
    $driver_result = mysqli_query($conn, $driver_check_sql);
    $driver_row = mysqli_fetch_assoc($driver_result);

    $total_rows = $reg_row['count'] + $driver_row['count'];

    if ($total_rows > 0) {
        // The email exists in at least one of the tables, so update the password
        $new_password = '12345';
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        if ($reg_row['count'] > 0) {
            // If email exists in 'registration' table, update that table
            $update_reg_sql = "UPDATE registration SET pass = '$hashed_password' WHERE email = '$email'";
            mysqli_query($conn, $update_reg_sql);
        }

        if ($driver_row['count'] > 0) {
            // If email exists in 'driverregistration' table, update that table
            $update_driver_sql = "UPDATE driverregistration SET pass = '$hashed_password' WHERE email = '$email'";
            mysqli_query($conn, $update_driver_sql);
        }

        echo "<script>
alert('Password updated successfully!');
</script>";
    } else {
        echo "<script>
alert('Email not found in both tables.');
</script>";
    }
}
?>