<!doctype html>


<html lang="en">
  <head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="GYm,fitness,business,company,agency,multipurpose,modern,bootstrap4">
  
  <meta name="author" content="Themefisher.com">

  <title>GymFit| Fitness template</title>

 
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="plugins/icofont/icofont.min.css">
  
  <link rel="stylesheet" href="plugins/themify/css/themify-icons.css">
  
  <link rel="stylesheet" href="plugins/animate-css/animate.css">
  
  <link rel="stylesheet" href="plugins/magnific-popup/dist/magnific-popup.css">
  
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css">
  <link rel="stylesheet" href="css/style.css">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>
<body>

<?php
	include "inc/header.php";
?>

<?php
    include "config/db.php";

     session_start();

     // Check if the user is logged in
     if (!isset($_SESSION["id"])) {
         // Redirect to the login page if not logged in
         header("Location: login.php");
         exit();
     }
 
     // Retrieve the doctor's name from the URL
     $doctorName = isset($_GET['doctor']) ? urldecode($_GET['doctor']) : '';

     if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Validate and sanitize input data
      $appointmentDate = $_POST["appointment_date"];
      $appointmentTime = $_POST["appointment_time"];
      $phone = $_POST["phone"];
  
      // Insert the appointment into the database
      $memberId = $_SESSION["id"]; // Assuming you store the member ID in the session
  
      // Prepare and execute the SQL query
      $sql = "INSERT INTO appointments (doctor_name, appointment_date, appointment_time, phone, member_id)
              VALUES ('$doctorName', '$appointmentDate', '$appointmentTime', '$phone', '$memberId')";
  
      if ($conn->query($sql) === TRUE) {
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Appointment Booked',
            text: 'Appointment booked successfully!',
        }).then(() => {
            // Redirect to the index page
            window.location.href = 'index.php';
        });
     </script>";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
  
      // Close the database connection
      $conn->close();
  }
?>

<div class="main-wrapper ">
<section class="page-title bg-2">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
          <ul class="list-inline mb-0">
            <li class="list-inline-item"><a href="index.html" class="text-sm letter-spacing text-white text-uppercase font-weight-bold">Home</a></li>
            <li class="list-inline-item"><span class="text-white">|</span></li>
            <li class="list-inline-item"><a href="#" class="text-color text-uppercase text-sm letter-spacing">Doctors</a></li>
          </ul>
           <h1 class="text-lg text-white mt-2">Doctors</h1>
      </div>
    </div>
  </div>
</section>

<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Book an Appointment
                    </div>
                    <div class="card-body">
                        <!-- Appointment Booking Form -->
                        <form action="#" method="post">
                            <div class="form-group">
                                <label for="datepicker">Select Date:</label>
                                <input type="date" class="form-control" id="datepicker" placeholder="Select date"
                                    name="appointment_date" required>
                            </div>
                            <div class="form-group">
                                <label for="timepicker">Select Time:</label>
                                <input type="time" class="form-control" id="timepicker" placeholder="Select time"
                                    name="appointment_time" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number:</label>
                                <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number"
                                    name="phone" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Book Appointment</button>
                        </form>
                        <!-- End Appointment Booking Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Section Team End -->

<!-- footer Start -->
<footer class="footer bg-black-50">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
				<h2 class="text-white mb-4">AJGym</h2>
				<p>Visit Us Today

					Explore our website to learn more about our offerings, class schedules, membership options, and more. Join us today and embark on a journey to a healthier and more vibrant you. Contact us to schedule a tour, sign up for a class, or simply get more information. We can't wait to be part of your fitness journey!.</p>

				
			</div>
			

			<div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
				<div class="footer-widget recent-blog">
					<h4 class="mb-4 text-white letter-spacing text-uppercase">Recents Posts</h4>
					<div>
						<a href=""class="text-white">"Elevate Your Fitness Game! 💪

							💡 Discover tailored workouts, mental wellness, and doctor-guided fitness on our Gym Management System. Join our fitness community today! 🚀 #FitLife #WellnessJourney" 🌟</a>
						<p class="text-sm mt-2 text-white-50"></p>
					</div>

				</div>
			</div>
			<div class="col-lg-2 col-md-5 mb-5 mb-lg-0">
				<div class="footer-widget">
					<h4 class="mb-4 text-white letter-spacing text-uppercase">Quick Links</h4>
					<ul class="list-unstyled footer-menu lh-40 mb-0">
						<li><a href="about.html"><i class="ti-angle-double-right mr-2"></i>About Us</a></li>
						<li><a href="service.html"><i class="ti-angle-double-right mr-2"></i>Services</a></li>
						<li><a href="pricing.html"><i class="ti-angle-double-right mr-2"></i>Membership</a></li>
						<li><a href="course.html"><i class="ti-angle-double-right mr-2"></i>Courses</a></li>
						<li><a href="contact.html"><i class="ti-angle-double-right mr-2"></i>Contact us</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-5">
				<div class="footer-widget">
					<h4 class="mb-4 text-white letter-spacing text-uppercase">Home location</h4>
					<p>196/B ST/THOMAS Road Moratuwa
		                                            </p>
					<span class="text-white">0577654325</span>
					
				</div>
			</div>
		</div>

		<div class="row align-items-center mt-5 px-3 bg-black mx-1">
			<div class="col-lg-4">
				<p class="text-white mt-3">AJ GYM<a href="https://themefisher.com/" class="text-color"></a></p>
			</div>
			<div class="col-lg-6 ml-auto text-right">
				<ul class="list-inline mb-0 footer-socials">
					<li class="list-inline-item"><a href=""><i class="ti-facebook"></i></a></li>
					<li class="list-inline-item"><a href=""><i class="ti-twitter"></i></a></li>
					<li class="list-inline-item"><a href=""><i class="ti-github"></i></a></li>
					<!--OUR ONES-->
				</ul>
			</div>
		</div>
	</div>
</footer>
   </div>

   <!-- 
    Essential Scripts
    =====================================-->


   <!-- Main jQuery -->
   <script src="plugins/jquery/jquery.js"></script>
   <!-- Bootstrap 4.3.1 -->
   <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
   <!-- Slick Slider -->
   <script src="plugins/slick-carousel/slick/slick.min.js"></script>
   <!--  Magnific Popup-->
   <script src="plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
   <!-- Form Validator -->
   <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.32/jquery.form.js"></script>
   <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>
   <!-- Google Map -->
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
   <script src="plugins/google-map/gmap.js"></script>

   <script src="js/script.js"></script>


   <script>
        $(function () {
  $('.datepicker').datepicker({
    language: "es",
    autoclose: true,
    format: "dd/mm/yyyy"
  });
});

    </script>

   </body>

   </html>

   