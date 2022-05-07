<?php 
session_start();
  if (!isset($_SESSION['fullname'])) {
    header("location: ../../index.php");
  }
  
  include('../../include/connection.php');
  $customerid = $_SESSION['customer_id'];
  $customer_id = $_SESSION['customer_id'];

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
    <link href="../../assets/plugins/fullcalendar/css/fullcalendar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/plugins/nouislider/nouislider.min.css">
    <!-- Chartist -->
    <link rel="stylesheet" href="../../assets/plugins/chartist/css/chartist.min.css">
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

           
            <!-- row -->

            <div class="container-fluid">
               <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="content-heading">Best Seller</h3>
                            </div>
                        </div><div class="row">
            <?php 

                            $query = mysqli_query($con, "SELECT *, SUM(qty) as qty FROM tblorder INNER JOIN tblfoods ON tblfoods.food_code=tblorder.item_code GROUP BY tblorder.item_code ORDER BY SUM(qty) DESC LIMIT 3");
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
                             <span class="ribbon ribbon__one vertical-card__menu--status closed">Not Available <em class="ribbon-curve"></em></span>
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
                                                                          </div>
                                </div>
                            </div>
                            <!-- <div class="card-footer d-flex justify-content-between align-items-center">
                                <div class="vertical-card__menu--location">
                                   
                                </div>
                                <div class="vertical-card__menu--button">
                                    <?php 
                                if ($active == 1){
                             ?>
                                    <a class="btn btn-primary btn-sm" href="foodDetails.php?id=<?php echo $row['food_code']; ?>">Order Now</a>
                                <?php } else { ?>
                                    <button disabled="" class="btn btn-primary">Order Now</button>
                                <?php } ?>
                                </div>
                            </div> -->
                        </div>
                    </div>
                <?php } ?>
        </div>
                    </div>
                </div>
                
               <!--   <div class="row">
                    <div class="col-xl-4 col-xxl-12">
                        <div class="card top_menu_widget">
                            <div class="card-body">
                                <h4 class="card-title">Top Menus</h4>
                                <div class="media border-bottom pt-3 pb-3">
                                    <img width="50" height="50" alt="#" class="mr-3" src="../../assets/images/menu/menu1.png">
                                    <div class="media-body">
                                        <h5 class="mb-1 mt-sm-1 mt-0">Fried Egg Sandwich</h5>
                                        <span>Egg, Sandwich</span>
                                    </div>
                                    <h5 class="badge-lighten-primary">$268</h5>
                                </div>
                                <div class="media border-bottom pt-3 pb-3">
                                    <img width="50" height="50" alt="#" class="mr-3" src="../../assets/images/menu/menu2.png">
                                    <div class="media-body">
                                        <h5 class="mb-1 mt-sm-1 mt-0">French Crostini</h5>
                                        <span>French, Spicy</span>
                                    </div>
                                    <h5 class="badge-lighten-success">$268</h5>
                                </div>
                                <div class="media border-bottom pt-3 pb-3">
                                    <img width="50" height="50" alt="#" class="mr-3" src="../../assets/images/menu/menu3.png">
                                    <div class="media-body">
                                        <h5 class="mb-1 mt-sm-1 mt-0">Redwine and Colddrinks</h5>
                                        <span>Drinks, Wine</span>
                                    </div>
                                    <h5 class="badge-lighten-info">$268</h5>
                                </div>
                                <div class="media border-bottom pt-3 pb-3">
                                    <img width="50" height="50" alt="#" class="mr-3" src="../../assets/images/menu/menu4.png">
                                    <div class="media-body">
                                        <h5 class="mb-1 mt-sm-1 mt-0">Multigrain Hot Cereal</h5>
                                        <span>Hot, Spicy</span>
                                    </div>
                                    <h5 class="badge-lighten-warning">$268</h5>
                                </div>
                                <div class="media border-bottom pt-3 pb-3">
                                    <img width="50" height="50" alt="#" class="mr-3" src="../../assets/images/menu/menu5.png">
                                    <div class="media-body">
                                        <h5 class="mb-1 mt-sm-1 mt-0">Lemon Yogurt Parfait</h5>
                                        <span>Juice, Cold</span>
                                    </div>
                                    <h5 class="badge-lighten-danger">$268</h5>
                                </div>
                                <div class="media pt-3 pb-3">
                                    <img width="50" height="50" alt="#" class="mr-3" src="../../assets/images/menu/menu6.png">
                                    <div class="media-body">
                                        <h5 class="mb-1 mt-sm-1 mt-0">Branch Special</h5>
                                        <span>Hot, Spicy</span>
                                    </div>
                                    <h5 class="badge-lighten-primary">$268</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    
                </div> -->
               <!--  <div class="row">
                    <div class="col-12">
                        <div class="top_menu_carousel owl-carousel" id="top_menu_carousel">
                            <div class="card vertical-card__menu">
                                <div class="card-header p-0">
                                    <div class="vertical-card__menu--image">
                                        <img src="../../assets/images/menu/granny-menu10.jpg" alt="Menu">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="vertical-card__menu--desc">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="vertical-card__menu--title">French Crostini</h5>
                                            <h4>
                                                <span class="badge badge-primary">$ 54</span>
                                            </h4>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                            <p class="mb-0"><span>Ordered:</span> <strong class="text-dark">179</strong></p>
                                            <p class="mb-0"><span>Revenue:</span>  <strong class="text-dark">$1300</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card vertical-card__menu">
                                <div class="card-header p-0">
                                    <div class="vertical-card__menu--image">
                                        <img src="../../assets/images/menu/granny-menu11.jpg" alt="Menu">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="vertical-card__menu--desc">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="vertical-card__menu--title m-0">Fried Egg Sandwich</h5>
                                            <h4>
                                                <span class="badge badge-primary">$ 54</span>
                                            </h4>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                            <p class="mb-0"><span>Ordered:</span> <strong class="text-dark">179</strong></p>
                                            <p class="mb-0"><span>Revenue:</span>  <strong class="text-dark">$1300</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card vertical-card__menu">
                                <div class="card-header p-0">
                                    <div class="vertical-card__menu--image">
                                        <img src="../../assets/images/menu/granny-menu12.jpg" alt="Menu">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="vertical-card__menu--desc">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="vertical-card__menu--title m-0">Pizza Hot Chilli</h5>
                                            <h4>
                                                <span class="badge badge-primary">$ 54</span>
                                            </h4>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                            <p class="mb-0"><span>Ordered:</span> <strong class="text-dark">179</strong></p>
                                            <p class="mb-0"><span>Revenue:</span>  <strong class="text-dark">$1300</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card vertical-card__menu">
                                <div class="card-header p-0">
                                    <div class="vertical-card__menu--image">
                                        <img src="../../assets/images/menu/granny-menu13.jpg" alt="Menu">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="vertical-card__menu--desc">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="vertical-card__menu--title m-0">Lemon Yogurt</h5>
                                            <h4>
                                                <span class="badge badge-primary">$ 54</span>
                                            </h4>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                            <p class="mb-0"><span>Ordered:</span> <strong class="text-dark">179</strong></p>
                                            <p class="mb-0"><span>Revenue:</span>  <strong class="text-dark">$1300</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card vertical-card__menu">
                                <div class="card-header p-0">
                                    <div class="vertical-card__menu--image">
                                        <img src="../../assets/images/menu/granny-menu14.jpg" alt="Menu">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="vertical-card__menu--desc">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="vertical-card__menu--title m-0">Multigrain Hot Cereal</h5>
                                            <h4>
                                                <span class="badge badge-primary">$ 54</span>
                                            </h4>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                            <p class="mb-0"><span>Ordered:</span> <strong class="text-dark">179</strong></p>
                                            <p class="mb-0"><span>Revenue:</span>  <strong class="text-dark">$1300</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card vertical-card__menu">
                                <div class="card-header p-0">
                                    <div class="vertical-card__menu--image">
                                        <img src="../../assets/images/menu/granny-menu15.jpg" alt="Menu">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="vertical-card__menu--desc">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="vertical-card__menu--title m-0">Branch Special</h5>
                                            <h4>
                                                <span class="badge badge-primary">$ 54</span>
                                            </h4>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                            <p class="mb-0"><span>Ordered:</span> <strong class="text-dark">179</strong></p>
                                            <p class="mb-0"><span>Revenue:</span>  <strong class="text-dark">$1300</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card vertical-card__menu">
                                <div class="card-header p-0">
                                    <div class="vertical-card__menu--image">
                                        <img src="../../assets/images/menu/granny-menu16.jpg" alt="Menu">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="vertical-card__menu--desc">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="vertical-card__menu--title m-0">Multigrain Hot Cereal</h5>
                                            <h4>
                                                <span class="badge badge-primary">$ 54</span>
                                            </h4>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                            <p class="mb-0"><span>Ordered:</span> <strong class="text-dark">179</strong></p>
                                            <p class="mb-0"><span>Revenue:</span>  <strong class="text-dark">$1300</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card vertical-card__menu">
                                <div class="card-header p-0">
                                    <div class="vertical-card__menu--image">
                                        <img src="../../assets/images/menu/granny-menu5.jpg" alt="Menu">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="vertical-card__menu--desc">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="vertical-card__menu--title m-0">Fried Egg Sandwich</h5>
                                            <h4>
                                                <span class="badge badge-primary">$ 54</span>
                                            </h4>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                            <p class="mb-0"><span>Ordered:</span> <strong class="text-dark">179</strong></p>
                                            <p class="mb-0"><span>Revenue:</span>  <strong class="text-dark">$1300</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card vertical-card__menu">
                                <div class="card-header p-0">
                                    <div class="vertical-card__menu--image">
                                        <img src="../../assets/images/menu/granny-menu6.jpg" alt="Menu">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="vertical-card__menu--desc">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="vertical-card__menu--title m-0">Multigrain Hot Cereal</h5>
                                            <h4>
                                                <span class="badge badge-primary">$ 54</span>
                                            </h4>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                            <p class="mb-0"><span>Ordered:</span> <strong class="text-dark">179</strong></p>
                                            <p class="mb-0"><span>Revenue:</span>  <strong class="text-dark">$1300</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                    <h4 class="card-title">Restaurent Rating</h4>
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs justify-content-end">
                                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#success1">Graph</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#info1">Review</a></li>
                                    </ul>
                                    <div class="tab-content tab-content-default">
                                        <div class="tab-pane fade active show" id="success1" role="tabpanel">
                                            <div class="row justify-content-between">
                                                <div class="col-md-6">
                                                    <canvas id="user_rating_graph"></canvas>
                                                </div>
                                                <div class="col-md-5">
                                                    <div>
                                                        <div class="d-flex justify-content-between">
                                                            <p>Food</p>
                                                            <p><b class="text-dark">220 </b> (10%)</p>
                                                        </div>
                                                        <div class="progress mt-2" style="height: 9px;">
                                                            <div class="progress-bar bg-primary" style="width: 50%;" role="progressbar"><span class="sr-only">50% Complete</span></div>
                                                        </div>                
                                                    </div>
                                                    <div class="mt-4">
                                                        <div class="d-flex justify-content-between">
                                                            <p>Service</p>
                                                            <p><b class="text-dark">420</b> (40%)</p>
                                                        </div>
                                                        <div class="progress mt-2" style="height: 9px;">
                                                            <div class="progress-bar bg-info" style="width: 50%;" role="progressbar"><span class="sr-only">50% Complete</span></div>
                                                        </div>                
                                                    </div>
                                                    <div class="mt-4">
                                                        <div class="d-flex justify-content-between">
                                                            <p>Waiting Time</p>
                                                            <p><b class="text-dark">260</b> (30%)</p>
                                                        </div>
                                                        <div class="progress mt-2" style="height: 9px;">
                                                            <div class="progress-bar bg-success" style="width: 50%;" role="progressbar"><span class="sr-only">50% Complete</span></div>
                                                        </div>                
                                                    </div>
                                                    <div class="mt-4">
                                                        <div class="d-flex justify-content-between">
                                                            <p>Others</p>
                                                            <p><b class="text-dark">460</b> (20%)</p>
                                                        </div>
                                                        <div class="progress mt-2" style="height: 9px;">
                                                            <div class="progress-bar bg-dark" style="width: 50%;" role="progressbar"><span class="sr-only">50% Complete</span></div>
                                                        </div>                
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="info1">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="media">
                                                        <img src="../../assets/images/avatar/1.jpg" width="35" alt="reviewer">
                                                        <div class="media-body ml-4">
                                                            <div class="d-flex justify-content-between">
                                                                <strong>Antony Jonus</strong>
                                                                <div class="vertical-card__menu--rating c-pointer">
                                                                    <span class="icon"><i class="fa fa-star"></i></span>
                                                                    <span class="icon"><i class="fa fa-star"></i></span>
                                                                    <span class="icon"><i class="fa fa-star"></i></span>
                                                                    <span class="icon"><i class="fa fa-star"></i></span>
                                                                    <span class="icon"><i class="fa fa-star-o"></i></span>
                                                                </div>
                                                            </div>
                                                            <p>
                                                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem, voluptatibus!
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="media mt-4">
                                                        <img src="../../assets/images/avatar/2.jpg" width="35" alt="reviewer">
                                                        <div class="media-body ml-4">
                                                            <div class="d-flex justify-content-between">
                                                                <strong>Antony Jonus</strong>
                                                                <div class="vertical-card__menu--rating c-pointer">
                                                                    <span class="icon"><i class="fa fa-star"></i></span>
                                                                    <span class="icon"><i class="fa fa-star"></i></span>
                                                                    <span class="icon"><i class="fa fa-star"></i></span>
                                                                    <span class="icon"><i class="fa fa-star"></i></span>
                                                                    <span class="icon"><i class="fa fa-star-o"></i></span>
                                                                </div>
                                                            </div>
                                                            <p>
                                                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem, voluptatibus!
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="media mt-4">
                                                        <img src="../../assets/images/avatar/1.jpg" width="35" alt="reviewer">
                                                        <div class="media-body ml-4">
                                                            <div class="d-flex justify-content-between">
                                                                <strong>Antony Jonus</strong>
                                                                <div class="vertical-card__menu--rating c-pointer">
                                                                    <span class="icon"><i class="fa fa-star"></i></span>
                                                                    <span class="icon"><i class="fa fa-star"></i></span>
                                                                    <span class="icon"><i class="fa fa-star"></i></span>
                                                                    <span class="icon"><i class="fa fa-star"></i></span>
                                                                    <span class="icon"><i class="fa fa-star-o"></i></span>
                                                                </div>
                                                            </div>
                                                            <p>
                                                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem, voluptatibus!
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="media mt-4">
                                                        <img src="../../assets/images/avatar/2.jpg" width="35" alt="reviewer">
                                                        <div class="media-body ml-4">
                                                            <div class="d-flex justify-content-between">
                                                                <strong>Antony Jonus</strong>
                                                                <div class="vertical-card__menu--rating c-pointer">
                                                                    <span class="icon"><i class="fa fa-star"></i></span>
                                                                    <span class="icon"><i class="fa fa-star"></i></span>
                                                                    <span class="icon"><i class="fa fa-star"></i></span>
                                                                    <span class="icon"><i class="fa fa-star"></i></span>
                                                                    <span class="icon"><i class="fa fa-star-o"></i></span>
                                                                </div>
                                                            </div>
                                                            <p>
                                                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem, voluptatibus!
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Visit Hour</h4>
                                <div class="row mb-3 mt-4">
                                    <div class="col text-center">
                                        <p class="mb-2 text-dark">Day</p>
                                        <h4><span class="text-success mdi mdi-arrow-up-bold"></span> 82.24 %</h4>
                                    </div>
                                    <div class="col text-center">
                                        <p class="mb-2 text-dark">Night</p>
                                        <h4><span class="text-danger mdi mdi-arrow-down-bold"></span> 12.24 %</h4>
                                    </div>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="visitor_graph"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
              <!--   <div class="row">

                    <div class="col-xl-4 col-lg-5 col-xxl-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Timeline</h4>
                                <div id="timeline-activity">
                                    <ul class="timeline mb-0">
                                        <li>
                                            <div class="timeline-badge bg-primary"></div>
                                            <a href="#" class="timeline-panel">
                                                <span>10 minutes ago</span>
                                                <h5 class="mt-2">New Order received</h5>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge bg-success"></div>
                                            <a href="#" class="timeline-panel">
                                                <span>20 minutes ago</span>
                                                <h5 class="mt-2">5 Orders Delivered</h5>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge bg-warning"></div>
                                            <a href="#" class="timeline-panel">
                                                <span>30 minutes ago</span>
                                                <h5 class="mt-2">3 New Tickets</h5>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge bg-danger"></div>
                                            <a href="#" class="timeline-panel">
                                                <span>15 minutes ago</span>
                                                <h5 class="mt-2">8 New Reviews</h5>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge bg-pink"></div>
                                            <a href="#" class="timeline-panel">
                                                <span>15 minutes ago</span>
                                                <h5 class="mt-2">50 New Facebook likes</h5>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7 col-xxl-8">
                        <div class="card world_map_card">
                            <div class="card-body">
                                <h4 class="card-title">Branches</h4>
                                <div class="row">
                                    <div class="col-xl-9 col-xxl-12">
                                        <div class="map">
                                            <div id="world-datamap"></div>                                    
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-xxl-12">
                                        <div class="d-flex justify-content-center h-100 flex-column">
                                            <ul class="list-group w-100">
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    Canada <span class="badge badge-primary">$ 999</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    USA <span class="badge badge-secondary">$ 500</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    Saudi Arabia <span class="badge badge-success">$ 900</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    Bangladesh <span class="badge badge-info">$ 500</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    Russia <span class="badge badge-warning">$ 250</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    Australia <span class="badge badge-danger">$ 700</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                
               <!--  <div class="row">  
                    <div class="col-lg-8">    
                        <div class="card">
                            <div class="card-body">
                                <div id="calendar" class="app-fullcalendar"></div>
                            </div>
                        </div>
                        <div class="modal fade none-border" id="event-modal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"><strong>Add New Event</strong></h4>
                                    </div>
                                    <div class="modal-body"></div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect"
                                            data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-success save-event waves-effect waves-light">Create
                                            event</button>
                                            
                                        <button type="button" class="btn btn-danger delete-event waves-effect waves-light"
                                            data-dismiss="modal">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade none-border" id="add-category">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"><strong>Add a category</strong></h4>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="control-label">Category Name</label>
                                                    <input class="form-control form-white" placeholder="Enter name"
                                                        type="text" name="category-name">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="control-label">Choose Category Color</label>
                                                    <select class="form-control form-white"
                                                        data-placeholder="Choose a color..." name="category-color">
                                                        <option value="success">Success</option>
                                                        <option value="danger">Danger</option>
                                                        <option value="info">Info</option>
                                                        <option value="pink">Pink</option>
                                                        <option value="primary">Primary</option>
                                                        <option value="warning">Warning</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect"
                                            data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light save-category"
                                            data-dismiss="modal">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xxl-4">
                        <div class="card performence_score">
                            <div class="card-body">
                                <h4 class="card-title">Performence Score</h4>
                                <div id="activity">
                                    <div class="media border-bottom pt-3 pb-3">
                                        <img src="../../assets/images/avatar/1.jpg" alt="avatar" class="mr-3">
                                        <div class="media-body">
                                            <h5 class="mt-1">Mark Twine</h5>
                                            <p class="mb-0">Senior Chef</p>
                                        </div>
                                        <span class="text-dark"><b>87</b> (100)</span>
                                    </div>
                                    <div class="media border-bottom pt-3 pb-3">
                                        <img src="../../assets/images/avatar/2.jpg" alt="avatar" class="mr-3">
                                        <div class="media-body">
                                            <h5 class="mt-1">Spillberg</h5>
                                            <p class="mb-0">Marketing Manager</p>
                                        </div>
                                        <span class="text-dark"><b>85</b> (100)</span>
                                    </div>
                                    <div class="media border-bottom pt-3 pb-3">
                                        <img src="../../assets/images/avatar/3.jpg" alt="avatar" class="mr-3">
                                        <div class="media-body">
                                            <h5 class="mt-1">John Doe</h5>
                                            <p class="mb-0">Senior Waiter</p>
                                        </div>
                                        <span class="text-dark"><b>80</b> (100)</span>
                                    </div>
                                    <div class="media border-bottom pt-3 pb-3">
                                        <img src="../../assets/images/avatar/4.jpg" alt="avatar" class="mr-3">
                                        <div class="media-body">
                                            <h5 class="mt-1">Alex Martin</h5>
                                            <p class="mb-0">General Manager</p>
                                        </div>
                                        <span class="text-dark"><b>75</b> (100)</span>
                                    </div>
                                    <div class="media border-bottom pt-3 pb-3">
                                        <img src="../../assets/images/avatar/5.jpg" alt="avatar" class="mr-3">
                                        <div class="media-body">
                                            <h5 class="mt-1">Brad Hussy</h5>
                                            <p class="mb-0">Manager</p>
                                        </div>
                                        <span class="text-dark"><b>70</b> (100)</span>
                                    </div>
                                    <div class="media border-bottom pt-3 pb-3">
                                        <img src="../../assets/images/avatar/6.jpg" alt="avatar" class="mr-3">
                                        <div class="media-body">
                                            <h5 class="mt-1">John Smith</h5>
                                            <p class="mb-0">Junior Chef</p>
                                        </div>
                                        <span class="text-dark"><b>67</b> (100)</span>
                                    </div>
                                    <div class="media pt-3 pb-3">
                                        <img src="../../assets/images/avatar/7.jpg" alt="avatar" class="mr-3">
                                        <div class="media-body">
                                            <h5 class="mt-1">John Johnson</h5>
                                            <p class="mb-0">Delivery Stuff</p>
                                        </div>
                                        <span class="text-dark"><b>60</b> (100)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="row">
                    

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Order List</h4>
                                <div class="table-responsive">
                                    <table class="table verticle-middle table-responsive-lg mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Order Name</th>
                                                <th scope="col">Custommer Name</th>
                                                <th scope="col">Location</th>
                                                <th scope="col">Delivery time</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>54565</td>
                                                <td>Fresh Crostini</td>
                                                <td>Adam Smith</td>
                                                <td>Gulshan</td>
                                                <td>10:20</td>
                                                <td>5</td>
                                                <td>$34</td>
                                                <td><span class="badge badge-xs badge-primary">Pending</span>
                                                </td>
                                                <td>
                                                    <span>
                                                        <a href="javascript:void()" class="mr-4" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-pencil color-muted"></i> </a>
                                                        <a href="javascript:void()" data-toggle="tooltip" data-placement="top" title="" data-original-title="Close"><i class="fa fa-close color-danger"></i></a>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>54565</td>
                                                <td>Multigrain Hot Cereal</td>
                                                <td>John Doe</td>
                                                <td>Baridhara</td>
                                                <td>3:00</td>
                                                <td>4</td>
                                                <td>$ 87</td>
                                                <td><span class="badge badge-xs badge-success">Delivered</span>
                                                </td>
                                                <td><span><a href="javascript:void()" class="mr-4" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-pencil color-muted"></i> </a><a href="javascript:void()" data-toggle="tooltip" data-placement="top" title="" data-original-title="Close"><i class="fa fa-close color-danger"></i></a></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>54235</td>
                                                <td>French Fry</td>
                                                <td>Maximillian</td>
                                                <td>Khilgaon</td>
                                                <td>2:00</td>
                                                <td>6</td>
                                                <td>$ 65</td>
                                                <td><span class="badge badge-xs badge-dark">Cencelled</span>
                                                </td>
                                                <td><span><a href="javascript:void()" class="mr-4" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-pencil color-muted"></i> </a><a href="javascript:void()" data-toggle="tooltip" data-placement="top" title="" data-original-title="Close"><i class="fa fa-close color-danger"></i></a></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>54587</td>
                                                <td>Fried Egg Sandwich</td>
                                                <td>John Johnson</td>
                                                <td>Gulshan</td>
                                                <td>11:00</td>
                                                <td>3</td>
                                                <td>$ 56</td>
                                                <td><span class="badge badge-xs badge-primary">Pending</span>
                                                </td>
                                                <td><span><a href="javascript:void()" class="mr-4" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-pencil color-muted"></i> </a><a href="javascript:void()" data-toggle="tooltip" data-placement="top" title="" data-original-title="Close"><i class="fa fa-close color-danger"></i></a></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>54521</td>
                                                <td>Pizza</td>
                                                <td>Mike Hussy</td>
                                                <td>Banani</td>
                                                <td>12:00</td>
                                                <td>5</td>
                                                <td>$ 65</td>
                                                <td><span class="badge badge-xs badge-warning">Pending</span>
                                                </td>
                                                <td><span><a href="javascript:void()" class="mr-4" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-pencil color-muted"></i> </a><a href="javascript:void()" data-toggle="tooltip" data-placement="top" title="" data-original-title="Close"><i class="fa fa-close color-danger"></i></a></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
     <!--    <div class="footer">
            <div class="copyright">
                <p><a href="templatespoint.net">Templates Point</a></p>
            </div>
        </div> -->
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
                            <!-- <span>
                                <input type="radio" name="sidebar_bg" value="color_11" class="filled-in chk-col-primary" id="sidebar_bg_11">
                                <label for="sidebar_bg_11"></label>
                            </span> -->
                            <span>
                                <input type="radio" name="sidebar_bg" value="color_12" class="filled-in chk-col-primary" id="sidebar_bg_12">
                                <label for="sidebar_bg_12"></label>
                            </span>
                            <span>
                                <input type="radio" name="sidebar_bg" value="color_13" class="filled-in chk-col-primary" id="sidebar_bg_13">
                                <label for="sidebar_bg_13"></label>
                            </span>
                            <span>
                                <input type="radio" name="sidebar_bg" value="color_14" class="filled-in chk-col-primary" id="sidebar_bg_14">
                                <label for="sidebar_bg_14"></label>
                            </span>
                            <span>
                                <input type="radio" name="sidebar_bg" value="color_15" class="filled-in chk-col-primary" id="sidebar_bg_15">
                                <label for="sidebar_bg_15"></label>
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
    
    <!-- Datamap -->
    <script src="../../assets/plugins/d3v3/index.js"></script>
    <script src="../../assets/plugins/topojson/topojson.min.js"></script>
    <script src="../../assets/plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Calender -->
    <script src="../../assets/plugins/jqueryui/js/jquery-ui.min.js"></script>
    <script src="../../assets/plugins/moment/moment.min.js"></script>
    <script src="../../assets/plugins/fullcalendar/js/fullcalendar.min.js"></script>
    <!-- ChartJS -->
    <script src="../../assets/plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- MorrisJS -->
    <script src="../../assets/plugins/raphael/raphael.min.js"></script>
    <script src="../../assets/plugins/morris/morris.min.js"></script>
    <!-- Owl carousel -->
    <script src="../../assets/plugins/owl.carousel/dist/js/owl.carousel.min.js"></script>
    <!-- Chartist -->
    <script src="../../assets/plugins/chartist/js/chartist.min.js"></script>
    <script src="../../assets/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>


    <!-- Init files -->
    <script src="../js/plugins-init/fullcalendar-init.js"></script>
    <script src="../js/dashboard/dashboard-1.js"></script>
     <script src="../../assets/plugins/webticker/jquery.webticker.min.js"></script>
     <script src="../js/plugins-init/components-init.js"></script>

</body>

</html>