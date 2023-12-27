<?php
include('config/dbconn.php');
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-primary bg-primary  elevation-4">

    <?php
    if (isset($_SESSION['use_id'])) {
        $use_id = $_SESSION['use_id'];
        $sql = "SELECT * FROM driverregistration Where id='$use_id'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            foreach ($result as $row) {

                ?>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
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
                            Driver Dashboard
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
                            <a href="./AllotedTrip.php" class="nav-link text-white">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Trip Details</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="./AllotedTripHistory.php" class="nav-link text-white">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Trip History</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./DriverIncomeExpenses.php" class="nav-link text-white">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Trip Expenses</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- <li class="nav-item has-treeview">
                    <a href="#" class="nav-link text-white">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Vehicle & Maintainance
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./NextMaintainance.php" class="nav-link text-white">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Next Maintainance</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./AddExpenses.php" class="nav-link text-white">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Maintainance History</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="./Earning&Payment.php" class="nav-link text-white">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Earning & Payment
                        </p>
                    </a>
                </li> -->

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link text-white">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Contact Support
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./roadsideassistance.php" class="nav-link text-white">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Roadside Assistance</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="./support.php" class="nav-link text-white">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Support Number</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="./MyDetails.php" class="nav-link text-white">
                        <i class="nav-icon fas fa-book"></i>
                        <p>My Details
                        </p>
                    </a>
                </li>

                </br>
                <li class="nav-header">Settings</li>

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