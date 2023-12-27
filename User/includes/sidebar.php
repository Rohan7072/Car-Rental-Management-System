<?php
include('config/dbconn.php');
?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-primary bg-primary  elevation-4">

    <?php
    if (isset($_SESSION['use_id'])) {
        $use_id = $_SESSION['use_id'];
        $sql = "SELECT * FROM registration Where id='$use_id'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            foreach ($result as $row) {

                ?>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php echo '<img src="../uploads/' . $row['photo'] . '" class="img-circle elevation-2" alt="User Image">'; ?>
            </div>
            <div class="info">
                <a href="#" class="d-block text-white">
                    <?php echo $row['username']; ?>
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2 ">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="./index.php" class="nav-link bg-white">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>


                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link text-white">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Trip
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./bookcar.php" class="nav-link text-white">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Car Book</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./CurrentTrip.php" class="nav-link text-white">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Current Trip</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="./TripHistory.php" class="nav-link text-white">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Trip History</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- <li class="nav-item has-treeview">
                    <a href="./PayAdvance.php" class="nav-link text-white">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Pay Advance
                        </p>
                    </a>
                </li> -->

                <li class="nav-item has-treeview">
                    <a href="./FinalPayment.php" class="nav-link text-white">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Final Payment
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="./company.php" class="nav-link text-white">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Company Details
                        </p>
                    </a>
                </li>

                </br>
                <li class="nav-header">Settings</li>
                <li class="nav-item has-treeview">
                    <a href="pages/calender.html" class="nav-link text-white">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            My Profile
                            <i class="right fas fa-angle-left"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./MyDetails.php" class="nav-link text-white">
                                <i class="far fa-circle nav-icon"></i>
                                <p>My Details</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link text-white">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
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
</aside>