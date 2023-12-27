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
                        <li class="breadcrumb-item active">Edit - driver Registered Users</li>
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
                            <h3 class="card-title">Edit - My Details</h3>
                            <a href="MyDetails.php" class="btn btn-danger float-right btn-sm">Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form Action="code.php" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <?php
                                            if (isset($_GET['user_id'])) {
                                                $user_id = $_GET['user_id'];
                                                $sql = "SELECT * FROM driverregistration WHERE id='$user_id'";
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
                                                <label for="">email</label>
                                                <input type="text" name="email" value="<?php echo $row['email'] ?>"
                                                    class="form-control" placeholder="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Age</label>
                                                <input type="text" name="age" value="<?php echo $row['age'] ?>"
                                                    class="form-control" placeholder="Age">
                                            </div>

                                            <div class="form-group">
                                                <label for="">phone</label>
                                                <input type="text" name="phone" value="<?php echo $row['phone'] ?>"
                                                    class="form-control" placeholder="phone">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Liecense No</label>
                                                <input type="text" name="liecenseno"
                                                    value="<?php echo $row['liecenseno'] ?>" class="form-control"
                                                    placeholder="phone">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Pan No</label>
                                                <input type="text" name="pancard" value="<?php echo $row['pancard'] ?>"
                                                    class="form-control" placeholder="pancard">
                                            </div>
                                            <div class="form-group">
                                                <label for="">address</label>
                                                <input type="text" name="address" value="<?php echo $row['address'] ?>"
                                                    class="form-control" placeholder="address">
                                            </div>
                                            <div class="form-group">
                                                <label for="">experiance</label>
                                                <input type="text" name="experiance"
                                                    value="<?php echo $row['address'] ?>" class="form-control"
                                                    placeholder="experiance">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Driver Availability Status</label>
                                                <select name="status" class="form-control">
                                                    <option value="Available"
                                                        <?php if ($row['status'] === 'Available') echo 'selected'; ?>>
                                                        Available</option>
                                                    <option value="Not Available"
                                                        <?php if ($row['status'] === 'Not Available') echo 'selected'; ?>>
                                                        Not Available</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="photo">Upload Photo:</label>
                                                <input type="file" class="form-control-file form-control" id="image"
                                                    name="photo" accept="image/*" />

                                            </div>

                                            <?php echo '<img src="../uploads/' . $row['photo'] . '" alt="image" width="200">'; ?>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="submit" name="updateDriver"
                                                class="btn btn-info">Update</button>
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