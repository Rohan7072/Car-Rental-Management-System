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
                    <h1 class="m-0">Trip Expenses</h1>
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
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <a href="#">
                        <div class="small-box bg-warning p-2">
                            <div class="inner text-white">
                                <h3>Food</h3>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </a>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <a href="#">
                        <div class="small-box bg-danger p-2">
                            <div class="inner">
                                <h3>Parking</h3>

                                <!-- <p>Unique Visitors</p> -->
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </a>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <a href="#">
                        <div class="small-box bg-success p-2">
                            <div class="inner">
                                <h3>Fuel</h3>

                                <!-- <p>Bounce Rate</p> -->
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <a href="#">
                        <div class="small-box p-2" style="background-color: #AB47BC;">
                            <div class="inner text-white">
                                <h3>General Maintainance</h3>

                                <!-- <p>Bounce Rate</p> -->
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </a>
                </div>


                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <a href="#">
                        <div class="small-box p-2" style="background-color: #922C40;">
                            <div class="inner text-white">
                                <h3>Toll Tax</h3>

                                <!-- <p>Bounce Rate</p> -->
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <a href="#">
                        <div class="small-box p-2" style="background-color: #A45C40;">
                            <div class="inner text-white">
                                <h3>RTO fines</h3>

                                <!-- <p>Bounce Rate</p> -->
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <a href="#">
                        <div class="small-box p-2" style="background-color: #75E6DA;">
                            <div class="inner text-white">
                                <h3>Medical & Insurance</h3>

                                <!-- <p>Bounce Rate</p> -->
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <a href="#">
                        <div class="small-box p-2" style="background-color: #FF4081;">
                            <div class="inner text-white">
                                <h3>Roadside assistance</h3>

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