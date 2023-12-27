<?php
include('includes/header.php');
include('includes/top-navbar.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name=$_POST['cust_name'];
    $email=$_POST['cust_email'];
    $message=$_POST['cust_message'];
    $sql = "INSERT INTO `contact`(`id`, `name`, `email`, `message`) VALUES (0,'$name','$email','$message')";
              if(mysqli_query($conn, $sql)){
                ?><script>
alert("We Will REACH OUT TO YOU SOON !");
</script><?php
              }else{
                echo mysqli_error($conn);
              }
}
?>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_4.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row  slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs">
                    <span class="mr-2">
                        <a href="index.php">Home
                            <i class="ion-ios-arrow-forward"></i></a>
                    </span>
                    <span>Contact <i class="ion-ios-arrow-forward"></i></span>
                </p>
                <h1 class="mb-3 bread">Contact Us</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-4">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-map-o"></span>
                            </div>
                            <p><span>Address:</span> Bhatewara Nagar, Hinjawadi Village, Wakad, Pune, Maharashtra 411057
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-mobile-phone"></span>
                            </div>
                            <p><span>Phone:</span> <a href="tel://0788 780 9708">0788 780 9708 </a></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-envelope-o"></span>
                            </div>
                            <p><span>Email:</span> <a
                                    href="mailto:siddhicarrentalpune@gmail.com">siddhicarrentalpune</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 block-9 mb-md-5">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="bg-light p-5 contact-form" Method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Name" name="cust_name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Email" name="cust_email">
                    </div>
                    <!-- <div class="form-group">
                        <input type="text" class="form-control" placeholder="Subject">
                    </div> -->
                    <div class="form-group">
                        <textarea id="" cols="30" rows="7" class="form-control" placeholder="Message"
                            name="cust_message"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                    </div>
                </form>
            </div>
        </div>


        <!-- <div id="map3" style="height: 400px;"></div> -->


        <div class="row">
            <div class="col-md-12">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d121007.90626804283!2d73.59396519726562!3d18.596699300000008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bb97feb7ff91%3A0x3934830944136423!2sSiddhi%20Car%20Rental%20Services!5e0!3m2!1sen!2sin!4v1689097131706!5m2!1sen!2sin"
                    width="1120" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    </div>



</section>


<?php include('includes/script.php'); ?>
<?php include('includes/footer.php'); ?>