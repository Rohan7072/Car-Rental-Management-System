<?php
session_start();
include('includes/header.php');
include('includes/top-navbar.php');
include('includes/sidebar.php');
// include('config/dbconn.php');

?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Company Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Company Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="modal fade" id="deleteModel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirm Trip and Generate Bill Receipt</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form Action="billGenerate.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_id" class="delete_user_id">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" name="billGenerate" class="btn btn-primary">Yes</button>
                    </div>
                </form>
            </div> -->
            <!-- /.modal-content -->
        <!-- </div> -->
        <!-- /.modal-dialog -->
    <!-- </div> -->

    <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <!-- Replace the PHP code with static HTML content -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Company Details</h3>
                            </div>

                            <div class="container-fluid">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Company Name</th>
                                            <td>
                                                Siddhi car rental services <!-- Replace with your actual value -->
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Company Address</th>
                                            <td>
                                            Bhatewara Nagar, Hinjawadi Village, Wakad, Pune, Maharashtra 411057 <!-- Replace with your actual value -->
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Contact Number</th>
                                            <td>
                                            +91 7887809708<!-- Replace with your actual value -->
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email Id</th>
                                            <td>
                                            siddhicarrentalpunes <!-- Replace with your actual value -->
                                            </td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                                <div class="card-footer">
                                    <!-- Your additional HTML content here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>


<?php include('includes/script.php'); ?>
<script>
$(document).ready(function() {
    $(".deletebtn").click(function(e) {
        e.preventDefault();
        var tripid = $(this).val();

        $(".delete_user_id").val(tripid);
        $('#deleteModel').modal('show');

    });
});
</script>
<?php include('includes/footer.php'); ?>