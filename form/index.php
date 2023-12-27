<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Open+Sans&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="./" />

    <style>
        .container {
            margin-top: 50px;
        }

        @media (max-width: 576px) {
            .container {
                max-width: 100%;
            }
        }

        @media screen and (max-width: 650px) {
            .column {
                width: 100%;
                display: block;
            }
        }
    </style>
</head>

<body>
    <div class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5 shadow-lg p-5 rounded">
                    <h2>Login Form</h2>
                    <form action="index.php" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="pass" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="login">Login</button>
                        <a href='registration.php' class='btn btn-primary'>Sign up</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
session_start();
require "dbconfig.php";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM registration WHERE email = '$email' AND pass = '$pass'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<script>alert("login successful")</script>';
        header("Location: ../admin/index.php");
        exit();
    } else {
        echo "Invalid email or password";
    }

}
?>