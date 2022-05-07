<?php 
session_start();
  if (!isset($_SESSION['username'])) {
    header("location: index.php");
  }
  // echo $_SESSION['profile_pic'];
  include('include/connection.php');
  $id = $_GET['id'];
 ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Misyel's Catering</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="images/mainlogo.jpg" rel="icon">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    

</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <?php include('include/adminsidebar.php'); ?>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <?php include('include/secretaryheader.php'); ?>
            <!-- header area end -->
            <!-- page title area start -->
            
            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- sales report area start -->
                
                <!-- sales report area end -->
                <!-- visitor graph area start -->
                <!-- <div class="card mt-5">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-5">
                            <h4 class="header-title mb-0">Visitor Graph</h4>
                            <select class="custome-select border-0 pr-3">
                                <option selected="">Last 7 Days</option>
                                <option value="0">Last 7 Days</option>
                            </select>
                        </div>
                        <div id="visitor_graph"></div>
                    </div>
                </div> -->
                <!-- visitor graph area end -->
                <!-- order list area start -->
                <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <?php 

                                                    // $food_id = $row['food_id'];
                                                    // echo $food_id;
                                                    $queryFood = mysqli_query($con, "SELECT * FROM tblfoods WHERE food_id = '$id'");
                                                    while($rowFood = mysqli_fetch_array($queryFood)):
                                                        $id = $rowFood['food_id'];
                                                        $category_id = $rowFood['category_id'];
                                                        $active = $rowFood['active'];

                                                 ?>
                                                <form method="POST">
                                                     <!-- <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Food Image</label>
                                                        <input class="form-control" type="file" name="food_image" id="example-text-input">
                                                    </div> -->
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Category Description</label>
                                                        <!-- <input class="form-control" type="text" name="category_description" id="example-text-input"> -->
                                                        <select class="custom-select" name="category_description" id="example-text-input">
                                                            <?php 
                                                                $query1 = mysqli_query($con, "SELECT * FROM tblcategory WHERE active = 1");
                                                                while($row1 = mysqli_fetch_array($query1)){
                                                             ?>
                                                             <option value="<?php echo $row1['category_id']; ?>" <?php 
                                if ($row1['category_id'] == $category_id)
                                {
                                  echo "selected";
                                }
                             ?>><?php echo $row1['category_desc']; ?></option>
                                                         <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Food Description</label>
                                                        <input class="form-control" value="<?php echo $rowFood['food_desc']; ?>" type="text" name="food_description" id="example-text-input">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Food Price</label>
                                                        <input class="form-control" value="<?php echo $rowFood['price']; ?>" type="number" name="foor_price" id="example-text-input">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Good For People</label>
                                                        <input class="form-control" type="number" value="<?php echo $rowFood['food_serve']; ?>" name="food_serve" id="example-text-input">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Food Details</label>
                                                        <!-- <input class="form-control" type="number" name="food_serve" id="example-text-input"> -->
                                                        <textarea class="form-control" name="food_details" rows="4"><?php echo $rowFood['food_details']; ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Available</label>
                                                        <!-- <input class="form-control" type="text" name="category_description" id="example-text-input"> -->
                                                        <select class="custom-select" name="active" id="example-text-input">
                                                           
                                                             <option value="1"  <?php if($active == 1){ echo "selected"; }?>>Available</option>
                                                        
                                                            <option value="0" <?php if($active == 0){ echo "selected"; }?>>Not Available</option>
                                                      
                                                        </select>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                               <!--  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                                <button type="submit" name="update" class="btn btn-primary">Save changes</button>
                                            </div>
                                            </form>
                                <?php endwhile; ?>

                                 <?php 
                                        if (isset($_POST['update']))
                                        {
                                            $category_description = $_POST['category_description'];
                                            $food_description = $_POST['food_description'];
                                            $foor_price = $_POST['foor_price'];
                                            $food_details = $_POST['food_details'];
                                            $food_serve = $_POST['food_serve'];
                                            $active_desc = $_POST['active'];

                                            $queryUpdate = mysqli_query($con, "UPDATE `tblfoods` SET `food_desc`='$food_description',`category_id`='$category_description',`price`='$foor_price',`active`='$active_desc',`food_serve`='$food_serve',`food_details`='$food_details' WHERE food_id= '$id'");
                            // }

                                            echo "<script>window.location.replace('foodlist.php')</script>";
                                        }
                                        

                                     ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade bd-example-modal-lg">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Add Food</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                               
                                        </div>
                                    </div>
                                    <?php 
                                        if (isset($_POST['submit']))
                                        {
                                            $category_description = $_POST['category_description'];
                                            $food_description = $_POST['food_description'];
                                            $foor_price = $_POST['foor_price'];
                                            $food_details = $_POST['food_details'];

                                            $target = "images/food/". basename($_FILES['food_image']['name']);
                                            $image = $_FILES['food_image']['name'];
                                            $food_serve = $_POST['food_serve'];

                                            $query = mysqli_query($con, "INSERT INTO `tblfoods`(`food_id`, `food_desc`, `food_image`, `category_id`, `price`, `food_serve`, `food_details`) VALUES (NULL,'$food_description', '$image', '$category_description', '$foor_price', '$food_serve', '$food_details')");

                                              if (move_uploaded_file($_FILES['food_image']['tmp_name'], $target)){
                              echo "<script>alert('Successfully Upload')</script>";
                            } else {
                              echo "<script>alert('Error!')</script>";
                            }

                                            echo "<script>window.location.replace('foodlist.php')</script>";
                                        }
                                        

                                     ?>
                                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <?php include('include/footer.php'); ?>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>
        <ul class="nav offset-menu-tab">
            <li><a class="active" data-toggle="tab" href="#activity">Activity</a></li>
            <li><a data-toggle="tab" href="#settings">Settings</a></li>
        </ul>
        <div class="offset-content tab-content">
            <div id="activity" class="tab-pane fade in show active">
                <div class="recent-activity">
                    <div class="timeline-task">
                        <div class="icon bg1">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Added</h4>
                            <span class="time"><i class="ti-time"></i>7 Minutes Ago</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>You missed you Password!</h4>
                            <span class="time"><i class="ti-time"></i>09:20 Am</span>
                        </div>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="fa fa-bomb"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Member waiting for you Attention</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="ti-signal"></i>
                        </div>
                        <div class="tm-title">
                            <h4>You Added Kaji Patha few minutes ago</h4>
                            <span class="time"><i class="ti-time"></i>01 minutes ago</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg1">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Ratul Hamba sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Hello sir , where are you, i am egerly waiting for you.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="fa fa-bomb"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="ti-signal"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                </div>
            </div>
            <div id="settings" class="tab-pane fade">
                <div class="offset-settings">
                    <h4>General Settings</h4>
                    <div class="settings-list">
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Notifications</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch1" />
                                    <label for="switch1">Toggle</label>
                                </div>
                            </div>
                            <p>Keep it 'On' When you want to get all the notification.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show recent activity</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch2" />
                                    <label for="switch2">Toggle</label>
                                </div>
                            </div>
                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show your emails</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch3" />
                                    <label for="switch3">Toggle</label>
                                </div>
                            </div>
                            <p>Show email so that easily find you.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show Task statistics</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch4" />
                                    <label for="switch4">Toggle</label>
                                </div>
                            </div>
                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Notifications</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch5" />
                                    <label for="switch5">Toggle</label>
                                </div>
                            </div>
                            <p>Use checkboxes when looking for yes or no answers.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all bar chart activation -->
    <script src="assets/js/bar-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
