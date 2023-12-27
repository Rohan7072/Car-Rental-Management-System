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
                    <h1 class="m-0">Trip booking</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Trip booking</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <!-- <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add Trip Income</h3>
                            <a href="#" data-toggle="modal" data-target="#AddUserModal"
                                class="btn btn-primary float-right btn-sm">Add Trip Income</a>
                        </div> -->

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Trip booking</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Trip type</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        placeholder="Trip type">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Destination</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Destination">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Number of passengers</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Number of passengers">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Duration</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Duration">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Additional services</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Additional services">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Trip Route</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Trip Route">
                                </div>


                                <!-- <div class="form-group">
                                    <label for="exampleInputFile">Car average</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                            </div> -->
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
</div>
</section>
</div>


<?php include('includes/script.php'); ?>

<?php include('includes/footer.php'); ?>