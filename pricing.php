<?php
    include "config/db.php";
    $result = $conn->query("SELECT `package`, `description`, `amount` FROM `packages`");
?>
<!doctype html>




<html lang="en">
  <head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="GYm,fitness,business,company,agency,multipurpose,modern,bootstrap4">
  
  <meta name="author" content="Themefisher.com">

  <title>AJ GYM</title>

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <!-- Icofont Css -->
  <link rel="stylesheet" href="plugins/icofont/icofont.min.css">
  <!-- Themify Css -->
  <link rel="stylesheet" href="plugins/themify/css/themify-icons.css">
  <!-- animate.css -->
  <link rel="stylesheet" href="plugins/animate-css/animate.css">
  <!-- Magnify Popup -->
  <link rel="stylesheet" href="plugins/magnific-popup/dist/magnific-popup.css">
  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">

</head>
<body>

<!-- Header Start -->
<?php
	include "inc/header.php";
?>


<!-- Header Close -->

<div class="main-wrapper ">
<section class="page-title bg-2">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
          <ul class="list-inline mb-0">
            <li class="list-inline-item"><a href="index.html" class="text-sm letter-spacing text-white text-uppercase font-weight-bold">Home</a></li>
            <li class="list-inline-item"><span class="text-white">|</span></li>
            <li class="list-inline-item"><a href="#" class="text-color text-uppercase text-sm letter-spacing">Pricing</a></li>
          </ul>
           <h1 class="text-lg text-white mt-2">Memebership </h1>
      </div>
    </div>
  </div>
</section>




<!-- Section pricing start -->
<section class="section pricing bg-gray">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
               <div class="section-title">
                  <div class="divider mb-3"></div>
                  <h2>Package Pricing</h2>
               </div>
            </div>
         </div>
         <div class="row justify-content-center">
            <?php
            // Loop through the result set and display each package
            while ($row = $result->fetch_assoc()) {
            ?>
               <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                  <div class="card rounded-0 px-4 py-5 bg-4">
                     <div class="position-relative">
                        <h4 class="card-title text-white text-capitalize font-weight-normal font-secondary"><?php echo $row['package']; ?></h4>
                        <h3 class="text-lg text-white font-secondary position-relative mt-2">
                           <sup class="text-sm position-absolute">Rs</sup><?php echo $row['amount']; ?> <sub>per month</sub>
                        </h3>

                        <div class="card-body mt-2">
                           <ul class="list-unstyled lh-35 mb-4">
                              <li class="text-white"><i class="ti-check mr-3 text-color"></i>Training overview</li>
                              <li class="text-white"><i class="ti-check mr-3 text-color"></i>Foundation Training</li>
                              <li class="text-white-50"><i class="ti-close mr-3"></i>Begineers Classes</li>
                              <li class="text-white-50"><i class="ti-close mr-3"></i>Olympic weighlifting</li>
                              <li class="text-white-50"><i class="ti-close mr-3"></i>Personal Training</li>
                           </ul>
                           <!-- Assuming you have a 'description' column in your 'packages' table -->
                           <p><?php echo $row['description']; ?></p>
                           <a href="membership_payment.php?package=<?php echo urlencode($row['package']); ?>&amount=<?php echo urlencode($row['amount']); ?>" class="btn btn-solid-border text-white">Buy Now</a>
                        </div>
                     </div>
                  </div>
               </div>
            <?php
            }
            ?>
         </div>
      </div>
   </section>
<!-- Section pricing End -->

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

   </body>

   </html>