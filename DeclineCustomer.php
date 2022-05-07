<?php 
session_start();
  if (!isset($_SESSION['fullname'])) {
    header("location: index.php");
  }
  // echo $_SESSION['profile_pic'];
  include('include/connection.php');
  $customerid = $_SESSION['customer_id'];

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Misyel's Catering</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="images/mainlogo.jpg" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  
  <style type="text/css">
    #hero{
      height: 120px;
    }
  </style>
  <!-- =======================================================
  * Template Name: Delicious - v4.2.0
  * Template URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center fixed-top topbar-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-center justify-content-lg-start">
      <i class="bi bi-phone d-flex align-items-center"><span>+1 5589 55488 55</span></i>
      <i class="bi bi-clock ms-4 d-none d-lg-flex align-items-center"><span>Mon-Sat: 11:00 AM - 23:00 PM</span></i>
    </div>
  </section>


  <?php 

    if(isset($_GET['book']))
    {
      echo "<script>alert('Book Successfuly')</script>";
    }

   ?>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <div class="logo me-auto">
        <h1><a href="index.php">Misyel's Catering</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <?php include('include/customerorder.php'); ?>

      <!-- <a href="#book-a-table" class="book-a-table-btn scrollto">Book a table</a> -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
 <?php include('carousel.php'); ?><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <!-- End About Section -->

    <!-- ======= Whu Us Section ======= -->
   

    <section id="menu" class="menu">
      <div class="container">
<div class="section-title">
          <h2>My <span>Decline Reserve</span></h2>
          </div>

        <div class="row menu-container">
          <?php 
              $query = mysqli_query($con, "SELECT * FROM tblTransaction WHERE status_id = 3 AND customer_id=$customerid");
              while ($row = mysqli_fetch_array($query)){
                $refer = $row['transaction_number'];
           ?>
          <div class="col-lg-12 menu-item filter-starters">
            <div class="menu-content">
              <a href="#">Reference: <?php echo $row['transaction_number']; ?></a>
            </div>
            <div class="container">

            <div class="row mt-3">
                <div class="col-lg-2">
                  <label>Food</label>
                </div>
                 <div class="col-lg-2">
                  <label>Category</label>
                </div>
                <div class="col-lg-2">
                  <label>Qty</label>
                </div>
                 <div class="col-lg-2">
                  <label>Price</label>
                </div>
                 <div class="col-lg-2">
                  <label>Total Price</label>
                </div>
              </div>

            <div class="menu-ingredients">
              <?php 
                // $query2 = mysqli_query($con,"SELECT * FROM `tbltransaction` INNER JOIN tblorder ON tbltransaction.transaction_number=tblorder.order_code INNER JOIN tblfoods on tblfoods.food_id=tblorder.food_id WHERE tblorder.order_code=$refer");\
                $totalAmt = 0;

                $query2 = mysqli_query($con,"SELECT * FROM `tbltransaction` INNER JOIN tblorder ON tbltransaction.transaction_number=tblorder.order_code INNER JOIN tblfoods on tblfoods.food_id=tblorder.food_id INNER join tblcategory on tblcategory.category_id=tblfoods.category_id WHERE tblorder.order_code=$refer AND tbltransaction.customer_id=$customerid");

                while($row1 = mysqli_fetch_array($query2)){
             ?>
            <div class="row">
                <div class="col-lg-2">
                  <label><?php echo $row1['food_desc']; ?></label>
                </div>
                 <div class="col-lg-2">
                  <label><?php echo $row1['category_desc']; ?></label>
                </div>
                 <div class="col-lg-2">
                  <label><?php echo $row1['qty']; ?></label>
                </div>
                 <div class="col-lg-2">
                  <label><?php echo number_format($row1['price'], 2); ?></label>
                </div>
                 <?php   
                                                                $totalprice = $row1['qty'] * $row1['price'];
                                                         ?>
                <div class="col-lg-2">
                  <label><?php echo number_format($totalprice, 2); ?></label>
                </div>
              </div>
              <?php  $totalAmt += $totalprice;?>
            <?php } ?>
            <hr>
        <div class="row">
          <div class="col-md-3">
            
          </div>
          <div class="col-md-4">
           
          </div>
          <div class="col-md-2">
            <label>Total:</label>
            <div style="float: right;">
              <span >&#8369; <?php echo number_format($totalAmt, 2); ?></span> 
            </div>
            <!-- <div style="float: right;">
              <input type="submit" value="Checkout" name="submitcart">
            </div> -->
          </div>
        </div>
            </div>
          </div>
          </div>
        <?php } ?>

        </div>

        

      </div>
    </section>

    <?php 
        if(isset($_POST['submitcart']))
        {

          $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 12; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    $location = $_POST['location'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $query = mysqli_query($con, "INSERT INTO `tbltransaction`(`transaction_id`, `transaction_number`, `customer_id`, `location`, `tdate`, `time`) VALUES (NULL,'$randomString','$customerid','$location','$date','$time')");
          // date_default_timezone_set('Asia/Manila');
          // $tdate = date("m/d/Y");
            foreach($_POST['check'] as $selected){
echo $selected."</br>";
                $updatequery = mysqli_query($con, "UPDATE `tblorder` SET `order_code`='$randomString',`act_no`=1 WHERE order_id = $selected");
            }
            echo "<script>window.location.replace('cart.php')</script>";
        }
     ?>

   
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <!-- <footer id="footer">
    <div class="container">
      <h3>Delicious</h3>
      <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>Delicious</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer> -->
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script
  src="https://code.jquery.com/jquery-1.5.2.js"
  integrity="sha256-4hB8js20ecNtgi2CvaKoyvRCmrLSz58g1ckx91J1QDw="
  crossorigin="anonymous"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script type="text/javascript">
   
   
    var diff = 0;
    var total = 0;
    function calcAndShowTotal(strId){
       
    
    var attrib = "price" + strId;
    // alert(attrib);
    $("#choose" + strId).change(function() {
      if(this.checked) {
       total += parseFloat($(this).attr(attrib)) || 0;
        // alert(total);
        $('#totalprice').val(total);

        }
        else {
        //   diff = total - parseFloat($(this).attr(attrib));
        //   alert(diff);
        // // alert(parseFloat($(this).attr(attrib)));
        // $('#totalprice').val(diff);
        }
        
    });
    
    // alert(strId);
}

$(document).ready(function(){

      $("#choose" + strId).change(function() {
      if(this.checked) {
       total += parseFloat($(this).attr(attrib)) || 0;
        // alert(total);
        $('#totalprice').val(total);

        }
        else {
        //   diff = total - parseFloat($(this).attr(attrib));
        //   alert(diff);
        // // alert(parseFloat($(this).attr(attrib)));
        // $('#totalprice').val(diff);
        }
        
    });
  });

// $('#checklist :checkbox').click(function(){
//     calcAndShowTotal();
// });

// calcAndShowTotal();
  </script>
  

</body>

</html>