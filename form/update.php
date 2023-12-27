<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form</title>
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 shadow-lg p-5 rounded">
                <h2>Update Form</h2>
                <form action="update.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="tel" class="form-control" id="mobile" name="mobile" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
require "dbconfig.php";

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $sql = "UPDATE registration SET name = '$name', mobile = '$mobile', password = '$password' WHERE email = '$email'";

    if (mysqli_query($conn, $sql)) {
        echo "Update successful!";
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }


    mysqli_close($conn);
}
?>