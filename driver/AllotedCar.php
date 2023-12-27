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
                    <h1 class="m-0">My Booking</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">My Booking</li>
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
                                        <th>Car ID</th>
                                        <th>Car Model</th>
                                        <th>Car type</th>
                                        <th>Car year</th>

                                        <th>Rental duration</th>
                                        <th>Customer details</th>
                                        <th>Pick-up location</th>
                                        <th>Drop-off location</th>
                                        <th>Mileage</th>
                                        <th>Fuel level</th>


                                        <!-- <th>password</th> -->
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM registration";
                                    $result = mysqli_query($conn, $sql);

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
                                            <?php echo $row['phone']; ?>
                                        </td>
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
                                            <?php echo $row['email']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['email']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['email']; ?>
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