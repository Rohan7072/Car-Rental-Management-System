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
                    <h1 class="m-0">Edit - Cab Registered</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit - Cab Registered</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit - Car Registered</h3>
                            <a href="cabRegister.php" class="btn btn-danger float-right btn-sm">Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form Action="code.php" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <?php
                                            if (isset($_GET['user_id'])) {
                                                $user_id = $_GET['user_id'];
                                                $sql = "SELECT * FROM cabregistration WHERE id='$user_id'";
                                                $result = mysqli_query($conn, $sql);

                                                if (mysqli_num_rows($result) > 0) {
                                                    foreach ($result as $row) {

                                                        ?>
                                            <input type="hidden" name="user_id" value="<?php echo $row['id'] ?>">

                                            <div class="form-group">
                                                <label for="">Cab Model</label>
                                                <input type="text" name="cabmodel"
                                                    value="<?php echo $row['cabmodel'] ?>" class="form-control"
                                                    placeholder="Cab Model">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Cab Fuel Type</label>
                                                <input type="text" name="carfueltype"
                                                    value="<?php echo $row['carfueltype'] ?>" class="form-control"
                                                    placeholder="Cab Fuel Type">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Car Rental Fee</label>
                                                <input type="text" name="carrentalfee"
                                                    value="<?php echo $row['carrentalfee'] ?>" class="form-control"
                                                    placeholder="Car Rental Fee">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Car Current Milage</label>
                                                <input type="text" name="currentmilage"
                                                    value="<?php echo $row['currentmilage'] ?>" class="form-control"
                                                    placeholder="Car Current Milage">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Cab Color</label>
                                                <input type="text" name="cabcolor"
                                                    value="<?php echo $row['cabcolor'] ?>" class="form-control"
                                                    placeholder="Cab Color">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Cab Number</label>
                                                <input type="text" name="cabnumber"
                                                    value="<?php echo $row['cabnumber'] ?>" class="form-control"
                                                    placeholder="Cab Number">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Cab fare</label>
                                                <input type="text" name="cabfare" value="<?php echo $row['cabfare'] ?>"
                                                    class="form-control" placeholder="Cab fare">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Car Manufacturing Year</label>
                                                <input type="text" name="yearofmanufacture"
                                                    value="<?php echo $row['yearofmanufacture'] ?>" class="form-control"
                                                    placeholder="Car Manufacturing Year">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Car Availability Status</label>
                                                <select name="caravailability" class="form-control">
                                                    <option value="Available"
                                                        <?php if ($row['caravailability'] === 'Available') echo 'selected'; ?>>
                                                        Available</option>
                                                    <option value="Not Available"
                                                        <?php if ($row['caravailability'] === 'Not Available') echo 'selected'; ?>>
                                                        Not Available</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="photo">Upload Photo:</label>
                                                <input type="file" class="form-control-file form-control" id="image"
                                                    name="photo" accept="image/*" />
                                            </div>
                                            <?php echo '<img src="../uploads/' . $row['photo'] . '" alt="image" width="200">'; ?>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="submit" name="updateCab" class="btn btn-info">Update</button>
                                        </div>

                                        <?php
                                                    }
                                                } else {
                                                    echo "<h4> No Records Found </h4>";

                                                }

                                            }

                                            ?>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?php include('includes/footer.php'); ?>
<?php include('includes/script.php'); ?>