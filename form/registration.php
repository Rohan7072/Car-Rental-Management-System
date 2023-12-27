<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }

        @media (max-width: 576px) {
            .container {
                max-width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5 shadow-lg p-5 rounded">
                    <h2>Registration Form</h2>
                    <form action="registration.php" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                        <div class="mb-3">
                            <label for="aadharnumber" class="form-label">Aadhar Number</label>
                            <input type="text" class="form-control" id="aadharnumber" name="aadharnumber" required>
                        </div>
                        <div class="mb-3">
                            <label for="panno" class="form-label">Pan No</label>
                            <input type="text" class="form-control" id="panno" name="panno" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Upload Image:</label>
                            <input type="file" class="form-control-file form-control" id="image" name="image"
                                accept="image/*" required />
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="pass" required>
                        </div>

                        <div class="mb-3">
                            <label for="confpassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confpassword" name="confpassword" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="signup">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php

require "dbconfig.php";

if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];

    $sql = "INSERT INTO registration (name, email, phone, pass) VALUES ('$name', '$email', '$phone', '$pass')";
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Registration successful")</script>';
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>