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
                    <h1 class="m-0">Trip booking</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Confirm booking</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <?php
                if (isset($_SESSION['status'])) {

                    echo "<h4>" . $_SESSION['status'] . "</h4>";
                    unset($_SESSION['status']);
                }
                ?>
                <div class="col-md-12">

                    <div class="card card-primary">
                        <div class="card-header">
                        </div>
                        <!-- Main content -->
                        <section class="content">

                            <!-- Default box -->
                            <div class="card card-solid border-0 rounded-lg">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <?php

                                        if (isset($_GET['user_id'])) {

                                            $user_id = $_GET['user_id'];

                                            $sql = "SELECT * FROM cabregistration where id='$user_id'";
                                            $result = mysqli_query($conn, $sql);

                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                        <tr>
                                            <div class="col-6 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                                <ul class="featured-car-list">

                                                    <div class="featured-car-card shadow-lg rounded-lg">
                                                        <figure class="card-banner">
                                                            <?php echo '<img src="../uploads/' . $row['photo'] . '" alt="image" width="440" height="300" class="w-100">'; ?>

                                                        </figure>

                                                        <div class="card-content">
                                                            <div class="card-title-wrapper">
                                                                <h3 class="h3 card-title">
                                                                    <a href="#">
                                                                        <?php echo $row['cabmodel']; ?>
                                                                    </a>
                                                                </h3>
                                                                <h3 class="year h3 card-title mr-5">
                                                                    <a href="#">
                                                                        Rs.
                                                                        <?php echo $row['carrentalfee']; ?> Per Day
                                                                    </a>
                                                                </h3>

                                                                <data class="year" value="2021">
                                                                    <?php echo $row['yearofmanufacture']; ?>
                                                                </data>


                                                            </div>

                                                            <ul class="card-list">
                                                                <li class="card-list-item">
                                                                    <ion-icon name="people-outline">
                                                                    </ion-icon>

                                                                    <span class="card-item-text">5
                                                                        People</span>
                                                                </li>

                                                                <li class="card-list-item">
                                                                    <ion-icon name="flash-outline">
                                                                    </ion-icon>

                                                                    <span class="card-item-text">
                                                                        <?php echo $row['carfueltype']; ?>
                                                                    </span>
                                                                </li>

                                                                <li class="card-list-item">
                                                                    <ion-icon name="speedometer-outline">
                                                                    </ion-icon>

                                                                    <span class="card-item-text">
                                                                        <?php echo $row['currentmilage']; ?>
                                                                    </span>
                                                                </li>

                                                                <li class="card-list-item">
                                                                    <ion-icon name="hardware-chip-outline">
                                                                    </ion-icon>

                                                                    <span class="card-item-text">
                                                                        <?php echo $row['cabnumber']; ?>
                                                                    </span>
                                                                </li>
                                                            </ul>

                                                            <div class="card-price-wrapper">
                                                                <p class="card-price">
                                                                    <strong>RS.
                                                                        <?php echo $row['cabfare']; ?>
                                                                    </strong>
                                                                    /
                                                                    per KM
                                                                </p>

                                                                <button class="btn fav-btn"
                                                                    aria-label="Add to favourite list">
                                                                    <ion-icon name="heart-outline">
                                                                    </ion-icon>
                                                                </button>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </ul>
                                            </div>



                                            <div class="col-6">
                                                <form Action="code.php" method="POST">
                                                    <?php
                                                                if (isset($_SESSION['use_id'])) {

                                                                    $user_id = $_SESSION['use_id'];

                                                                    $sql = "SELECT * FROM registration WHERE id='$user_id'";
                                                                    $result = mysqli_query($conn, $sql);

                                                                    if (mysqli_num_rows($result) > 0) {
                                                                        while ($row = mysqli_fetch_assoc($result)) {

                                                                            ?>

                                                    <div class="form-group">
                                                        <label for="">Name</label>
                                                        <input type="text" name="customername"
                                                            value="<?php echo $row['name'] ?>" class="form-control"
                                                            placeholder="Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Email</label>
                                                        <input type="email" name="customeremail"
                                                            value="<?php echo $row['email'] ?>" class="form-control"
                                                            placeholder="Email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Phone</label>
                                                        <input type="text" name="customerphone"
                                                            value="<?php echo $row['phone'] ?>" class="form-control"
                                                            placeholder="Phone">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Address</label>
                                                        <input type="text" name="customeraddress"
                                                            value="<?php echo $row['address'] ?>" class="form-control"
                                                            placeholder="Address">
                                                    </div>

                                                    <?php

                                                                            if (isset($_GET['user_id'])) {

                                                                                $user_id = $_GET['user_id'];

                                                                                $sql = "SELECT * FROM cabregistration where id='$user_id'";
                                                                                $cabResult = mysqli_query($conn, $sql);
                                                                                if (mysqli_num_rows($cabResult) > 0) {
                                                                                    while ($cabRow = mysqli_fetch_assoc($cabResult)) {
                                                                                        echo '<input type="hidden" name="cabmodel" value="' . $cabRow['cabmodel'] . '">';
                                                                                        echo '<input type="hidden" name="cabnumber" value="' . $cabRow['cabnumber'] . '">';
                                                                                        echo '<input type="hidden" name="cabfare" value="' . $cabRow['cabfare'] . '">';
                                                                                        echo '<input type="hidden" name="carrentalfee" value="' . $cabRow['carrentalfee'] . '">';


                                                                                    }
                                                                                }
                                                                            }
                                                                            ?>


                                                    <div class="card-footer">
                                                        <button type="submit" name="updateTripRegister"
                                                            class="btn btn-primary">Confirm
                                                            Car Booking</button>
                                                    </div>


                                                    <?php
                                                                        }
                                                                    } else {
                                                                        echo "<h4> No Records Found </h4>";

                                                                    }

                                                                } else {
                                                                    echo $_SESSION['tripid'] . "tripid ID not set in SESSION!"; // Debug output if trip ID is not set
                                                                }

                                                                ?>
                                                </form>


                                            </div>

                                            <?php
                                                }
                                            } else {
                                                ?>
                                        <tr>
                                            <td>No Record Found</td>
                                        </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->

                        </section>
                        <!-- /.content -->
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