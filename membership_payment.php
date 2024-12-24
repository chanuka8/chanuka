<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="GYm, fitness, business, company, agency, multipurpose, modern, bootstrap4">
      <meta name="author" content="Themefisher.com">
      <title>AJ GYM - Products</title>
      <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="plugins/icofont/icofont.min.css">
      <link rel="stylesheet" href="plugins/themify/css/themify-icons.css">
      <link rel="stylesheet" href="plugins/animate-css/animate.css">
      <link rel="stylesheet" href="plugins/magnific-popup/dist/magnific-popup.css">
      <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
      <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/payment.css">
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      <style>
    label.error {
        color: red;
    }
</style>
   </head>
   <body>
   <?php

session_start();

// Check if the user is logged in
if (!isset($_SESSION["id"])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}

// Retrieve product details from URL parameters
$packageName = isset($_GET['package']) ? urldecode($_GET['package']) : '';
$amount = isset($_GET['amount']) ? urldecode($_GET['amount']) : '';

require('fpdf/fpdf.php');

// Include database connection
include "config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user ID from the session
    $user_id = $_SESSION["id"];

    // Retrieve other form data
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip_code = $_POST["zip_code"];
    $card_name = $_POST["card_name"];
    $card_number = $_POST["card_number"];
    $exp_month = $_POST["exp_month"];
    $exp_year = $_POST["exp_year"];
    $cvv = $_POST["cvv"];

    // Insert data into the orders table
    $insertQuery = "INSERT INTO membership_buying (user_id, product_name, product_price, full_name, email, address, city, state, zip_code, card_name, card_number, exp_month, exp_year, cvv)
VALUES ('$user_id', '$packageName', '$amount', '$full_name', '$email', '$address', '$city', '$state', '$zip_code', '$card_name', '$card_number', '$exp_month', '$exp_year', '$cvv')";


    if ($conn->query($insertQuery) === TRUE) {
        // Get the inserted order ID
        $order_id = $conn->insert_id;

        // Generate PDF

        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Membership Booked',
            text: 'Memberhsip bought successfully!',
        }).then(() => {
            // Redirect to the index page
            window.location.href = 'index.php';
        });
     </script>";    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }

}

?>
      <!-- Header Start -->
      <?php include "inc/header.php"; ?>
      <!-- Header Close -->
      <div class="main-wrapper">
         <section class="page-title bg-2">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12 text-center">
                     <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="index.html" class="text-sm letter-spacing text-white text-uppercase font-weight-bold">Home</a></li>
                        <li class="list-inline-item"><span class="text-white">|</span></li>
                        <li class="list-inline-item"><a href="#" class="text-color text-uppercase text-sm letter-spacing">Products</a></li>
                     </ul>
                     <h1 class="text-lg text-white mt-2">Our Products</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Section products start -->
         <div class="container py-5">
         <form method="POST" id="checkoutForm">
            <div class="row">
               <div class="col">
                  <h3 class="title">billing address</h3>
                  <div class="inputBox">
                     <span>Full name :</span>
                     <input type="text" name="full_name" placeholder="Nimal perera"  style="width: 100%; padding: 5px;"/>
                  </div>
                  <div class="inputBox">
                     <span>Email :</span>
                     <input type="email" name="email" placeholder="example@example.com" />
                  </div>
                  <div class="inputBox">
                     <span>Address :</span>
                     <input type="text" name="address" placeholder="no - street - locality" />
                  </div>
                  <div class="inputBox">
                     <span>City :</span>
                     <input type="text" name="city" placeholder="colombo" />
                  </div>
                  <div class="flex">
                     <div class="inputBox">
                        <span>State :</span>
                        <input type="text" placeholder="sri lanka" />
                     </div>
                     <div class="inputBox">
                        <span>Zip code :</span>
                        <input type="text" placeholder="123 456" />
                     </div>
                  </div>
               </div>
               <div class="col">
                  <h3 class="title">payment</h3>
                  
                  <div class="inputBox">
                     <span>Name on card :</span>
                     <input type="text" placeholder="mr. Nimal perera" />
                  </div>
                  <div class="inputBox">
                     <span>Credit card number :</span>
                     <input type="number" placeholder="1111-2222-3333-4444" />
                  </div>
                  <div class="inputBox">
                     <span>Exp month :</span>
                     <input type="text" placeholder="january" />
                  </div>
                  <div class="flex">
                     <div class="inputBox">
                        <span>Exp year :</span>
                        <input type="number" name="exp_year" placeholder="2024" />
                     </div>
                     <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" placeholder="1234" />
                     </div>
                  </div>
               </div>
               <div class="col">
                  <h3 class="title">Selected Package</h3>
                  <!-- Add your PHP code here to dynamically generate product details -->
                  <div>
                  <div>
                        <p>Name: <?php echo $packageName; ?></p>
                        <p>Price: Rs. <?php echo $amount; ?></p>
                     </div>
                     <!-- ... (other payment page content) ... -->
                  </div>
               </div>
            </div>
            <button type="submit" name="submit" class="submit-btn">proceed to checkout</button>
         </form>
      </div>
         <!-- Section products End -->
         <!-- Footer Start -->
         <footer class="footer bg-black-50">
            <!-- Add your footer content here -->
         </footer>
         <!-- Footer End -->
      </div>
      <!-- Essential Scripts -->
      <script src="plugins/jquery/jquery.js"></script>
      <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="plugins/slick-carousel/slick/slick.min.js"></script>
      <script src="plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.32/jquery.form.js"></script>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY"></script>
      <script src="plugins/google-map/gmap.js"></script>
      <script src="js/script.js"></script>

      <script>
$(document).ready(function () {
    // Add validation rules to the checkoutForm
    $("#checkoutForm").validate({
        rules: {
            full_name: "required",
            email: {
                required: true,
                email: true
            },
            address: "required",
            city: "required",
            exp_year: {
                required: true,
                digits: true,
                minlength: 4,
                maxlength: 4
            }
            // Add more rules based on your form fields
        },
        messages: {
            full_name: "Please enter your full name",
            email: {
                required: "Please enter your email address",
                email: "Please enter a valid email address"
            },
            address: "Please enter your address",
            city: "Please enter your city",
            exp_year: {
                required: "Please enter the expiration year",
                digits: "Please enter only digits",
                minlength: "Please enter a valid 4-digit year",
                maxlength: "Please enter a valid 4-digit year"
            }
            // Add more messages based on your form fields
        },
        submitHandler: function (form) {
            // Add any additional actions you want to perform before submitting the form
            form.submit();
        }
    });
});
</script>
   </body>
</html>