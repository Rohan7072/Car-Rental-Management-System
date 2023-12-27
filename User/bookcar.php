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
                    <h1 class="m-0">Car booking</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Car booking</li>
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
                        </div>


                        <!-- <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Car Name</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        placeholder="Car Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Car Fuel Type</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Car Fuel Type">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Car average</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Car average">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Car Passenger seat</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Car Passenger seat">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Car RC Details</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Car RC Details">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Car type</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Car type">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Rental duration</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Rental duration">
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                        </form> -->








                        <!-- Main content -->
                        <section class="content">

                            <!-- Default box -->
                            <div class="card card-solid border-0 rounded-lg">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <?php
                                        $sql = "SELECT * FROM cabregistration WHERE caravailability = 'Available'";
                                        $result = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            foreach ($result as $row) {
                                                ?>
                                        <tr>
                                            <div
                                                class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
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
                                                                        <?php echo $row['cabcolor']; ?>
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

                                                                <a href="bookTrip.php?user_id=<?php echo $row['id']; ?>"
                                                                    class=" btn btn-primary">Rent Now</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </ul>
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
                                        ?>




                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <nav aria-label="Contacts Page Navigation">
                                                <ul class="pagination justify-content-center m-0">
                                                    <li class="page-item active"><a class="page-link" href="#">1</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">7</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">8</a></li>
                                                </ul>
                                            </nav>
                                        </div>
                                        <!-- /.card-footer -->
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