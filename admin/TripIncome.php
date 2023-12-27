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
                    <h4 class="modal-title">Trip Income</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form Action="code.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Trip budget Amount</label>
                            <input type="text" name="cabmodel" class="form-control" placeholder="Cab Model">
                        </div>
                        <div class="form-group">
                            <label for="">Trip Service Charge</label>
                            <input type="text" name="cabmodel" class="form-control" placeholder="Cab Fuel Type">
                        </div>
                        <div class="form-group">
                            <label for="">Add on Services</label>
                            <input type="text" name="cabnumber" class="form-control" placeholder="Car Current Milage">
                        </div>
                        <div class="form-group">
                            <label for="">Advanced payment</label>
                            <input type="text" name="cabtype" class="form-control" placeholder="Cab Type">
                        </div>


                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" name="addCab" class="btn btn-primary">Save</button>
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
                    <h4 class="modal-title">Delete Trip Income Details</h4>
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
                        <button type="submit" name="DeleteCab" class="btn btn-primary">Yes, delete</button>
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
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-md-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Registered Cabs</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

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
                        <h3 class="card-title">Registered Trip Income</h3>
                        <a href="#" data-toggle="modal" data-target="#AddUserModal"
                            class="btn btn-primary float-right btn-sm">Add Cab</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Cab Fuel Type</th>
                                    <th>Car Current Milage</th>
                                    <th>Cab Type</th>
                                    <th>Cab Model</th>
                                    <th>Cab Type</th>
                                    <th>Cab Chasis Number</th>
                                    <th>Cab Number</th>
                                    <th>Cab Color</th>
                                    <th>Cab fare</th>
                                    <th>Cab Insurance</th>
                                    <th>Cab Owner Name</th>
                                    <th>Cab Owner Contact</th>
                                    <th>Car P.U.C</th>
                                    <th>Car Manufacturing Year</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM cabregistration";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    foreach ($result as $row) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $row['id']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['cabmodel']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['cabtype']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['cabcolor']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['cabnumber']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['cabfare']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['cabfare']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['cabfare']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['cabfare']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['cabfare']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['cabfare']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['cabfare']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['cabfare']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['cabfare']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['cabfare']; ?>
                                            </td>


                                            <td><a href="cabRegister-edit.php?user_id=<?php echo $row['id']; ?>"
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
    $(document).ready(function () {
        $(".deletebtn").click(function (e) {
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