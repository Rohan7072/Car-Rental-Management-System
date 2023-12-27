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
                        <li class="breadcrumb-item active">Edit - Trip Booking</li>
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
                            <h3 class="card-title">Edit - Trip Approve</h3>
                            <a href="PendingTrip.php" class="btn btn-danger float-right btn-sm">Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form Action="code.php" method="POST">

                                        <input type="hidden" name="user_id"
                                            value="<?php echo isset($_GET['user_id']) ? $_GET['user_id'] : ''; ?>">

                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label for="driverSelect">Driver Name</label>
                                                <select id="driverSelect" class="form-control" name="drivername"
                                                    required>
                                                    <option value="">Select a driver</option>
                                                    <?php
                                                    if (isset($_GET['user_id'])) {
                                                        $user_id = $_GET['user_id'];
                                                        $sql = "SELECT * FROM driverregistration WHERE status='Available'";
                                                        $result = mysqli_query($conn, $sql);

                                                        if (mysqli_num_rows($result) > 0) {
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                                                            }
                                                        } else {
                                                            echo "<option value=''>No Records Found</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Trip Time</label>
                                                <input type="text" name="triptime" class="form-control"
                                                    placeholder="Trip Time" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Trip kilometers</label>
                                                <input type="text" name="tripkilometers" class="form-control"
                                                    placeholder="Trip kilometers" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Trip Route</label>
                                                <input type="text" name="triproute" class="form-control"
                                                    placeholder="Trip Route" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="submit" name="updateAdminTripApprove"
                                                class="btn btn-info">Update</button>
                                        </div>

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