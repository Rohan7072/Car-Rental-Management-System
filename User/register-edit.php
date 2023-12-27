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
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit - Registered Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit - Registered Users</h3>
                            <a href="register.php" class="btn btn-danger float-right btn-sm">Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form Action="code.php" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <?php
                                            if (isset($_GET['user_id'])) {
                                                $user_id = $_GET['user_id'];
                                                $sql = "SELECT * FROM registration WHERE id='$user_id'";
                                                $result = mysqli_query($conn, $sql);

                                                if (mysqli_num_rows($result) > 0) {
                                                    foreach ($result as $row) {

                                                        ?>
                                            <input type="hidden" name="user_id" value="<?php echo $row['id'] ?>">

                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" name="name" value="<?php echo $row['name'] ?>"
                                                    class="form-control" placeholder="Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="email" name="email" value="<?php echo $row['email'] ?>"
                                                    class="form-control" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Age</label>
                                                <input type="text" name="age" value="<?php echo $row['age'] ?>"
                                                    class="form-control" placeholder="Age">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Phone</label>
                                                <input type="text" name="phone" value="<?php echo $row['phone'] ?>"
                                                    class="form-control" placeholder="Phone">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Address</label>
                                                <input type="text" name="address" value="<?php echo $row['address'] ?>"
                                                    class="form-control" placeholder="Address">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Aadhar Number</label>
                                                <input type="text" name="aadharnumber"
                                                    value="<?php echo $row['aadharnumber'] ?>" class="form-control"
                                                    placeholder="Aadhar Number">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Aadhar Number</label>
                                                <input type="text" name="aadharnumber"
                                                    value="<?php echo $row['aadharnumber'] ?>" class="form-control"
                                                    placeholder="Aadhar Number">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Pan No</label>
                                                <input type="text" name="panno" value="<?php echo $row['panno'] ?>"
                                                    class="form-control" placeholder="Pan No">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input type="text" name="pass" value="<?php echo $row['pass'] ?>"
                                                    class="form-control" placeholder="password">
                                            </div>

                                            <div class="form-group">
                                                <label for="photo">Upload Photo:</label>
                                                <input type="file" class="form-control-file form-control" id="image"
                                                    name="photo" accept="image/*" />

                                            </div>

                                            <?php echo '<img src="../uploads/' . $row['photo'] . '" alt="image" width="200">'; ?>

                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="submit" name="updateUser" class="btn btn-info">Update</button>
                                        </div>

                                        <?php
                                                    }
                                                } else {
                                                    echo "<h4> No Records Found </h4>";

                                                }

                                            }

                                            ?>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?php include('includes/footer.php'); ?>
<?php include('includes/script.php'); ?>