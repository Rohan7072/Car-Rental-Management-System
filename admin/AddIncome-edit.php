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
                    <h1 class="m-0">Edit - Income</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit - Income</li>
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
                            <h3 class="card-title">Edit - Car Income</h3>
                            <a href="cabRegister.php" class="btn btn-danger float-right btn-sm">Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form Action="code.php" method="POST">
                                        <div class="modal-body">
                                            <?php
                                            if (isset($_GET['user_id'])) {
                                                $user_id = $_GET['user_id'];
                                                $sql = "SELECT * FROM cabregistration WHERE id='$user_id' LIMIT 1";
                                                $result = mysqli_query($conn, $sql);

                                                if (mysqli_num_rows($result) > 0) {
                                                    foreach ($result as $row) {

                                                        ?>
                                                        <input type="hidden" name="user_id" value="<?php echo $row['id'] ?>">

                                                        <div class="form-group">
                                                            <label for="">Trip budget Amonut</label>
                                                            <input type="text" name="cabmodel"
                                                                value="<?php echo $row['cabmodel'] ?>" class="form-control"
                                                                placeholder="Cab Model">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Trip service Chanrge</label>
                                                            <input type="text" name="cabmodel"
                                                                value="<?php echo $row['cabmodel'] ?>" class="form-control"
                                                                placeholder="Cab Model">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Add On Service</label>
                                                            <input type="text" name="cabmodel"
                                                                value="<?php echo $row['cabmodel'] ?>" class="form-control"
                                                                placeholder="Cab Model">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Trip KM Charge</label>
                                                            <input type="text" name="cabmodel"
                                                                value="<?php echo $row['cabmodel'] ?>" class="form-control"
                                                                placeholder="Cab Model">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Advanced Payment</label>
                                                            <input type="text" name="cabtype" value="<?php echo $row['cabtype'] ?>"
                                                                class="form-control" placeholder="Cab Type">
                                                        </div>

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