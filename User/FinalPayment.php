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
                    <h1 class="m-0">Final Payment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Final Payment</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModel">
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
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <?php
                    if (isset($_SESSION['status'])) {

                        echo "<h4>" . $_SESSION['status'] . "</h4>";
                        unset($_SESSION['status']);
                    }
                    ?>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Final Payment</h3>
                        </div>

                        <div class="container-fluid">
                            <table class="table">
                                <tbody>
                                    <?php
                                    if (isset($_GET['user_id'])) {

                                        $user_id = $_GET['user_id'];

                                        $sql = "SELECT * FROM tripregister where tripid='$user_id'";
                                        $result = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            foreach ($result as $row) {

                                                ?>
                                                <tr>
                                                    <th scope="row">Car Rental Fee</th>
                                                    <td>
                                                        Rs.
                                                        <?php echo $row['carrentalfee']; ?> per Day
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Car Rate Per KM</th>
                                                    <td>
                                                        <?php echo $row['tripratekm']; ?> per KM
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Total Trip Kilometers</th>
                                                    <td>
                                                        <?php echo $row['tripkilometers']; ?> KM
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Taxable Amount (Excluding Tax)</th>
                                                    <td>
                                                        <?php
                                                        $carRentalFee = $row['carrentalfee']; // Assuming $row['carrentalfee'] holds the car rental fee
                                                        $tripRatePerKm = $row['tripratekm']; // Assuming $row['tripratekm'] holds the trip rate per kilometer
                                                        $tripKilometers = $row['tripkilometers']; // Assuming $row['tripkilometers'] holds the total trip kilometers
                                            
                                                        $totalAmount = $carRentalFee + ($tripRatePerKm * $tripKilometers);
                                                        echo number_format($totalAmount, 2); // Display the total amount, rounded to 2 decimal places
                                                        ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">Taxes</th>
                                                    <td>
                                                        5%
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Total Amount (GST added)</th>
                                                    <td>
                                                        <?php
                                                        $gstRate = 5; // GST rate in percentage
                                                        $gstAmount = ($totalAmount * $gstRate) / 100;
                                                        $totalAmountWithGST = $totalAmount + $gstAmount;
                                                        echo "Rs. " . number_format($totalAmountWithGST, 2); // Display the total amount with GST, rounded to 2 decimal places
                                                        ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">Security Deposit Amount(Refundable)</th>
                                                    <td>
                                                        <?php

                                                        echo "Rs. " . number_format($totalAmountWithGST - 10000, 2); // Display the total amount with GST, rounded to 2 decimal places
                                                        ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">Total Amount To Be Paid</th>
                                                    <td>
                                                        <?php

                                                        echo "Rs. 10,000"; // Display the total amount with GST, rounded to 2 decimal places
                                                        ?>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        <div class="card-footer">
                                            <?php $temp = $row['payment_status']; ?>

                                            <?php if ($temp == 1) { ?>
                                                <button type="button" value="<?php echo $row['tripid']; ?>"
                                                    class="btn btn-primary deletebtn">Confirm Trip</button>
                                            <?php } elseif ($temp == 0) { ?>
                                                <form>
                                                    <script src="https://checkout.razorpay.com/v1/payment-button.js"
                                                        data-payment_button_id="pl_MLInlDQcdqk06f" onclick="update();" async> </script>

                                                    <script>
                                                        function update() {
                                                            <?php $sql = "UPDATE tripregister SET payment_status= 1 WHERE tripid='$user_id'";

                                                            if (mysqli_query($conn, $sql)) {



                                                                header("Location: FinalPayment.php");
                                                                exit();
                                                            } else {
                                                                echo "Error: " . mysqli_error($conn);
                                                            }
                                                            ?>
                                                        }
                                                    </script>

                                                </form>

                                            <?php } ?>
                                        </div>
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
        </div>
    </section>
</div>


<?php include('includes/script.php'); ?>
<script>
    $(document).ready(function () {
        $(".deletebtn").click(function (e) {
            e.preventDefault();
            var tripid = $(this).val();

            $(".delete_user_id").val(tripid);
            $('#deleteModel').modal('show');

        });
    });
</script>
<?php include('includes/footer.php'); ?>