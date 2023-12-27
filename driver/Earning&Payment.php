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
                    <h1 class="m-0">Earning & Payment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Earning & Payment    </li>
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
                            <h3 class="card-title">Earning & Payment</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Total Cash Payment</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        placeholder="Payment Amount">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Total Digital Payment</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        placeholder="Payment Amount">
                                </div>

                                
                                <div class="form-group">
                                    <div class="row no-print">
                                        <div class="col-12">
                                            
                                            <button type="button" class="btn btn-success float-right"><i
                                                    class="far fa-credit-card"></i> Submit
                                                Payment
                                            </button>
                                        </div>
                                    </div>
                                </div>




                                <!-- /.card-body -->

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