<?php
include('includes/header.php');
include('includes/top-navbar.php');


// Check if the user has a previous tripid
if (isset($_SESSION['username'])) {
    // User is logged in, proceed with booking

    $username = $_SESSION['username'];
    $tripid = null;
    if (isset($_SESSION['tripid'])) {
        $tripid = $_SESSION['tripid'];
    } else {
        // If the user doesn't have a previous tripid, try to fetch one from the database
        $query = "SELECT tripid FROM tripregister WHERE customername = '$username' ORDER BY tripid DESC LIMIT 1";
        $tripResult = mysqli_query($conn, $query);
        if ($tripResult && mysqli_num_rows($tripResult) > 0) {
            $tripRow = mysqli_fetch_assoc($tripResult);
            $tripid = $tripRow['tripid'];
        }
    }
    // Set the tripid as a session variable
    $_SESSION['tripid'] = $tripid;
}


?>

<div class="hero-wrap ftco-degree-bg" data-stellar-background-ratio="0.5">

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="images/car-8.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/bg_1.jpg" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/car-1.jpg" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/car-12.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="overlay"></div>
</div>



<section class="ftco-section ftco-no-pt bg-lightblue shadow-lg">
    <div class="container">
        <div class="row ">
            <div class="col-md-12 featured-top">
                <div class="col-md-12 d-flex align-items-center">
                    <div class="services-wrap rounded-right w-100 rounded-lg">
                        <h3 class="heading-section mb-4 text-center">Better Way to Rent Your Perfect Cars</h3>
                        <div class="row d-flex mb-4">
                            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                <div class="services w-100 text-center">
                                    <div class="icon d-flex align-items-center justify-content-center shadow-lg">
                                        <span class="flaticon-route"></span>
                                    </div>
                                    <div class="text w-100">
                                        <h3 class="heading mb-2">Choose Your Pickup Location</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                <div class="services w-100 text-center">
                                    <div class="icon d-flex align-items-center justify-content-center shadow-lg">
                                        <span class="flaticon-rent"></span>
                                    </div>
                                    <div class="text w-100">
                                        <h3 class="heading mb-2">Reserve Your Rental Car</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                <div class="services w-100 text-center">
                                    <div class="icon d-flex align-items-center justify-content-center shadow-lg">
                                        <span class="flaticon-handshake"></span>
                                    </div>
                                    <div class="text w-100">
                                        <h3 class="heading mb-2">Select the Best Deal</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-md-12 d-flex justify-content-center align-items-center">
                                <form action="login.php" method="POST"
                                    class="request-form ftco-animate bg-primary shadow-lg">
                                    <h2>Make your trip</h2>
                                    <div class="form-group">
                                        <label for="" class="label">Pick-up location</label>
                                        <input type="text" class="form-control" name="pickupaddress"
                                            placeholder="City, Airport, Station, etc" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="label">Drop-off location</label>
                                        <input type="text" class="form-control" name="dropoffadress"
                                            placeholder="City, Airport, Station, etc" required>
                                    </div>

                                    <div class="d-flex">
                                        <div class="form-group mr-2">
                                            <label for="" class="label">Pick-up date</label>
                                            <input type="datetime-local" class="form-control" name="pickupdate"
                                                required>
                                        </div>
                                        <div class="form-group ml-2">
                                            <label for="" class="label">Drop-off date</label>
                                            <input type="datetime-local" class="form-control" name="dropoffdate"
                                                required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="label"></label>
                                        <input type="hidden" value="00:00" name="pickuptime" class="form-control"
                                            required>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" name="booktrip" value="Rent A Car Now"
                                            class="btn btn-secondary py-3 px-4" required>
                                    </div>
                                </form>
                            </div>
                            <!---->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
var today = new Date().toISOString().slice(0, 16);
document.getElementsByName("pickupdate")[0].min = today;
document.getElementsByName("dropoffdate")[0].min = today;

</script>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <?php
            $sql = "SELECT * FROM cabregistration WHERE caravailability = 'Available'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                foreach ($result as $row) {
                    ?>
            <div class="col-md-4">
                <div class="car-wrap rounded ftco-animate">
                    <div class="img rounded d-flex align-items-end">
                        <?php echo '<img src="uploads/' . $row['photo'] . '" alt="image" width="200" height="200" class="w-100">'; ?>

                    </div>
                    <div class="text">
                        <h2 class="mb-0"><a href="car-single.php">
                                <?php echo $row['cabmodel']; ?>
                            </a></h2>
                        <div class="d-flex mb-3">
                            <span class="cat">Cheverolet</span>
                            <p class="price ml-auto">Rs.
                                <?php echo $row['carrentalfee']; ?><span>Per day</span>
                            </p>
                        </div>
                        <p class="d-flex mb-0 d-block">
                            <a href="car-single.php?car_id=<?php echo $row['id']; ?>"
                                class="btn btn-secondary py-2 ml-1">Details</a>
                        </p>
                    </div>
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
            ?>
        </div>
    </div>
</section>

<section class="ftco-section ftco-about">
    <div class="container">
        <div class="row">
            <div class="col-md-6 p-md-5 img img-3 d-flex justify-content-center align-items-center ">
                <div class="img-wrapper">
                    <img src="images/about.png" class="img-fluid" alt="Responsive Image"
                        style="  position: relative; top: 0;">
                </div>
            </div>
            <div class="col-md-6 wrap-about ftco-animate">
                <div class="heading-section heading-section-white pl-md-5">
                    <span class="subheading">About us</span>
                    <h2 class="mb-4">Welcome to CarRental</h2>
                    <p>We are a technology-driven company that specializes in providing innovative solutions for the cab
                        and
                        transportation industry. Our Cab Management System is designed to streamline operations, enhance
                        efficiency, and improve the overall experience for both cab operators and passengers.

                        <br><br>Our mission is to revolutionize the way cab services are managed and operated. We
                        understand the
                        challenges faced by cab operators in terms of fleet management, booking management, and tracking
                        systems.
                        Therefore, we have developed a comprehensive software solution that addresses these pain points
                        and
                        empowers cab companies to optimize their operations.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Services</span>
                <h2 class="mb-3">Our Latest Services</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="services services-2 w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span
                            class="flaticon-wedding-car"></span>
                    </div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">Wedding Ceremony</h3>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="services services-2 w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span
                            class="flaticon-transportation"></span></div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">City Transfer</h3>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="services services-2 w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span
                            class="flaticon-car"></span></div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">Airport Transfer</h3>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="services services-2 w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span
                            class="flaticon-transportation"></span></div>
                    <div class="text w-100">
                        <h3 class="heading mb-2">Whole City Tour</h3>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-intro" style="background-image: url(images/bg_2.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-6 heading-section heading-section-white ftco-animate">
                <h2 class="mb-3">Do You Want To Earn With Us? So Don't Be Late.</h2>
                <!-- <a href="#" class="btn btn-primary btn-lg">Become A Driver</a> -->
            </div>
        </div>
    </div>
</section>


<section class="ftco-section testimony-section bg-lightblue">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Testimonial</span>
                <h2 class="mb-3">Happy Clients</h2>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel ftco-owl">
                    <div class="item">
                        <div class="testimony-wrap rounded text-center py-4 pb-5">
                            <div class="user-img mb-2" style="background-image: url(images/suraj.jpeg)">
                            </div>
                            <div class="text pt-4">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia
                                    and
                                    Consonantia, there live the blind texts.</p>
                                <p class="name">Suraj Giri</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap rounded text-center py-4 pb-5">
                            <div class="user-img mb-2" style="background-image: url(images/rupesh.jpeg)">
                            </div>
                            <div class="text pt-4">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia
                                    and
                                    Consonantia, there live the blind texts.</p>
                                <p class="name">Rupesh Gundale</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap rounded text-center py-4 pb-5">
                            <div class="user-img mb-2" style="background-image: url(images/mayur.jpeg)">
                            </div>
                            <div class="text pt-4">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia
                                    and
                                    Consonantia, there live the blind texts.</p>
                                <p class="name">Mayur Zambare</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap rounded text-center py-4 pb-5">
                            <div class="user-img mb-2" style="background-image: url(images/jay.jpeg)">
                            </div>
                            <div class="text pt-4">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia
                                    and
                                    Consonantia, there live the blind texts.</p>
                                <p class="name">Jay Parsi</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap rounded text-center py-4 pb-5">
                            <div class="user-img mb-2" style="background-image: url(images/ganesh.jpg)">
                            </div>
                            <div class="text pt-4">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia
                                    and
                                    Consonantia, there live the blind texts.</p>
                                <p class="name">Ganesh satare</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-counter ftco-section img bg-light" id="section-counter">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                    <div class="text text-border d-flex align-items-center">
                        <strong class="number" data-number="8">0</strong>
                        <span>Year <br>Experienced</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                    <div class="text text-border d-flex align-items-center">
                        <strong class="number" data-number="10">0</strong>
                        <span>Total <br>Cars</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                    <div class="text text-border d-flex align-items-center">
                        <strong class="number" data-number="113">0</strong>
                        <span>Happy <br>Customers</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                    <div class="text d-flex align-items-center">
                        <strong class="number" data-number="1">0</strong>
                        <span>Total <br>Branches</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php include('includes/script.php'); ?>
<?php include('includes/footer.php'); ?>