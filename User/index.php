<?php
session_start();
include('includes/header.php');
include('includes/top-navbar.php');
include('includes/sidebar.php');
include('config/dbconn.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->

        <!-- dont change -->
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

                            <a href="#" data-toggle="modal" data-target="#AddUserModal"
                                class="btn bg-gradient-danger btn-lg float-right deletebtn">SOS</a>

                            <!-- <button type="button" class="btn btn-danger btn-sm deletebtn">Delete</button> -->
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

                                        <?php
                                                    if ($row['tripstatus'] == 'Approved') { ?>

                                        <td>
                                            <a href="FinalPayment.php?user_id=<?php echo $row['tripid']; ?>"
                                                class=" btn btn-success btn-sm">Proceed</a>
                                            <!-- 
                                                            <button type="button" value="<?php echo $row['tripid']; ?>"
                                                                class="btn btn-danger btn-sm deletebtn">Cancel Trip</button> -->
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
    </div>
    <!-- /.content-header -->


    <div class="modal fade" id="deleteModel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Are You Sure To Send SOS</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form Action="../send_mail/send.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_id" class="delete_user_id">

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" name="send" class="btn btn-primary">Send it!
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <!-- <div id="map3" style="height: 400px;"></div> -->
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3781.4969583565126!2d73.74382557494437!3d18.5967043668447!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bb97feb7ff91%3A0x3934830944136423!2sSiddhi%20Car%20Rental%20Services!5e0!3m2!1sen!2sin!4v1691572656340!5m2!1sen!2sin"
                        width="1400" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>

    </section>

</div>



<?php include('includes/footer.php'); ?>

<?php include('includes/script.php'); ?>
<script>
$(document).ready(function() {
    $(".deletebtn").click(function(e) {
        e.preventDefault();

        var user_id = $(this).val();

        // console.log(user_id);

        $(".delete_user_id").val(user_id);
        $('#deleteModel').modal('show');

    });
});
</script>