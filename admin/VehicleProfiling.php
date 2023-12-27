<?php
session_start();
include('includes/header.php');
include('includes/top-navbar.php');
include('includes/sidebar.php');
include('config/dbconn.php');
?>

<div class="content-wrapper">

    <div class="modal fade" id="AddUserModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Vehicle Profiling</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form Action="code.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Manufacturer</label>
                            <input type="text" name="manufacturer" class="form-control" placeholder="Manufacturer">
                        </div>
                        <div class="form-group">
                            <label for="">Model</label>
                            <input type="text" name="model" class="form-control" placeholder="model">
                        </div>
                        <div class="form-group">
                            <label for="">Year</label>
                            <input type="text" name="year" class="form-control" placeholder="Year">
                        </div>
                        <div class="form-group">
                            <label for="">Color</label>
                            <input type="text" name="color" class="form-control" placeholder="Color">
                        </div>
                        <div class="form-group">
                            <label for="">License Plate Number</label>
                            <input type="text" name="licenseplatenumber" class="form-control"
                                placeholder="License Plate Number">
                        </div>
                        <div class="form-group">
                            <label for="">Vehicle Type</label>
                            <input type="text" name="vehicletype" class="form-control" placeholder="Vehicle Type">
                        </div>
                        <div class="form-group">
                            <label for="">Fuel Type</label>
                            <input type="text" name="fueltype" class="form-control" placeholder="Fuel Type">
                        </div>
                        <div class="form-group">
                            <label for="">Mileage</label>
                            <input type="text" name="mileage" class="form-control" placeholder="Mileage">
                        </div>
                        <div class="form-group">
                            <label for="">insurance policy Number</label>
                            <input type="text" name="insurancepolicynumber" class="form-control"
                                placeholder="insurance policy Number">
                        </div>
                        <div class="form-group">
                            <label for="">insurance expiry date</label>
                            <input type="text" name="insuranceexpirydate" class="form-control"
                                placeholder="insurance expiry date">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" name="addDriver" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="deleteModel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">delete Driver Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form Action="code.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_id" class="delete_user_id">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" name="DeleteDriver" class="btn btn-primary">Yes, delete</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-12">
                    <h1 class="m-0">Vehicle Profiling</h1>
                </div>
                <div class="col-md-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Vehicle Profiling</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- <section class="content"> -->
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
                    <div class="card-header">
                        <h3 class="card-title">Vehicle Profiling</h3>
                        <a href="#" data-toggle="modal" data-target="#AddUserModal"
                            class="btn btn-primary float-right btn-sm">Add Information of Vehicle</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Manufacturer</th>
                                    <th>Model</th>
                                    <th>Year</th>
                                    <th>Color</th>
                                    <th>Phone</th>
                                    <th>License Plate Number</th>
                                    <th>Vehicle Type</th>
                                    <th>Fuel Type</th>
                                    <th>Mileage</th>
                                    <th>insurance policy Number</th>
                                    <th>insurance expiry date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM driverregistration";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    foreach ($result as $row) {
                                        ?>
                                <tr>
                                    <td>
                                        <?php echo $row['id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['email']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['age']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['phone']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['liecenseno']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['expairydate']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['address']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['experiance']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['experiance']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['experiance']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['experiance']; ?>
                                    </td>


                                    <td><a href="driverRegister-edit.php?user_id=<?php echo $row['id']; ?>"
                                            class=" btn btn-info btn-sm">Edit</a>

                                        <button type="button" value="<?php echo $row['id']; ?>"
                                            class="btn btn-danger btn-sm deletebtn">Delete</button>
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
                                ?>

                            <tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- </section> -->
</div>


<?php include('includes/script.php'); ?>
<script>
$(document).ready(function() {
    $(".deletebtn").click(function(e) {
        e.preventDefault();
        $(this).css("background-color", "blue");
        var user_id = $(this).val();

        // console.log(user_id);

        $(".delete_user_id").val(user_id);
        $('#deleteModel').modal('show');

    });
});
</script>
<?php include('includes/footer.php'); ?>