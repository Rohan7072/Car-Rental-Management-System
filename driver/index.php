<?php
session_start();
include('includes/header.php');
include('includes/top-navbar.php');
include('includes/sidebar.php');
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
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-12">
                    <!-- small box -->
                    <a href="TripIndex.php">
                        <div class="small-box bg-warning p-4">
                            <div class="inner text-white">
                                <h3 style="font-size: 24px;">Trip</h3>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </a>

                    <!-- ./col -->
                    <!-- small box -->
                    <!-- TripExpensesIndex.php -->
                    <a href="DriverIncomeExpenses.php">
                        <div class="small-box bg-danger p-4">
                            <div class="inner">
                                <h3 style="font-size: 24px;">Expenses</h3>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </a>
                    <!-- ./col -->

                </div>

                <div class="col-lg-3 col-12">
                    <!-- <a href="Earning&Payment.php">
                        <div class="small-box p-4" style="background-color: #bfd200;">
                            <div class="inner text-white">
                                <h3 style="font-size: 24px;">Earning & Payment</h3>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </a> -->

                    <!-- ./col -->
                    <!-- small box -->
                    <!-- TripExpensesIndex.php -->
                    <a href="ImpNumbers.php">
                        <div class="small-box bg-primary p-4">
                            <div class="inner">
                                <h3 style="font-size: 24px;">Contact Number</h3>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </a>
                    <!-- ./col -->
                    <a href="MyDetails.php">
                        <div class="small-box bg-success p-4">
                            <div class="inner">
                                <h3 style="font-size: 24px;">My Details</h3>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-12">
                    <!-- small box -->
                    <!-- <a href="NextMaintainance.php">
                        <div class="small-box bg-info p-4">
                            <div class="inner">
                                <h3 style="font-size: 24px;">Vehicle Maintenance</h3>
                            </div>
                            <div class="icon">
                                <i class="ion ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </a> -->

                    <!-- small box -->
                    <a href="AllotedTripHistory.php">
                        <div class="small-box p-4" style="background-color: #FF4081;">
                            <div class="inner text-white">
                                <h3 style="font-size: 24px;">History</h3>
                            </div>
                            <div class="icon">
                                <i class="ion ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-12">
                    <!-- Profile Image -->

                    <?php
                    if (isset($_SESSION['use_id'])) {
                        $use_id = $_SESSION['use_id'];
                        $sql = "SELECT * FROM driverregistration Where id='$use_id'";

                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            foreach ($result as $row) {

                                ?>

                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <?php echo '<img src="../uploads/' . $row['photo'] . '" class="profile-user-img img-fluid img-circle" alt="User Image" width="50">'; ?>
                            </div>

                            <h3 class="profile-username text-center">
                                <?php echo $row['name']; ?>
                            </h3>

                            <p class="text-muted text-center">Driver</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>UserName</b> <a class="float-right">
                                        <?php echo $row['username']; ?>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>email</b> <a class="float-right">
                                        <?php echo $row['email']; ?>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Phone</b> <a class="float-right">+91
                                        <?php echo $row['phone']; ?>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>address</b> <a class="float-right">
                                        <?php echo $row['address']; ?>
                                    </a>
                                </li>
                            </ul>

                            <a href="driverRegister-edit.php?user_id=<?php echo $row['id']; ?>"
                                class="btn btn-primary btn-block"><b>Edit</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>

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
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-12">
                    <!-- edited code delete later -->
                    <div class="col-md-12">
                        <div class="sticky-top">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Draggable Events</h4>
                                </div>
                                <div class="card-body">
                                    <!-- the events -->
                                    <div id="external-events">
                                        <div class="external-event bg-success">Lunch</div>
                                        <div class="external-event bg-warning">Go home</div>
                                        <div class="external-event bg-info">Do homework</div>
                                        <div class="external-event bg-primary">Work on UI design</div>
                                        <div class="external-event bg-danger">Sleep tight</div>
                                        <div class="checkbox">
                                            <label for="drop-remove">
                                                <input type="checkbox" id="drop-remove">
                                                remove after drop
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                    <!-- till this -->
                </div>

                <!-- edited code delete later -->
                <div class="col-lg-6 col-12">
                    <div class="card card-primary">
                        <div class="card-body p-0">
                            <!-- THE CALENDAR -->
                            <div id="calendar"></div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- till this -->

                <!-- <div class="col-lg-3 col-12">
                    <div class="card card-primary">
                        <b class="text-center">Id Card</b>
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="img-fluid" src="../images/bg_1.jpg" width="400">
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
</div>

<?php include('includes/footer.php'); ?>

<?php include('includes/script.php'); ?>