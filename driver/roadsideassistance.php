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
                    <h1 class="m-0">Roadside Assistance Contacts</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Roadside Assistance</li>
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
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Contact Number</th>
                                        <th>Address</th>
                                        <!-- <th>Pickup Address</th>
                                        <th>Drop Address</th>
                                        <th>Customer Name</th>
                                        <th>Trip Route</th>
                                        <th>Trip Time</th>
                                        <th>Trip KM</th>
                                        <th>carno</th>
                                        <th>carname</th>
                                        <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                   

                                                <tr>
                                                    <td>
                                                    Car Towing Service & Jumpstart
                                                    </td>
                                                    <td>
                                                    8398970970
                                                    </td>
                                                    <td>
                                                    1, B 1, 1, Finolex Colony, Nandadeep Colony, Kalewadi, Pimpri-Chinchwad, Maharashtra 411017
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    Shree Swami Towing Service
                                                    </td>
                                                    <td>
                                                    7091191188
                                                    </td>
                                                    <td>
                                                    Sr.No. 25/1/1, A2 Suvarna Park, Dapodi Rd, Pimple Gurav, Pune, Maharashtra 411061
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    Spanwings Breakdown Service - Towing Service
                                                    </td>
                                                    <td>
                                                    7262911911
                                                    </td>
                                                    <td>
                                                    73/1 B, Finolex Colony, Gajraj Colony 2, Kalewadi, Pune, Maharashtra 411017
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    Mayur towing service
                                                    </td>
                                                    <td>
                                                    9822141922
                                                    </td>
                                                    <td>
                                                    Pune mumbai express way Lonavala, to, Pune, Maharashtra 410405
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    Anmol Towing Service - Towing service in Yerawada Pune
                                                    </td>
                                                    <td>
                                                    7719817799
                                                    </td>
                                                    <td>
                                                    Len no 22, Laxmi Nagar, Yerawada, Pune, Maharashtra 411006
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    Road Ranger
                                                    </td>
                                                    <td>
                                                    7208400500
                                                    </td>
                                                    <td>
                                                    Plot No: 80, Shop No : 18 ,Hari Om Complex, Sector 18, Kamothe, Navi Mumbai, Maharashtra 410209
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    A1 Towing Services
                                                    </td>
                                                    <td>
                                                     9767210044
                                                    </td>
                                                    <td>
                                                    Old Mumbai - Pune Highway Near Kaveri farm, crystal garden society, Lonavala, Maharashtra 410401
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    Safe Towing Service
                                                    </td>
                                                    <td>
                                                    9881874088
                                                    </td>
                                                    <td>
                                                    Kavadewadi, Koregaon Park, Pune, Maharashtra 411028
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    Maharashtra Motors and Car Towing Serives
                                                    </td>
                                                    <td>
                                                    7709544169
                                                    </td>
                                                    <td>
                                                    Shop No, 12, Ganga Dham Rd, opp. Tata Motors, Gaganvihar, Market Yard, Gultekadi, Pune, Maharashtra 411037
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    GoMechanic - Car Towing
                                                    </td>
                                                    <td>
                                                    8398970970
                                                    </td>
                                                    <td>
                                                    Old Mumbai Pune Hwy, Next To Nashik Phata, opp. Dai-ichi Company, Kasarwadi, Pune, Maharashtra 411034
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    Towing Service In Airport Road Yerawada pune - Call Anmol Towing
                                                    </td>
                                                    <td>
                                                    7719827799
                                                    </td>
                                                    <td>
                                                    Airport Rd, Yerawada, Pune, Maharashtra 411014
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    Patel roadside assistance
                                                    </td>
                                                    <td>
                                                    8433543341
                                                    </td>
                                                    <td>
                                                    Shop no 10, Near, Western Express Hwy, Malad, Kasam Baug, East, Mumbai, Maharashtra 400097
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    PLUS MECHANIC
                                                    </td>
                                                    <td>
                                                    7718962094
                                                    </td>
                                                    <td>
                                                    Gala no 2,old mumbai pune road Kolkhe,tal, Dist, Panvel, Maharashtra 410221
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    RAJ ROADSIDE ASSISTANCE CRANE SERVICE
                                                    </td>
                                                    <td>
                                                    7768074539
                                                    </td>
                                                    <td>
                                                    Shop No 17, Dengale Bridge, road, near Shaniwar Wada, Kumbar Wada, Kasba Peth, Pune, Maharashtra 411030
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    Jyotiba Towing Services - Towing Services Pune
                                                    </td>
                                                    <td>
                                                    9175023270
                                                    </td>
                                                    <td>
                                                    Sukhakarta apt, near Parvati udyan, Gandhi Peth, Chinchwad Gaon, Chinchwad, Pune, Maharashtra 411033
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    SHIVMALHAR CAR TOWING SERVICES
                                                    </td>
                                                    <td>
                                                    9867148514
                                                    </td>
                                                    <td>
                                                    Geeta Nagar Phase VII, Shop No. 56, Geeta Surabhi CHSL, Below Flyover Bridge, Mira Road East, Maharashtra 401107
                                                    </td>
                                                </tr>

                                                 
                                                
                                                
                                        <!-- <tr>
                                            <td>No Record Found</td>
                                        </tr>
                                         -->
                                        <?php
                                    

                                    ?>

                                <tbody>
                            </table>
                            <!-- <div class="card-footer">
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
                                        </div> -->
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