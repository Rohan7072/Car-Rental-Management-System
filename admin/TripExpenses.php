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
                    <h1 class="m-0">Trip Expenses</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Trip Expenses</li>
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
                                        <th>Trip Id</th>
                                        <th>food</th>
                                        <th>parking</th>
                                        <th>fuel</th>
                                        <th>generalmaintainance</th>
                                        <th>tolltax</th>
                                        <th>rtofines</th>
                                        <th>medicalinsurance</th>
                                        <th>roadsideassistance</th>
                                        <th>Total Expense Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $sql = "SELECT * FROM tripexpense";
                                    $result = mysqli_query($conn, $sql);

                                    $result = mysqli_query($conn, $sql);
                                    if ($result) {

                                        if (mysqli_num_rows($result) > 0) {
                                            foreach ($result as $row) {
                                                ?>

                                                <tr>
                                                    <td>
                                                        <?php echo $row['tripid']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['food']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['parking']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['fuel']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['generalmaintainance']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['tolltax']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['rtofines']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['medicalinsurance']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['roadsideassistance']; ?>
                                                    </td>
                                                    <td class="bg-navy" style=" color:white">
                                                        <?php echo $row['food'] + $row['parking'] + $row['fuel'] + $row['generalmaintainance'] + $row['tolltax'] + $row['rtofines'] + $row['medicalinsurance'] + $row['roadsideassistance']; ?>
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
                                    } else {

                                        die('Query Error: ' . mysqli_error($conn));

                                        ?>
                                    <?php } ?>

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
<?php include('includes/footer.php'); ?>