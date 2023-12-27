<?php
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
            <div class="row justify-content-center">
                <div class="col-lg-3 col-12">
                    <!-- small box -->

                    <a href="RegistrationIndex.php">
                        <div class="small-box bg-warning p-2">
                            <div class="inner text-white">
                                <h3>Registration</h3>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </a>

                    <!-- ./col -->
                    <!-- small box -->
                    <!-- <a href="#">
                        <div class="small-box bg-danger p-2">
                            <div class="inner">
                                <h3>Bill Creation</h3>

                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </a> -->

                </div>

                <div class="col-lg-3 col-12">
                    <!-- small box -->
                    <a href="PendingTrip.php">
                        <div class="small-box bg-success p-2">
                            <div class="inner">
                                <h3>Pending Trip</h3>

                                <!-- <p>Bounce Rate</p> -->
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </a>
                    <!-- ./col -->
                    <!-- <a href="#">
                        <div class="small-box p-2" style="background-color: #AB47BC;">
                            <div class="inner text-white">
                                <h3>Final Settlement</h3>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </a> -->

                </div>

                <div class="col-lg-3 col-12">
                    <!-- <a href="VehicleMaintainanceIndex.php">
                        <div class="small-box bg-info p-2">
                            <div class="inner">
                                <h3>Vehicle Maintainance</h3>
                            </div>
                            <div class="icon">
                                <i class="ion ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </a> -->

                    <a href="TripHistoryIndex.php">
                        <div class="small-box p-2" style="background-color: #FF4081;">
                            <div class="inner text-white">
                                <h3>History</h3>
                                <!-- <p>User Registrations</p> -->
                            </div>
                            <div class="icon">
                                <i class="ion ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </a>

                </div>


            </div>
        </div>
</div>
</section>
</div>


<?php include('includes/footer.php'); ?>
<?php include('includes/script.php'); ?>