<?php
session_start();
include('includes/header.php');
include('includes/top-navbar.php');
include('includes/sidebar.php');
include('config/dbconn.php');

?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1 class="m-0">My Profile</h1>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">My Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- <section class="content"> -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($_SESSION['status'])) {

                    echo "<h4>" . $_SESSION['status'] . "</h4>";
                    unset($_SESSION['status']);
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">My Profile</h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Age</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>aadharnumber</th>
                                    <th>panno</th>
                                    <th>Upload Image</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                if (isset($_SESSION['username'])) {

                                    $username = $_SESSION['username'];

                                    $sql = "SELECT * FROM registration where username = '$username'";
                                    $result = mysqli_query($conn, $sql);

                                    if ($result === false) {
                                        echo "Query error: " . mysqli_error($conn);
                                    }
                                    if (mysqli_num_rows($result) > 0) {
                                        foreach ($result as $row) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $row['id']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['email']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['age']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['phone']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['address']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['aadharnumber']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['panno']; ?>
                                                </td>
                                                <td>
                                                    <?php echo '<img src="../uploads/' . $row['photo'] . '" alt="image" width="100">'; ?>
                                                </td>
                                                <td><a href="register-edit.php?user_id=<?php echo $row['id']; ?>"
                                                        class=" btn btn-info btn-sm">Edit</a>
                                                </td>
                                            </tr>
                                            <?php

                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td>No Record Found</td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>

                            <tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- </section> -->
</div>


<?php include('includes/script.php'); ?>
<?php include('includes/footer.php'); ?>