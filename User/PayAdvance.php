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
                    <h1 class="m-0">PayAdvance</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">PayAdvance</li>
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
                            <h3 class="card-title">Pay Advance</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Payment Amount</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        placeholder="Payment Amount">
                                </div>
                                <div class="form-group">
                  <label for="exampleSelectBorder">Payment Method</label>
                  <select class="custom-select form-control-border" id="exampleSelectBorder">
                    <option>Cash</option>
                    <option>Card</option>
                    <option>UPI</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleSelectBorder">Payment Confirmation</label>
                  <select class="custom-select form-control-border" id="exampleSelectBorder">
                    <option>Accept</option>
                    <option>Reject</option>
                   
                  </select>
                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Payment Receipt</label>
                                    <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
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