<?php 
session_start();
  if (!isset($_SESSION['fullname'])) {
    header("location: index.php");
  }
  // echo $_SESSION['profile_pic'];
  include('include/connection.php');
  $customerid = $_SESSION['customer_id'];
  $customer_id = $_SESSION['customer_id'];

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
        <!-- <h1><a href="index.php">Misyel's Catering</a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <?php include('include/customerheader.php'); ?><!-- .navbar -->

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
          <h2>My Food <span>Cart</span></h2>
          </div>
        <!-- <div class="section-title">
          <h2>Check our tasty <span>Menu</span></h2>
        </div> -->
<form method="POST">
        <div class="row">
          <div class="col-lg-4">
            <div class="form-group">
              <label>Location</label>
              <input type="text" required="" class="form-control" name="location">
            </div>
            <!-- <ul id="menu-flters">
              <li data-filter="*" class="filter-active">Show All</li>
              <li data-filter=".filter-starters">Starters</li>
              <li data-filter=".filter-salads">Salads</li>
              <li data-filter=".filter-specialty">Specialty</li>
            </ul> -->
          </div>
          <?php 

            date_default_timezone_set('Asia/Manila');
          $tdate = date("m/d/Y");
           ?>
          <div class="col-lg-4">
            <div class="form-group">
              <label>Date</label>
              <input type="text" value="<?php echo $tdate; ?>" class="form-control" name="date">
            </div>
            <!-- <ul id="menu-flters">
              <li data-filter="*" class="filter-active">Show All</li>
              <li data-filter=".filter-starters">Starters</li>
              <li data-filter=".filter-salads">Salads</li>
              <li data-filter=".filter-specialty">Specialty</li>
            </ul> -->
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <label>Time</label>
              <input type="text" required="" class="form-control" name="time">
            </div>
            <!-- <ul id="menu-flters">
              <li data-filter="*" class="filter-active">Show All</li>
              <li data-filter=".filter-starters">Starters</li>
              <li data-filter=".filter-salads">Salads</li>
              <li data-filter=".filter-specialty">Specialty</li>
            </ul> -->
          </div>
        </div>
        <div class="row mt-5">
        
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
                <!-- <div class="col-lg-2">
                  <label>Choose..</label>
                </div> -->
              </div>
         
         <div class="row menu-container">
          <?php 
              $totalAmt = 0;
              $query = mysqli_query($con, "SELECT tblfoods.food_desc, tblorder.order_id, tblfoods.price, tblorder.qty, tblcategory.category_desc FROM tblorder INNER JOIN tblcustomer ON tblorder.customer_id=tblcustomer.customer_id INNER JOIN tblfoods ON tblfoods.food_code=tblorder.item_code INNER JOIN tblcategory ON tblfoods.category_id=tblcategory.category_id WHERE tblorder.act_no = 0 AND tblorder.customer_id = $customer_id");
              while ($row = mysqli_fetch_array($query)){

              $price = $row['price'];
           ?>
          <div class="col-lg-12 menu-item filter-starters">
           <!--  <div class="menu-content">
              <a href="#"><?php echo $row['category_desc']; ?></a>
            </div> -->
            <input type="text" value="<?php echo $row['order_id']; ?>" style="display: none;" name="order_id">
            <div class="menu-ingredients">
              <div class="row">
                
                <div class="col-md-2">
                  <label><?php echo $row['food_desc']; ?></label>
                </div>
                 <div class="col-md-2">
                  <label><?php echo $row['category_desc']; ?></label>
                </div>
                 <div class="col-md-2">
                  <label><?php echo $row['qty']; ?></label>
                </div>
                 <div class="col-md-2">
                  <label><?php echo number_format($row['price'], 2); ?></label>
                </div>
                 <?php   
                                                                $totalprice = $row['qty'] * $row['price'];
                                                         ?>
                <div class="col-lg-2">
                  <label><?php echo number_format($totalprice, 2); ?></label>
                </div>
                 <!-- <div class="col-lg-2" id="checklist">
                  <input style="padding-left: 50px;" type="checkbox" onclick="calcAndShowTotal(<?php echo $row['order_id']; ?>)" name="check[]" id="choose<?php echo $row['order_id']; ?>"  value="<?php echo $row['order_id']; ?>" price<?php echo $row['order_id']; ?>="<?php echo $totalprice; ?>">
                </div> -->
              </div>
             <!-- <li style="list-style: none;"><?php echo $row['food_desc']; ?> <span style="float: right;">&#8369; <?php echo number_format($row['price'], 2); ?><input style="padding-left: 50px;" type="checkbox" name="check[]" value="<?php echo $row['order_id']; ?>"></span></li> -->
            </div>
          </div>
          <?php  $totalAmt += $totalprice;?>
        <?php } ?>

        </div>
        <hr>
        <div class="row">
          <div class="col-md-4">
            
          </div>
          <div class="col-md-2">
           
          </div>
          <div class="col-md-6">
            <label>Total:</label>
            <div style="float: right;">
              <!-- <span >&#8369; <?php echo number_format($totalAmt, 2); ?></span> -->
              <!-- <span id="totalprice"></span> -->
              <input class="form-control" type="text" style="text-align: right;" id="totalprice" value="<?php echo number_format($totalAmt, 2); ?>" readonly="readonly" />
            </div>
            
          </div>
        </div>
        <div style="float: right; margin-top: 5px;">
              <input class="btn btn-primary" type="submit" value="Checkout" name="submitcart">
            </div>
        <h2 style="text-align: center;">My <span>Freebies</span></h2>
        <div class="row mt-3">

          <div class="col-md-4">
            
            <?php 
                $query = mysqli_query($con, "SELECT * from tblfoods INNER JOIN tblgiveaways on tblgiveaways.food_id=tblfoods.food_id WHERE tblgiveaways.limit_price < $totalAmt");
                while ($row = mysqli_fetch_array($query)){
             ?>
           <!-- <li> -->
             <!-- <p> <img class="img-fluid" src="images/food/<?php echo $row['food_image']; ?>"> <?php echo $row['food_desc']; ?></p> -->
           <!-- </li> -->
           <div class="row">
             <div class="col-md-4">
               <!-- <img class="img-fluid" src="images/food/<?php echo $row['food_image']; ?>"> -->
               <span> <?php echo $row['food_desc']; ?></span> 
             </div>
             <div class="col-md-4">
               
             </div>
           </div>
         <?php } ?>
          </div>
          <div class="col-md-4">
           
          </div>
          <div class="col-md-4">
                       <!--  <div style="float: right;">
             
            </div> -->
          </div>
        </div>
        </form>
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
    $order_id = $_POST['order_id'];

    $query = mysqli_query($con, "INSERT INTO `tbltransaction`(`transaction_id`, `transaction_number`, `customer_id`, `location`, `tdate`, `time`) VALUES (NULL,'$randomString','$customerid','$location','$date','$time')");
          // date_default_timezone_set('Asia/Manila');
          // $tdate = date("m/d/Y");
//             foreach($_POST['check'] as $selected){
// echo $selected."</br>";
    $query1 = mysqli_query($con, "SELECT tblfoods.food_desc, tblorder.order_id, tblcategory.category_desc, tblfoods.food_image, tblfoods.price, tblorder.qty FROM tblorder INNER JOIN tblcustomer ON tblorder.customer_id=tblcustomer.customer_id INNER JOIN tblfoods ON tblfoods.food_id=tblorder.food_id INNER JOIN tblcategory ON tblcategory.category_id=tblfoods.category_id WHERE tblorder.act_no = 0 AND tblorder.customer_id = $customerid");
              while ($row = mysqli_fetch_array($query1)){
                $order_id1 = $row['order_id'];
                $updatequery = mysqli_query($con, "UPDATE `tblorder` SET `order_code`='$randomString',`act_no`=1 WHERE order_id = $order_id1");
              }
            // }
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
        //   // alert(diff);
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