<?php

session_start();

include('dbconfig.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    $customer_sql = "SELECT * FROM registration WHERE username = '$username' AND pass = '$pass'";
    $customer_result = mysqli_query($conn, $customer_sql);

    $driver_sql = "SELECT * FROM driverregistration WHERE username = '$username' AND pass = '$pass'";
    $driver_result = mysqli_query($conn, $driver_sql);

    $isAdminLogin = ($username === 'admin' && $pass === 'admin');

    if (mysqli_num_rows($customer_result) > 0) {

        $row = mysqli_fetch_assoc($customer_result);
        $_SESSION['username'] = $username;
        $_SESSION['useremail'] = $row['email'];
        $_SESSION['usename'] = $row['name'];
        $_SESSION['use_id'] = $row['id'];
        $_SESSION['photo'] = $row['photo'];
        echo '<script>alert("Customer login successful")</script>';

        header('Location: http://localhost/siddhicarrental/index.php');
        exit();
    } elseif (mysqli_num_rows($driver_result) > 0) {

        $row = mysqli_fetch_assoc($driver_result);

        $_SESSION['username'] = $username;
        // $_SESSION['useremail'] = $row['email'];
        $_SESSION['use_id'] = $row['id'];
        $_SESSION['usename'] = $row['name'];
        $_SESSION['photo'] = $row['photo'];
        echo '<script>alert("Driver login successful")</script>';

        header('Location: http://localhost/siddhicarrental/driver/index.php');
        exit();
    } elseif ($isAdminLogin) {

        if ($username === 'admin' && $pass === 'admin') {
            $_SESSION['username'] = $username;

            header('Location: http://localhost/siddhicarrental/admin/index.php');
            exit();
        }

    }


} elseif (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $panno = $_POST['panno'];
    $aadharnumber = $_POST['aadharnumber'];
    $age = $_POST['age'];



    $photo_tmp = $_FILES['photo']['tmp_name'];
    $target_dir = "./uploads/";
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));

    $photo = uniqid() . '.' . $imageFileType;

    $target_file = $target_dir . basename($photo);

    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    $target_file = $target_dir . basename($photo);

    if (file_exists($target_file)) {
        echo "File already exists.";
        $uploadOk = 0;
    }

    if ($_FILES['photo']['size'] > 500000) {
        echo "File is too large.";
        $uploadOk = 0;
    }

    $allowedExtensions = array('jpg', 'jpeg', 'png');
    if (!in_array($imageFileType, $allowedExtensions)) {
        echo "Only JPG, JPEG, and PNG files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "The file was not uploaded.";
    } else {
        if (move_uploaded_file($photo_tmp, $target_file)) {
            echo "The file " . basename($photo) . " has been uploaded.";
            $_SESSION['photo'] = $photo;
        } else {
            echo "There was an error uploading the file.";
        }
    }


    if (isset($_POST['driverSignup'])) {

        $age = $_POST['age'];
        $liecenseno = $_POST['liecenseno'];
        $experiance = $_POST['experiance'];
        $pancard = $_POST['pancard'];

        $sql = "INSERT INTO driverregistration (name, email, age, liecenseno, experiance, username, pass, phone, address, pancard, photo, status) VALUES ('$name', '$email', '$age', '$liecenseno', '$experiance', '$username', '$pass', '$phone', '$address', '$pancard', '$photo', 'Available')";
    } else {
        $sql = "INSERT INTO registration (name, email, username, age, pass, phone, address, panno, aadharnumber, photo) VALUES ('$name', '$email', '$username', '$age', '$pass', '$phone', '$address', '$panno', '$aadharnumber', '$photo')";
    }

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Registration successful")</script>';
        // Redirect to the desired page after successful registration
        header("Location: http://localhost/siddhicarrental/index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}


if (isset($_POST['logout'])) {
    session_destroy(); // Destroy the session on logout
    header('Location: http://localhost/siddhicarrental/index.php');
    exit();
}
?>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.php">Siddhi Car <span>Rental Services</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navigation navbar-nav ml-auto">
                <li class="nav-item"><a href="./index.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
                <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
                <!-- <li class="nav-item"><a href="pricing.php" class="nav-link">Pricing</a></li> -->
                <li class="nav-item"><a href="car.php" class="nav-link">Cars</a></li>
                <!-- <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li> -->
                <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>

                <?php if (isset($_SESSION['username'])): ?>
                    <li class="nav-item dropdown" id="profileDropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            My Profile
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="./User/index.php">My Dashboard</a>
                            <a class="dropdown-item" href="ChangePassword.php">Change Password</a>
                            <!-- <a class="dropdown-item" href="settings.php">Settings</a -->
                            <div class="dropdown-divider"></div>
                            <form method="post">
                                <button type="submit" name="logout"
                                    class="nav-link btn btn-link btn-primary text-white login-btn">Logout</button>
                            </form>
                        </div>
                    </li>
                    <li class="nav-item nav-link">
                        <img src="uploads/<?php echo $_SESSION['photo']; ?>" alt="Profile Photo" class="rounded-circle"
                            width="30" height="30">
                    </li>
                    <li class="nav-item nav-link text-white">
                        <?php echo $_SESSION['username']; ?>
                    </li>
                <?php endif; ?>

                <?php if (isset($_SESSION['username'])): ?>
                <?php else: ?>
                    <!-- Login Button -->
                    <li class="nav-item">
                        <button type="button" class="nav-link btn btn-link btn-sm btn-primary login-btn text-white"
                            data-toggle="modal" data-target="#loginModal">
                            Login
                        </button>
                    </li>

                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>



<script>
    // Example logic to determine if the user is logged in
    var isLoggedIn = '<?php echo isset($_SESSION["username"]) ? "true" : "false"; ?>';

    if (isLoggedIn === "true") {
        document.getElementById('profileDropdown').style.display = 'block';
    }
</script>


<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <a href="#" onclick="location.reload();">
                    <button type="button" class="btn btn-danger" aria-label="Close">

                        <span aria-hidden="true">&times;</span>
                    </button> </a>
            </div>
            <div class="modal-body">
                <!-- Login Form -->
                <form action="#" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="Enter your username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="pass"
                            placeholder="Enter your password">
                    </div>
                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                </form>
            </div>
            <div class="modal-footer">
                <p>Don't have an account? <a href="#" id="signupLink">Sign up</a> or <a href="#"
                        id="driverSignupLink">Driver Signup</a></p>
                <p>Forgert Password?<a href="/siddhicarrental/forget_password.php" id="signupLink">Click here!</a></p>
            </div>

        </div>
    </div>
</div>


<!-- Driver Signup Modal -->
<div class="modal fade" id="driverSignupModal" tabindex="-1" role="dialog" aria-labelledby="driverSignupModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="driverSignupModalLabel">Driver Signup</h5>
                <a href="#" onclick="location.reload();">
                    <button type="button" class="btn btn-danger" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </a>
            </div>
            <div class="modal-body">
                <!-- Driver Signup Form -->
                <form action="#" method="POST" enctype="multipart/form-data">
                    <!-- Add the hidden input field for driverSignup -->
                    <input type="hidden" name="driverSignup" value="1">

                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="text" class="form-control" name="name" id="fullname"
                            placeholder="Enter your full name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" class="form-control" maxlength="2" name="age" id="age"
                            placeholder="Enter your Age" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">phone Number</label>
                        <input type="text" class="form-control" name="phone" id="phone"
                            placeholder="Enter your phone Number" maxlength="10" pattern="[789]\d{9}">
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" placeholder="Enter your Address"
                            required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="liecenseno">Liecense Number</label>
                        <input type="text" class="form-control" name="liecenseno" id="liecenseno"
                            placeholder="Enter your Liecense Number" required>
                    </div>
                    <div class="form-group">
                        <label for="panno">Pan Number</label>
                        <input type="text" class="form-control" name="pancard" id="panno"
                            placeholder="Enter your Pan Number" required pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}">
                    </div>
                    <div class="form-group">
                        <label for="Experiance">Experiance</label>
                        <input type="text" class="form-control" name="experiance" id="Experiance"
                            placeholder="Enter your Experiance" required>
                    </div>

                    <div class="form-group">
                        <label for="signupUsername">Username</label>
                        <input type="text" class="form-control" name="username" id="signupUsername"
                            placeholder="Enter your username" required>
                    </div>
                    <div class="form-group">
                        <label for="signupPassword">Password</label>
                        <input type="password" class="form-control" name="pass" id="signupPassword"
                            placeholder="Enter your password" required>
                    </div>

                    <div class="form-group">
                        <label for="photo">Upload Photo:</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="photo" name="photo" accept="image/*"
                                required>
                            <label class="custom-file-label" for="photo">Choose Image</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="signup">Sign up</button>
                </form>
            </div>
            <div class="modal-footer">
                <p>Already have an account? <a href="#" id="loginLink">Login</a></p>
            </div>
        </div>
    </div>
</div>



<!-- Signup Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Signup</h5>
                <a href="#" onclick="location.reload();">
                    <button type="button" class="btn btn-danger" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> </a>
            </div>
            <div class="modal-body">
                <!-- Signup Form -->
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="text" class="form-control" name="name" id="fullname"
                            placeholder="Enter your full name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="signupUsername">Username</label>
                        <input type="text" class="form-control" name="username" id="signupUsername"
                            placeholder="Enter your username" required>
                    </div>
                    <div class="form-group">
                        <label for="fullname">Age</label>
                        <input type="number" class="form-control" name="age" maxlength="2" id="fullname"
                            placeholder="Enter your Age" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">phone Number</label>
                        <input type="tel" class="form-control" name="phone" id="phone" pattern="[789]\d{9}"
                            placeholder="Enter your phone Number" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" placeholder="Enter your Address"
                            required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="panno">Pan Number</label>
                        <input type="text" class="form-control" name="panno" id="panno"
                            pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}" placeholder="Enter your Pan Number" required>
                    </div>
                    <div class="form-group">
                        <label for="aadharnumber">Aadhar Number</label>
                        <input type="text" class="form-control" name="aadharnumber" id="aadharnumber"
                            placeholder="Enter your Aadhar Number" required>
                    </div>

                    <div class="form-group">
                        <label for="photo">Upload Photo:</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="photo" name="photo" accept="image/*"
                                required>
                            <label class="custom-file-label" for="photo">Choose Image</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="signupPassword">Password</label>
                        <input type="password" class="form-control" name="pass" id="signupPassword"
                            placeholder="Enter your password" required>
                    </div>

                    <button type="submit" class="btn btn-primary" name="signup">Sign up</button>
                </form>
            </div>
            <div class="modal-footer">
                <p>Already have an account? <a href="#" id="loginLink">Login</a></p>
            </div>
        </div>
    </div>
</div>