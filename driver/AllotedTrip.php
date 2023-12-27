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
                    <h1 class="m-0">Trip Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Trip Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="changeStatus">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Change Status of Trip</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form Action="code.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="tripid" value="<?php echo $_SESSION['tripid']; ?>">
                        <div class="form-group">
                            <label for="driverSelect">status</label>
                            <select id="driverSelect" class="form-control" name="tripstatus">
                                <option value="">Select</option>
                                <option value="Picked Up">Picked Up</option>
                                <option value="Dropped">Dropped</option>
                                <option value="Finished">Finished</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" name="updateStatus" class="btn btn-primary">Yes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <section class="content">
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
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Pickup Date</th>
                                        <th>drop Date</th>
                                        <th>Pickup Address</th>
                                        <th>Drop Address</th>
                                        <th>Customer Name</th>
                                        <th>Trip Route</th>
                                        <th>Trip Time</th>
                                        <th>Trip KM</th>
                                        <th>carno</th>
                                        <th>carname</th>
                                        <th>tripstatus</th>
                                        <th>Action</th>
                                        <!-- <?php echo 'asdasdasdasd' . $_SESSION['usename']; ?> -->

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_SESSION['usename'])) {

                                        $usename = $_SESSION['usename'];

                                        // $sql = "SELECT * FROM tripregister where drivername = '$usename'";
                                        $sql = "SELECT * FROM tripregister WHERE drivername = '$usename' AND (tripstatus = 'Picked Up' OR tripstatus = 'Dropped' OR tripstatus = 'Approved')";

                                        $result = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            foreach ($result as $row) {

                                                $_SESSION['tripid'] = $row['tripid'];
                                                ?>

                                                <tr>
                                                    <td>
                                                        <?php echo $row['tripid']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['pickupdate']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['dropoffdate']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['pickupaddress']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['dropoffadress']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['customername']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['triproute']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['triptime']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['tripkilometers']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['carno']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['carname']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['tripstatus']; ?>
                                                    </td>
                                                    <td><a href="AllotedTrip.php?trip_id=<?php echo $row['tripid']; ?>"
                                                            class=" btn btn-success btn-sm changeStatus">Change Status</a>

                                                        <!-- <button type="button" value="<?php echo $row['tripid']; ?>"
                                                class="btn btn-danger btn-sm deletebtn">Reject</button> -->
                                                    </td>
                                                </tr>
                                                <?php

                                            }
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td>No Record Found</td>
                                        </tr>
                                        <?php
                                    }

                                    ?>

                                <tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?php include('includes/script.php'); ?>
<script>
    $(document).ready(function () {
        $(".deletebtn").click(function (e) {
            e.preventDefault();
            var user_id = $(this).val();

            $(".delete_user_id").val(user_id);
            $('#deleteModel').modal('show');

        });

        $(".changeStatus").click(function (e) {
            e.preventDefault();
            var trip_id = $(this).val();

            $(".trip_id").val(trip_id);
            $('#changeStatus').modal('show');

        });
    });
</script>
<?php include('includes/footer.php'); ?>