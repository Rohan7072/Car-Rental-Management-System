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
                    <h1 class="m-0">Emergency Contacts</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Emergency Contacts</li>
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
                                        <th>Department</th>
                                        <th>Contact Number</th>
                                        <!-- <th>Address</th> -->
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
                                                    NATIONAL HIGHWAY HELPLINE
                                                    </td>
                                                    <td>
                                                    1033 
                                                    </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>
                                                    Police 
                                                    </td>
                                                    <td>
                                                    100
                                                    </td>
                                                   
                                                </tr>
                                                <tr>
                                                    <td>
                                                    Fire
                                                    </td>
                                                    <td>
                                                    101
                                                    </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>
                                                    Ambulance 
                                                    </td>
                                                    <td>
                                                    108/102
                                                    </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>
                                                    Disaster Management
                                                    </td>
                                                    <td>
                                                    1078
                                                    </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>
                                                    National Highway Authority
                                                    </td>
                                                    <td>
                                                    1800-11-6062
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