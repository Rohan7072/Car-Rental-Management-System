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
                    <h4 class="modal-title">Add User</h4>
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
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="">Age</label>
                            <input type="text" name="age" class="form-control" placeholder="Age">
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="Mobile">
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <label for="">Aadhad Number</label>
                            <input type="text" name="aadharnumber" class="form-control" placeholder="Aadhad Number">
                        </div>
                        <div class="form-group">
                            <label for="">Pan No</label>
                            <input type="text" name="panno" class="form-control" placeholder="Pan No">
                        </div>
                        <div class="form-group">
                            <label for="Photo">Photo</label>
                            <input type="text" name="photo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">User Name</label>
                            <input type="text" name="username" class="form-control" placeholder="User Name">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="text" name="pass" class="form-control" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input type="text" name="conpass" class="form-control"
                                        placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="photo">Upload Image:</label>
                            <input type="file" class="form-control-file form-control" id="image" name="photo"
                                accept="image/*" required />
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" name="addUser" class="btn btn-primary">Save</button>
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
                    <h4 class="modal-title">delete User</h4>
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
                        <button type="submit" name="DeleteUser" class="btn btn-primary">Yes, delete</button>
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
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Registered Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
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
                            <h3 class="card-title">Registered Users</h3>
                            <a href="#" data-toggle="modal" data-target="#AddUserModal"
                                class="btn btn-primary float-right btn-sm">Add User</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Age</th>
                                        <th>Phone Number</th>
                                        <th>Address</th>
                                        <th>Aadhar Number</th>
                                        <th>Pan No</th>
                                        <th>Photo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM registration";
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
                                                    <?php echo $row['address']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['aadharnumber']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['panno']; ?>
                                                </td>

                                                <td>
                                                    <?php echo '<img src="../uploads/' . $row['photo'] . '" alt="image" width="100">'; ?>
                                                </td>

                                                <td><a href="register-edit.php?user_id=<?php echo $row['id']; ?>"
                                                        class="btn btn-info btn-sm">Edit</a>

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
    </section>
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