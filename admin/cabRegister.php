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
                    <h4 class="modal-title">Cab Registration</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form Action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Cab Model</label>
                            <input type="text" name="cabmodel" class="form-control" placeholder="Cab Model">
                        </div>
                        <div class="form-group">
                            <label for="">Car Rental fee</label>
                            <input type="text" name="carrentalfee" class="form-control" placeholder="Car Rental fee">
                        </div>
                        <div class="form-group">
                            <label for="">Cab Fuel Type</label>
                            <input type="text" name="carfueltype" class="form-control" placeholder="Cab Fuel Type">
                        </div>
                        <div class="form-group">
                            <label for="">Car Current Milage</label>
                            <input type="text" name="currentmilage" class="form-control"
                                placeholder="Car Current Milage">
                        </div>
                        <div class="form-group">
                            <label for="">Cab Color</label>
                            <input type="text" name="cabcolor" class="form-control" placeholder="Cab Color">
                        </div>
                        <div class="form-group">
                            <label for="">Cab Number</label>
                            <input type="text" name="cabnumber" class="form-control" placeholder="Cab Number">
                        </div>
                        <div class="form-group">
                            <label for="">Car Manufacturing Year</label>
                            <input type="text" name="yearofmanufacture" class="form-control"
                                placeholder="Car Manufacturing Year">
                        </div>
                        <div class="form-group">
                            <label for="">Cab fare</label>
                            <input type="text" name="cabfare" class="form-control" placeholder="Cab Fare">
                        </div>
                        <div class="form-group">
                            <label for="">Car Availability Status</label>
                            <select name="caravailability" class="form-control">
                                <option value="Available">Available</option>
                                <option value="Not Available">Not Available</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="photo">Upload Image:</label>
                            <input type="file" class="form-control-file form-control" id="image" name="photo"
                                accept="image/*" required />
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
                    <h4 class="modal-title">delete Cab Details</h4>
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
                <div class="col-md-6">
                    <h1 class="m-0">Cab Registration</h1>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Cab Registration</li>
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
                        <h3 class="card-title">Cab Registration</h3>
                        <a href="#" data-toggle="modal" data-target="#AddUserModal"
                            class="btn btn-primary float-right btn-sm">Add Cab</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Cab Model</th>
                                    <th>Cab Color</th>
                                    <th>Cab Number</th>
                                    <th>Cab fare</th>
                                    <th>Cab Fuel Type</th>
                                    <th>Car Rental Fee</th>
                                    <th>Car Current Milage</th>
                                    <th>Car Manufacturing Year</th>
                                    <th>Status</th>
                                    <th>Photo</th>
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
                                                <?php echo $row['cabcolor']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['cabnumber']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['cabfare']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['carfueltype']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['carrentalfee']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['currentmilage']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['yearofmanufacture']; ?>
                                            </td>
                                            <td
                                                style="color:white;background-color: <?php echo ($row['caravailability'] === 'Available') ? 'green' : 'red'; ?>">
                                                <?php echo $row['caravailability']; ?>
                                            </td>
                                            <td>
                                                <?php echo '<img src="../uploads/' . $row['photo'] . '" alt="image" width="100">'; ?>
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
            var user_id = $(this).val();

            $(".delete_user_id").val(user_id);
            $('#deleteModel').modal('show');

        });
    });
</script>
<?php include('includes/footer.php'); ?>