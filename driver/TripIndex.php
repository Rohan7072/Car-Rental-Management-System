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
                    <h1 class="m-0">Trip</h1>
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
                    <a href="AllotedTrip.php">
                        <div class="small-box bg-warning p-4">
                            <div class="inner text-white">
                                <h3 style="font-size: 24px;">Trip Details</h3>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </a>
                </div>

                <!-- ./col -->
                <div class="col-lg-3 col-12">
                    <!-- small box -->
                    <a href="AllotedTripHistory.php">
                        <div class="small-box bg-success p-4">
                            <div class="inner">
                                <h3 style="font-size: 24px;">Trip History</h3>

                                <!-- <p>Bounce Rate</p> -->
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-12">
                    <!-- small box -->
                    <a href="DriverIncomeExpenses.php">
                        <div class="small-box p-4" style="background-color: #AB47BC;">
                            <div class="inner text-white">
                                <h3 style="font-size: 24px;">Trip Expenses</h3>

                                <!-- <p>Bounce Rate</p> -->
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </a>
                </div>
            </div>
    </section>
</div>

<?php include('includes/footer.php'); ?>
<?php include('includes/script.php'); ?>