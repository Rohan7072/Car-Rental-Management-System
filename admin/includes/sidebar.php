<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-primary bg-navy  elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="index3.html" class="brand-link">
        <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="./user.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block text-white">Siddhi CarRental Pune</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw text-white"></i>
                    </button>
                </div>
            </div>
        </div> -->

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
                        <p>Registration
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./cabRegister.php" class="nav-link text-white">
                                <i class="far fa-circle nav-icon"></i>
                                <p>CAB Registration</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./driverRegister.php" class="nav-link text-white">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Driver Registration</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./register.php" class="nav-link text-white">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customer Registration</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="./PendingTrip.php" class="nav-link  text-white">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Pending Trip
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="./TripExpenses.php" class="nav-link  text-white">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Trip Expenses
                        </p>
                    </a>
                </li>

                <!-- <li class="nav-item has-treeview">
                    <a href="./TripBooking.php" class="nav-link  text-white">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Trip Booking
                        </p>
                    </a>
                </li> -->

                <!-- <li class="nav-item has-treeview">
                    <a href="#" class="nav-link text-white">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Vehicle & Maintainance
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./AddIncome.php" class="nav-link text-white">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Income</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./AddExpenses.php" class="nav-link text-white">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Expenses</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./VehicleProfiling.php" class="nav-link text-white">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Vehicle Profiling</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="./TripBooking.php" class="nav-link  text-white">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Bill Creation
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link text-white">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Billing Details
                        </p>
                    </a>
                </li> -->

                <!-- <li class="nav-item has-treeview">
                    <a href="./TripBooking.php" class="nav-link  text-white">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Final settlement
                        </p>
                    </a>
                </li> -->

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link text-white">
                        <i class="nav-icon fas fa-book"></i>
                        <p>History
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./TripHistory.php" class="nav-link text-white">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Trip History</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./UserHistory.php" class="nav-link text-white">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User History</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link text-white">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Report
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- <li class="nav-item">
                            <a href="./cabRegister.php" class="nav-link text-white">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Invoice</p>
                            </a>
                        </li> -->

                        <li class="nav-item">
                            <a href="./TripReport.php" class="nav-link text-white">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Receipt</p>
                            </a>
                        </li>
                    </ul>
                </li>

                </br>
                <li class="nav-header">Settings</li>
                <li class="nav-item has-treeview">
                    <a href="./profile.php" class="nav-link text-white">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Company Profile
                            <!-- <span class="badge badge-info right">2</span> -->
                            <!-- <i class="right fas fa-angle-left"></i> -->

                        </p>
                    </a>
                    <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./profile.php" class="nav-link text-white">
                                <i class="far fa-circle nav-icon"></i>
                                <p>My Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./driverRegister.php" class="nav-link text-white">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Change Password</p>
                            </a>
                        </li>
                    </ul> -->
                </li>
                <li class="nav-item">
                    <a href="./logout.php" class="nav-link text-white">
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
</aside>