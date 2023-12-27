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
                    <h1 class="m-0">Alloted Trip History</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Alloted Trip History</li>
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

                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_SESSION['usename'])) {

                                        $usename = $_SESSION['usename'];

                                        $sql = "SELECT * FROM tripregister where drivername = '$usename'";
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
                                        <!-- 
                                        <td><a href="TripApprove.php?trip_id=<?php echo $row['tripid']; ?>"
                                                class=" btn btn-success btn-sm changeStatus">Change Status</a>

                                            <button type="button" value="<?php echo $row['tripid']; ?>"
                                                class="btn btn-danger btn-sm deletebtn">Reject</button>
                                        </td> -->
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
$(document).ready(function() {
    $(".deletebtn").click(function(e) {
        e.preventDefault();
        $(this).css("background-color", "blue");
        var user_id = $(this).val();

        // console.log(user_id);

        $(".delete_user_id").val(user_id);
        $('#deleteModel').modal('show');

    });
});
</script>
<?php include('includes/footer.php'); ?>