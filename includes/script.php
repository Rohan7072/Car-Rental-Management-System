<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.timepicker.min.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>


<script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>

<script>
document.getElementById("signupLink").addEventListener("click", function() {
    $('#loginModal').modal('hide');
    $('#signupModal').modal('show');
});

document.getElementById("loginLink").addEventListener("click", function() {
    $('#driverSignupModal').modal('hide');
    $('#signupModal').modal('hide');
    $('#loginModal').modal('show');
});

document.getElementById('driverSignupLink').addEventListener('click', function() {
    $('#loginModal').modal('hide'); // Hide the Login modal if it's open
    $('#driverSignupModal').modal('show'); // Show the Driver Signup modal
});

$('#signupModal').on('hidden.bs.modal', function() {
    window.location.href = window.location.href;
});


// Get the current page URL
var currentUrl = window.location.href;

// Get all the navigation links
var navLinks = document.querySelectorAll('ul li a');

// Loop through each navigation link and check if it matches the current URL
navLinks.forEach(function(navLink) {
    if (navLink.href === currentUrl) {
        // Add the 'active' class to the matching navigation link
        navLink.classList.add('active');
    }
});

var map = L.map('map3').setView([18.5913, 73.7389], 13);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
    maxZoom: 18
}).addTo(map);
L.marker([18.5913, 73.7389]).addTo(map);
</script>