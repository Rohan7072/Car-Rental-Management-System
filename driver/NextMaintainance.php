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
                    <h1 class="m-0">Next Maintainace</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Next Maintainace</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Next Maintainace</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mention Servicing in-detail</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        placeholder="Servicing">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Date</label>
                                    <input type="date" class="form-control" id="exampleInputEmail1"
                                        placeholder="Date">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cost</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="Cost">
                                </div>

                                <div class="form-group">
                                    <div class="row no-print">
                                        <div class="col-12">
                                            <button type="button" class="btn btn-success float-right"><i
                                                    class="far fa-credit-card"></i> Submit
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