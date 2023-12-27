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
                    <h4 class="modal-title">Driver Registration</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form Action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="">Age</label>
                            <input type="text" name="age" class="form-control" placeholder="Age">
                        </div>
                        <div class="form-group">
                            <label for="">Pan card</label>
                            <input type="text" name="'pancard'" class="form-control" placeholder="Age">
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <label for="">Liecense No</label>
                            <input type="text" name="liecenseno" class="form-control" placeholder="Liecense No">
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <label for="">Experiance</label>
                            <input type="text" name="experiance" class="form-control" placeholder="Experiance">
                        </div>
                        <div class="form-group">
                            <label for="">Driver Availability Status</label>
                            <select name="status" class="form-control">
                                <option value="Available">Available</option>
                                <option value="Not Available">Not Available</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Upload Image:</label>
                            <input type="file" class="form-control-file form-control" id="image" name="photo"
                                accept="image/*" required />
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
                <div class="col-md-6">
                    <h1 class="m-0">Driver Registration</h1>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Register Drivers</li>
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
                        <h3 class="card-title">Registered driver</h3>
                        <a href="#" data-toggle="modal" data-target="#AddUserModal"
                            class="btn btn-primary float-right btn-sm">Add Driver</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Age</th>
                                    <th>Phone</th>
                                    <th>Liecense No</th>
                                    <th>Pan card</th>
                                    <th>Address</th>
                                    <th>Experiance</th>
                                    <th>Status</th>
                                    <th>Upload Image</th>
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
                                                <?php echo $row['pancard']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['address']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['experiance']; ?>
                                            </td>
                                            <td
                                                style="color:white;background-color: <?php echo ($row['status'] === 'Available') ? 'green' : 'red'; ?>">
                                                <?php echo $row['status']; ?>
                                            </td>
                                            <td>
                                                <?php echo '<img src="../uploads/' . $row['photo'] . '" alt="image" width="100">'; ?>
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