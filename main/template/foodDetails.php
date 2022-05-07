<?php 
session_start();
  if (!isset($_SESSION['fullname'])) {
    header("location: ../../index.php");
  }
  // echo $_SESSION['profile_pic'];
  include('../../include/connection.php');
  $customerid = $_SESSION['customer_id'];
  // echo $customerid;
  $customer_id = $_SESSION['customer_id'];

  $food_code = $_GET['id'];


 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
     <title>Misyel's Catering</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../images/mainlogo.jpg" rel="icon">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="../../assets/plugins/owl.carousel/dist/css/owl.carousel.min.css">
    <link href="../css/style.css" rel="stylesheet">
    <style type="text/css">
             .toast-message {
            display: none;
        }
        .toast-title {
            display: none;
        }
        .toast{
            display: none;
        }
        .toast-success
        {
            display: none;
        }
        div.toast{
            display: none;
        }
        #toast-container{
                display: none;
        }
    </style>
    </style>
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <?php include('include/customerheader.php'); ?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
       <?php include('include/customersidebar.php'); ?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="breadcrumb-range-picker">
                      <!--   <span><i class="icon-calender"></i></span>
                        <span class="ml-1">August 08, 2017 - August 08, 2017</span> -->
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Food Menu</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <?php 
         if(isset($_POST['add_to_cart']))
        {

          $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 12; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
          date_default_timezone_set('Asia/Manila');
          $tdate = date("m/d/Y");
            $quantity = $_POST['qty'];
            $id = $_GET['id'];
            $queryPrice = mysqli_query($con, "SELECT * FROM tblfoods WHERE food_code = '$id'");
            $fetch = mysqli_fetch_array($queryPrice);
            $price = $fetch['price'];
            if ($quantity == 0)
            {
                echo "<script>alert('Qty is zero')</script>";
            }
            else {
              $total = $price * $quantity;
              // echo $total;
              // echo $customerid;
              // echo $id;
              // echo $quantity;
              // echo $tdate;

              $query = mysqli_query($con, "INSERT INTO `tblorder`(`order_id`, `customer_id`, `item_code`, `qty`, `tdate`, `price`) VALUES (NULL, '$customerid', '$id', '$quantity', '$tdate', '$total')");
                echo "<script>window.location.replace('foodmenu.php')</script>";
            }
        }
     ?>

            <div class="container-fluid">
                <div class="row justify-content-between mb-3">
					<div class="col-12 ">
						<h2 class="page-heading">Hi,Welcome Back!</h2>
						<p class="mb-0">This is for Food Menu</p>
					</div>
                </div>
                <!-- <div class="row">
                   
                   <?php 

                            $query = mysqli_query($con, "SELECT * FROM `tblfoods` ORDER BY food_id DESC");
                            while($row = mysqli_fetch_array($query)){
                                 $food_code = $row['food_code'];
                                 $active = $row['active'];
                    ?>
					
					<div class="col-xl-4 col-sm-4 col-xxl-4">
                        <div class="card vertical-card__menu">
                            <?php 
                                if ($active == 1){
                             ?>
                            <span class="ribbon ribbon__one vertical-card__menu--status open">Available <em class="ribbon-curve"></em></span>
                            <?php } else { ?>
                             <span class="ribbon ribbon__one vertical-card__menu--status close">Not Available <em class="ribbon-curve"></em></span>
                            <?php } ?>
                            <div class="card-header p-0">
                                <div class="vertical-card__menu--image">
                                    <?php 
                  $queryimage = mysqli_query($con, "SELECT *, MAX(fimage_id) as fimage_id FROM `tblfoodimage` WHERE food_code = '$food_code'");
                  $rowImage = mysqli_fetch_array($queryimage);
               ?>
                                    <img style="height: 300px;" src="../../images/food/<?php echo $rowImage['image'] ?>" alt="Menu">
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="vertical-card__menu--desc p-3">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="vertical-card__menu--title"><?php echo $row['food_desc']; ?></h4>
                                        <div class="vertical-card__menu--fav">
                                            <a href="javascript:void()"><i class="fa fa-heart-o"></i></a>
                                        </div>
                                    </div>
                                    <p>Good for: <?php echo $row['food_serve']; ?> People</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2 class="vertical-card__menu--price">&#8369;<span><?php echo number_format($row['price'], 2); ?></span></h2>
                                        <div class="vertical-card__menu--rating c-pointer">
                                         
                                        </div>
                                    </div>
                                </div>
                              
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <form method="POST" action="foodmenu.php?id=<?php echo $row['food_code']; ?>">  

                                <div>
                                    <div style="float: left; width: 100%;">
                                        <span class="icon"><i class="fa fa-map-marker"></i></span>
                                        Quantity: 
                                        <input type="number" class="form-control" value="0" name="qty">
                                        <input type="text" style="display: none;" class="form-control" value="<?php echo $row['food_code']; ?>" name="id">
                                    </div>
                                    <div style="float: right; margin-top: 10px;">
                                         <input type="submit"  class="btn btn-primary" value="Add to Cart" name="add_to_cart">
                                   

                                    </div>
                                </div>
                              
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
				</div> -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="owl-carousel offer_card_carousel" id="offer_card_carousel">
                               <?php 
                               $food_code = $_GET['id'];
                            $query = mysqli_query($con, "SELECT * FROM `tblfoodimage` WHERE food_code = '$food_code'");
                            while($row = mysqli_fetch_array($query)){
                                 // $food_code = $row['food_code'];
                                 // $active = $row['active'];
                    ?>
                            <div class="card vertical-card__menu">
                                <!-- <?php 
                                if ($active == 1){
                             ?>
                            <span class="ribbon ribbon__one vertical-card__menu--status open">Available <em class="ribbon-curve"></em></span>
                            <?php } else { ?>
                             <span class="ribbon ribbon__one vertical-card__menu--status closed">Not Available <em class="ribbon-curve"></em></span>
                            <?php } ?> -->
                                <div class="card-header p-0">
                                    <div class="vertical-card__menu--image">
                                   
                                    <img style="height: 300px;" src="../../images/food/<?php echo $row['image'] ?>" alt="Menu">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="vertical-card__menu--desc">
                                     <div class="card-body p-0">
                                <!-- <div class="vertical-card__menu--desc p-3">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="vertical-card__menu--title"><?php echo $row['food_desc']; ?></h4>
                                        <div class="vertical-card__menu--fav">
                                            <a href="javascript:void()"><i class="fa fa-heart-o"></i></a>
                                        </div>
                                    </div>
                                    <p>Good for: <?php echo $row['food_serve']; ?> People</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2 class="vertical-card__menu--price">&#8369;<span><?php echo number_format($row['price'], 2); ?></span></h2>
                                        <div class="vertical-card__menu--rating c-pointer">
                                            
                                        </div>
                                    </div>
                                </div> -->
                              <!--   <div class="col-lg-12 pl-0">
                                    <div class="card-body d-flex align-items-center h-100">
                                        <ul class="w-100 m-0">
                                            <li class="mb-4">
                                                <div class="d-flex justify-content-between">
                                                    <h4 class="d-inline-block">Porota</h4>
                                                    <span class="badge badge-primary">2 Piece</span>
                                                </div>
                                                <span>Classic marinara sauce</span>
                                            </li>
                                            <li class="mb-4">
                                                <div class="d-flex justify-content-between">
                                                    <h4 class="d-inline-block">Chicken</h4>
                                                    <span class="badge badge-primary">4 Piece</span>
                                                </div>
                                                <span>Classic marinara sauce</span>
                                            </li>
                                            <li class="mb-4">
                                                <div class="d-flex justify-content-between">
                                                    <h4 class="d-inline-block">Vegatible</h4>
                                                    <span class="badge badge-primary">250 Gm</span>
                                                </div>
                                                <span>Classic marinara sauce</span>
                                            </li>
                                            <li class="mb-4">
                                                <div class="d-flex justify-content-between">
                                                    <h4 class="d-inline-block">Cold Drinks</h4>
                                                    <span class="badge badge-primary">2 Glass</span>
                                                </div>
                                                <span>Classic marinara sauce</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div> -->
                            </div>
                                   <div class="card-footer d-flex justify-content-between align-items-center">
                                     <?php 
                                if ($active == 1){
                             ?>
                                
                            <?php } else { ?>
                                <div>
                                    <h2>Not Available!</h2>
                                </div>
                            <?php } ?>
                            </div>
                            </div>
                            
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>

        </div>
        <?php 

            $query = mysqli_query($con, "SELECT * FROM `tblfoods` WHERE food_code = '$food_code' ORDER BY food_id DESC");
                            while($row = mysqli_fetch_array($query)){

         ?>
         <div class="card vertical-card__menu">
        <div class="card-header p-0">
                                    <div class="vertical-card__menu--image">
                                   
                                   <!--  <img style="height: 300px;" src="../../images/food/<?php echo $row['image'] ?>" alt="Menu"> -->
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="vertical-card__menu--desc">
                                     <div class="card-body p-0">
                                        <div class="row">
                                             <div class="col-lg-6">
                                    <div class="vertical-card__menu--desc p-3">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="vertical-card__menu--title"><?php echo $row['food_desc']; ?></h4>
                                        <div class="vertical-card__menu--fav">
                                            <a href="javascript:void()"><i class="fa fa-heart-o"></i></a>
                                        </div>
                                    </div>
                                    <p>Good for: <?php echo $row['food_serve']; ?> People</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2 class="vertical-card__menu--price">&#8369;<span><?php echo number_format($row['price'], 2); ?></span></h2>
                                        <div class="vertical-card__menu--rating c-pointer">
                                            
                                        </div>
                                    </div>
                                </div>
                                </div>
                              <!--   <div class="col-lg-6">
                                   
                                </div> -->
                                <div class="col-lg-6">
                                    <form method="POST" action="foodmenu.php?id=<?php echo $row['food_code']; ?>">  

                                <div style="margin-top: 20px;">
                                    <div>
                                        <span class="icon"><i class="fa fa-map-marker"></i></span>
                                        Quantity: 
                                        <input type="number" class="form-control" value="0" name="qty">
                                        <input type="text" style="display: none;" class="form-control" value="<?php echo $row['food_code']; ?>" name="id">
                                    </div>
                                    <div style="float: right; margin-top: 10px;">
                                         <input type="submit"  class="btn btn-primary" value="Add to Cart" name="add_to_cart">
                                        <!--  <a href="foodDetails.php?id=<?php echo $row['food_code']; ?>" class="btn btn-primary">Details</a>
 -->
                                                                             
                                    </div>
                                </div>
                              
                                </form>
                                </div>
                                        </div>
                               
                            </div>
                                   <!-- <div class="card-footer d-flex justify-content-between align-items-center"> -->
                                     <?php 
                                if ($active == 1){
                             ?>
                                 
                            <?php } else { ?>
                                <div>
                                    <h2>Not Available!</h2>
                                </div>
                            <?php } ?>
                            <!-- </div> -->
                            </div>
                            
                        </div>
                    </div>
                    <?php } ?>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        
        <!--**********************************
            Footer end
        ***********************************-->

        
        <!--**********************************
            Right sidebar start
        ***********************************-->
        <div class="sidebar-right">
            <a class="sidebar-right-trigger gradient-5-x" href="javascript:void(0)">
                <span><i class="fa fa-cog fa-spin"></i></span>
            </a>
            <div class="sidebar-right-inner">
                <div class="admin-settings">
                    <h4>Pick your style</h4>
                    <div>
                        <p>Background</p>
                        <select class="form-control" name="theme_version" id="theme_version">
                            <option value="light">Light</option>
                            <option value="dark">Dark</option>
                        </select>
                    </div>
                    <div>
                        <p>Layout</p>
                        <select class="form-control" name="theme_layout" id="theme_layout">
                            <option value="vertical">Vertical</option>
                            <option value="horizontal">Horizontal</option>
                        </select>
                    </div>
                    <div>
                        <p>Sidebar</p>
                        <select class="form-control" name="sidebar_style" id="sidebar_style">
                            <option value="full">Full</option>
                            <option value="mini">Mini</option>
                            <option value="compact">Compact</option>
                            <option value="overlay">Overlay</option>
                        </select>
                    </div>
                    <div>
                        <p>Sidebar position</p>
                        <select class="form-control" name="sidebar_position" id="sidebar_position">
                            <option value="static">Static</option>
                            <option value="fixed">Fixed</option>
                        </select>
                    </div>
                    <div>
                        <p>Header position</p>
                        <select class="form-control" name="header_position" id="header_position">
                            <option value="static">Static</option>
                            <option value="fixed">Fixed</option>
                        </select>
                    </div>
                    <div>
                        <p>Container</p>
                        <select class="form-control" name="container_layout" id="container_layout">
                            <option value="wide">Wide</option>
                            <option value="boxed">Boxed</option>
                            <option value="wide-boxed">Wide Boxed</option>
                        </select>
                    </div>
                    <div>
                        <p>Direction</p>
                        <select class="form-control" name="theme_direction" id="theme_direction">
                            <option value="ltr">LTR</option>
                            <option value="rtl">RTL</option>
                        </select>
                    </div>
                    <div>
                        <p>Navigation Header</p>
                        <div>
                            <span>
                                <input type="radio" name="navigation_header" value="color_1" class="filled-in chk-col-primary" id="nav_header_bg_1">
                                <label for="nav_header_bg_1"></label>
                            </span>
                            <span>
                                <input type="radio" name="navigation_header" value="color_2" class="filled-in chk-col-primary" id="nav_header_bg_2">
                                <label for="nav_header_bg_2"></label>
                            </span>
                            <span>
                                <input type="radio" name="navigation_header" value="color_3" class="filled-in chk-col-primary" id="nav_header_bg_3">
                                <label for="nav_header_bg_3"></label>
                            </span>
                            <span>
                                <input type="radio" name="navigation_header" value="color_4" class="filled-in chk-col-primary" id="nav_header_bg_4">
                                <label for="nav_header_bg_4"></label>
                            </span>
                            <span>
                                <input type="radio" name="navigation_header" value="color_5" class="filled-in chk-col-primary" id="nav_header_bg_5">
                                <label for="nav_header_bg_5"></label>
                            </span>
                            <span>
                                <input type="radio" name="navigation_header" value="color_6" class="filled-in chk-col-primary" id="nav_header_bg_6">
                                <label for="nav_header_bg_6"></label>
                            </span>
                            <span>
                                <input type="radio" name="navigation_header" value="color_7" class="filled-in chk-col-primary" id="nav_header_bg_7">
                                <label for="nav_header_bg_7"></label>
                            </span>
                            <span>
                                <input type="radio" name="navigation_header" value="color_8" class="filled-in chk-col-primary" id="nav_header_bg_8">
                                <label for="nav_header_bg_8"></label>
                            </span>
                            <span>
                                <input type="radio" name="navigation_header" value="color_9" class="filled-in chk-col-primary" id="nav_header_bg_9">
                                <label for="nav_header_bg_9"></label>
                            </span>
                            <span>
                                <input type="radio" name="navigation_header" value="color_10" class="filled-in chk-col-primary" id="nav_header_bg_10">
                                <label for="nav_header_bg_10"></label>
                            </span>
                        </div>
                    </div>
                    <div>
                        <p>Header</p>
                        <div>
                            <span>
                                <input type="radio" name="header_bg" value="color_1" class="filled-in chk-col-primary" id="header_bg_1">
                                <label for="header_bg_1"></label>
                            </span>
                            <span>
                                <input type="radio" name="header_bg" value="color_2" class="filled-in chk-col-primary" id="header_bg_2">
                                <label for="header_bg_2"></label>
                            </span>
                            <span>
                                <input type="radio" name="header_bg" value="color_3" class="filled-in chk-col-primary" id="header_bg_3">
                                <label for="header_bg_3"></label>
                            </span>
                            <span>
                                <input type="radio" name="header_bg" value="color_4" class="filled-in chk-col-primary" id="header_bg_4">
                                <label for="header_bg_4"></label>
                            </span>
                            <span>
                                <input type="radio" name="header_bg" value="color_5" class="filled-in chk-col-primary" id="header_bg_5">
                                <label for="header_bg_5"></label>
                            </span>
                            <span>
                                <input type="radio" name="header_bg" value="color_6" class="filled-in chk-col-primary" id="header_bg_6">
                                <label for="header_bg_6"></label>
                            </span>
                            <span>
                                <input type="radio" name="header_bg" value="color_7" class="filled-in chk-col-primary" id="header_bg_7">
                                <label for="header_bg_7"></label>
                            </span>
                            <span>
                                <input type="radio" name="header_bg" value="color_8" class="filled-in chk-col-primary" id="header_bg_8">
                                <label for="header_bg_8"></label>
                            </span>
                            <span>
                                <input type="radio" name="header_bg" value="color_9" class="filled-in chk-col-primary" id="header_bg_9">
                                <label for="header_bg_9"></label>
                            </span>
                            <span>
                                <input type="radio" name="header_bg" value="color_10" class="filled-in chk-col-primary" id="header_bg_10">
                                <label for="header_bg_10"></label>
                            </span>
                        </div>
                    </div>
                    <div>
                        <p>Sidebar</p>
                        <div>
                            <span>
                                <input type="radio" name="sidebar_bg" value="color_1" class="filled-in chk-col-primary" id="sidebar_bg_1">
                                <label for="sidebar_bg_1"></label>
                            </span>
                            <span>
                                <input type="radio" name="sidebar_bg" value="color_2" class="filled-in chk-col-primary" id="sidebar_bg_2">
                                <label for="sidebar_bg_2"></label>
                            </span>
                            <span>
                                <input type="radio" name="sidebar_bg" value="color_3" class="filled-in chk-col-primary" id="sidebar_bg_3">
                                <label for="sidebar_bg_3"></label>
                            </span>
                            <span>
                                <input type="radio" name="sidebar_bg" value="color_4" class="filled-in chk-col-primary" id="sidebar_bg_4">
                                <label for="sidebar_bg_4"></label>
                            </span>
                            <span>
                                <input type="radio" name="sidebar_bg" value="color_5" class="filled-in chk-col-primary" id="sidebar_bg_5">
                                <label for="sidebar_bg_5"></label>
                            </span>
                            <span>
                                <input type="radio" name="sidebar_bg" value="color_6" class="filled-in chk-col-primary" id="sidebar_bg_6">
                                <label for="sidebar_bg_6"></label>
                            </span>
                            <span>
                                <input type="radio" name="sidebar_bg" value="color_7" class="filled-in chk-col-primary" id="sidebar_bg_7">
                                <label for="sidebar_bg_7"></label>
                            </span>
                            <span>
                                <input type="radio" name="sidebar_bg" value="color_8" class="filled-in chk-col-primary" id="sidebar_bg_8">
                                <label for="sidebar_bg_8"></label>
                            </span>
                            <span>
                                <input type="radio" name="sidebar_bg" value="color_9" class="filled-in chk-col-primary" id="sidebar_bg_9">
                                <label for="sidebar_bg_9"></label>
                            </span>
                            <span>
                                <input type="radio" name="sidebar_bg" value="color_10" class="filled-in chk-col-primary" id="sidebar_bg_10">
                                <label for="sidebar_bg_10"></label>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Right sidebar end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="../../assets/plugins/common/common.min.js"></script>
    <script src="../js/custom.min.js"></script>
    <script src="../js/settings.js"></script>
    <script src="../js/quixnav.js"></script>
    <script src="../js/styleSwitcher.js"></script>
    <script src="../../assets/plugins/owl.carousel/dist/js/owl.carousel.min.js"></script>
    <script src="../js/dashboard/dashboard-2.js"></script>
</body>


</html>