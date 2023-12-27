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
                    <h1 class="m-0">Trip Report</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Trip Report</li>
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


                    $directory = '../uploads/pdf_report/';
                    $pdfFiles = glob($directory . '*.pdf');
                    ?>
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <!-- <th>id</th> -->
                                        <!-- <th>Pickup Date</th>
                                        <th>drop Date</th>
                                        <th>Pickup Address</th>
                                        <th>Drop Address</th>
                                        <th>Driver Name</th>
                                        <th>Customer Name</th>
                                        <th>Trip Route</th>
                                        <th>Trip Time</th>
                                        <th>Trip KM</th>
                                        <th>carno</th>
                                        <th>carname</th> -->
                                        <th>pdf</th>
                                        <!-- <th>Status</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $sql = "SELECT * FROM tripregister LIMIT 1";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        foreach ($result as $row) {
                                            ?>

                                    <tr>
                                        <!-- <td>
                                            <?php echo $row['tripid']; ?>
                                        </td> -->
                                        <!-- <td>
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
                                        </td> -->
                                        <td>
                                            <h4>PDF Files</h4>
                                            <ul>
                                                <?php foreach ($pdfFiles as $pdfFile) { ?>
                                                <li><a href="<?php echo $pdfFile; ?>"
                                                        target="_blank"><?php echo basename($pdfFile); ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </td>



                                        <!-- <?php if ($row['tripstatus'] === 'Approved') { ?>

                                        <td>
                                            <?php echo $row['tripstatus']; ?>
                                        </td>

                                        <?php
                                                } else {
                                                    ?>
                                        <td>
                                            <?php echo 'Pending'; ?>
                                        </td>

                                        <?php
                                                }
                                                ?> -->
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
<?php include('includes/footer.php'); ?>