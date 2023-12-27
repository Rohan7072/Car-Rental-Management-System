<?php
session_start();
include('includes/header.php');
include('includes/top-navbar.php');
include('includes/sidebar.php');
include('config/dbconn.php');

?>

<div class="content-wrapper">

    <div class="modal fade" id="deleteModel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">delete Trip</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form Action="code.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_id" class="delete_user_id">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" name="cancelTrip" class="btn btn-primary">Yes, delete</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Current Trip</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Current Trip</li>
                    </ol>
                </div>
            </div>
        </div>
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
                        <div class="card-header">
                            <h3 class="card-title">Current Trip Information</h3>
                        </div>

                        <div class="card-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Pickup Date</th>
                                        <th>drop Date</th>
                                        <th>Pickup Address</th>
                                        <th>Drop Address</th>
                                        <th>Driver Name</th>
                                        <th>Customer Name</th>
                                        <th>Trip Route</th>
                                        <th>Trip Time</th>
                                        <th>Trip KM</th>
                                        <th>carno</th>
                                        <th>carname</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_SESSION['usename'])) {

                                        $usename = $_SESSION['usename'];

                                        $sql = "SELECT * FROM tripregister where customername='$usename' AND (tripstatus = 'Picked Up' OR tripstatus = 'Dropped' OR tripstatus = 'Approved' OR tripstatus = 'Pending')";
                                        $result = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            foreach ($result as $row) {
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
                                            <?php echo $row['drivername']; ?>
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
                                        <!-- <td>
                                                        <a href="FinalPayment.php?user_id=<?php echo $row['tripid']; ?>"
                                                            class=" btn btn-success btn-sm">Proceed</a>

                                                        <button type="button" value="<?php echo $row['tripid']; ?>"
                                                            class="btn btn-danger btn-sm deletebtn">Cancel Trip</button>
                                                    </td> -->

                                        <?php
                                                    if ($row['tripstatus'] == 'Approved') { ?>

                                        <td>
                                            <a href="FinalPayment.php?user_id=<?php echo $row['tripid']; ?>"
                                                class=" btn btn-success btn-sm">Proceed</a>

                                            <button type="button" value="<?php echo $row['tripid']; ?>"
                                                class="btn btn-danger btn-sm deletebtn">Cancel Trip</button>
                                        </td>

                                        <?php
                                                    } else {
                                                        ?>

                                        <td>----</td>

                                        <?php
                                                    }

                                                    ?>

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
    </section>
</div>


<?php include('includes/script.php'); ?>
<script>
$(document).ready(function() {
    $(".deletebtn").click(function(e) {
        e.preventDefault();
        var tripid = $(this).val();

        $(".delete_user_id").val(tripid);
        $('#deleteModel').modal('show');

    });
});
</script>
<?php include('includes/footer.php'); ?>