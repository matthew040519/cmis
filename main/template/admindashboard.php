<?php 
session_start();
  if (!isset($_SESSION['username'])) {
    header("location: ../../index.php");
  }
  
  include('../../include/connection.php');
  $user_id = $_SESSION['user_id'];

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
    <script type="text/javascript">
         window.onload = function() {

$.getJSON("graphBySales.php", function (result) {

        var chart = new CanvasJS.Chart("chartContainer", {
            theme: "light2",
            animationEnabled: true,
            title: {
                text: "Daily Sales"
            },
            axisX: {
                title: "Dates"
            },
            axisY: {
                title: "Sales"
            },

            data: [
            {
                type: "spline",
                dataPoints: result
            }
            ]
        });

        chart.render();
            });
$.getJSON("graphByMonthlySales.php", function (result) {

        var chart = new CanvasJS.Chart("chartContainer1", {
            theme: "light2",
            animationEnabled: true,
            title: {
                text: "Monthly Sales"
            },
            axisX: {
                title: "Months"
            },
            axisY: {
                title: "Sales"
            },

            data: [
            {
                type: "column",
                dataPoints: result
            }
            ]
        });

        chart.render();
            });
}
    </script>
    
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
        <?php include('include/adminheader.php'); ?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php include('include/adminsidebar.php'); ?>
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
                        <h3 class="content-heading mt-3"></h3>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row counter-wrapper">
                                    <div class="col-sm-3 col-6">
                                        <div class="card-body text-center">
                                            <?php 
                                                    $query = mysqli_query($con, "SELECT COUNT(*) as count FROM tblorder WHERE order_code = ''");
                                                    $row = mysqli_fetch_array($query);
                                             ?>
                                            <h4 class="counter"><?php echo $row['count']; ?></h4>
                                            <span>Orders</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-6">
                                        <div class="card-body text-center">
                                            <?php 
                                                    $query = mysqli_query($con, "SELECT COUNT(*) as count FROM tbltransaction WHERE status_id = 2 AND return_deliver = 0");
                                                    $row = mysqli_fetch_array($query);
                                             ?>
                                            <h4 class="counter"><?php echo $row['count']; ?></h4>
                                            <span>Delivered</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-6">
                                        <div class="card-body text-center">
                                            <?php 
                                            date_default_timezone_set('Asia/Manila');
                                        $tdate = date("m/d/Y");
                                                    $query = mysqli_query($con, "SELECT COUNT(*) as count FROM tbltransaction WHERE status_id = 1 AND return_deliver = 0 AND tbltransaction.tdate >= '$tdate'");
                                                    $row = mysqli_fetch_array($query);
                                             ?>
                                            <h4 class="counter"><?php echo $row['count']; ?></h4>
                                            <span>Pending</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-6">
                                        <div class="card-body text-center">
                                            <?php 

                                $status = $_SESSION['status'];
                                // echo $status;
                                // $status_desc = "";
                                if ($status == 'admin')
                                {

                             ?>
                                            <?php 
                                                    $query = mysqli_query($con, "SELECT SUM(tblorder.price) as price FROM tbltransaction INNER JOIN tblorder ON tblorder.order_code=tbltransaction.transaction_number WHERE status_id = 2 AND return_deliver = 1");
                                                    $row = mysqli_fetch_array($query);
                                             ?>
                                            <h4 class="counter"><?php echo number_format($row['price'], 2); ?></h4>
                                        <?php } else { ?>
                                            <?php 
                                            $id = $_SESSION['user_id'];
                                                    $query = mysqli_query($con, "SELECT SUM(tblorder.price) as price FROM tbltransaction INNER JOIN tblorder ON tblorder.order_code=tbltransaction.transaction_number WHERE status_id = 2 AND return_deliver = 1 AND user_id = $id");
                                                    $row = mysqli_fetch_array($query);
                                             ?>
                                            <h4 class="counter"><?php echo number_format($row['price'], 2); ?></h4>
                                        <?php } ?>
                                            <span>Earned</span>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
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
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <!-- <h3 class="content-heading">Best Seller</h3> -->
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div id="chartContainer" style="height: 300px; width: 100%;"></div> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <!-- <h3 class="content-heading">Best Seller</h3> -->
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div id="chartContainer1" style="height: 300px; width: 100%;"></div> 
                            </div>
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
      
        <!--**********************************
            Footer end
        ***********************************-->

        
        <!--**********************************
            Right sidebar start
        ***********************************-->
        
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
    <!-- Calender -->
    <script src="../../assets/plugins/jqueryui/js/jquery-ui.min.js"></script>
    <script src="../../assets/plugins/moment/moment.min.js"></script>
    <script src="../../assets/plugins/fullcalendar/js/fullcalendar.min.js"></script>
   
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
  <!--    <?php
    $dataPoints = array(
    array("y" => 17363, "label" => "2005-06"),
    array("y" => 28726, "label" => "2006-07"),
    array("y" => 35000, "label" => "2007-08"),
    array("y" => 25250, "label" => "2008-09"),
    array("y" => 19750, "label" => "2009-10"),
    array("y" => 18850, "label" => "2010-11"),
    array("y" => 26700, "label" => "2011-12"),
    array("y" => 16000, "label" => "2012-13"),
    array("y" => 19000, "label" => "2013-14"),
    array("y" => 18000, "label" => "2014-15")
    );
?>
     <script>

    $(function () {
        var chart = new CanvasJS.Chart("chartContainer", {
            theme: "light2",
            animationEnabled: true,
            title: {
                text: "Analysis of Pepper Export - India"
            },
            axisX: {
                title: "Year"
            },
            axisY: {
                title: "In Tonnes"
            },

            data: [
            {
                type: "spline",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }
            ]
        });

        chart.render();
    });
</script> -->
     <script src="canvasjs.min.js"></script>

</body>

</html>