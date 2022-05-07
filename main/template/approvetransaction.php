<?php 
session_start();
  if (!isset($_SESSION['fullname'])) {
    header("location: ../../index.php");
  }
  // echo $_SESSION['customer_name'];
  include('../../include/connection.php');
  // echo $_SESSION['student_id'];
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
    <!-- JS Grid -->
    <link rel="stylesheet" href="../../assets/plugins/jsgrid/css/jsgrid.min.css">
    <link rel="stylesheet" href="../../assets/plugins/jsgrid/css/jsgrid-theme.min.css">
    <!-- Footable -->
    <link rel="stylesheet" href="../../assets/plugins/footable/css/footable.bootstrap.min.css">
    <!-- Bootgrid -->
    <link rel="stylesheet" href="../../assets/plugins/jquery-bootgrid/dist/jquery.bootgrid.min.css">
    <!-- Datatable -->
    <link href="../../assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
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

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <!-- <div class="breadcrumb-range-picker">
                        <span><i class="icon-calender"></i></span>
                        <span class="ml-1">August 08, 2017 - August 08, 2017</span>
                    </div> -->
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Approve List</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">

                <!-- <div class="row">
                     <div style="col-6">
                        <h3>Purok List</h3>
                    </div>
                    <div style="col-6">
                        <h3 class="content-heading">Purok List</h3>
                         <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalpopover">Modal with tooltip</button>
                    </div>
                </div> -->
               
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-right" style="margin-bottom: 20px;">
               <!--  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalpopover"><i class="ti-plus"></i> Add Disease</button> -->
              </div>
              <div class="float-left">
              <h4 class="card-title">Approve List</h4>
          </div>
                                <div class="table-responsive">
                                    <table id="example" class="display">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>Date</th>
                                                <th>Transaction Code</th>
                                                <th>Customer</th>
                                                <th>Client Number</th>
                                                <th>Location</th>
                                                <th>Ordered Food</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php 
                                        $query = mysqli_query($con, "SELECT * FROM `tbltransaction` INNER JOIN tblstatus ON tblstatus.status_id=tbltransaction.status_id inner join tblcustomer on tblcustomer.customer_id=tbltransaction.customer_id WHERE tbltransaction.status_id = 2 AND tbltransaction.customer_id = '$customerid'");
                                        while($row = mysqli_fetch_array($query)){
                                            $transaction_number = $row['transaction_number'];

                                            // $queryItems = mysqli_query($con, "");
                                     ?>
                                    <tr>
                                        <td><?php echo $row['tdate']; ?></td>
                                        <td><?php echo $row['transaction_number']; ?></td>
                                                <td><?php echo $row['fullname']; ?></td>
                                                <td><?php echo $row['contact_number']; ?></td>
                                                <td><?php echo $row['location']; ?></td>
                                                <td><button type="button" class="btn btn-primary btn-flat btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg<?php echo $row['transaction_number'];  ?>"><span>View items</span>
                                </button></td>
                                          
                                    </tr>
                                    <?php include('../../modals/modalViewFood.php'); ?>
                                    <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalpopover">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Add Disease</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                   <!--  <h5>Popover in a modal</h5>
                                                    <p>This <a href="#" role="button" data-container="body" data-toggle="popover" class="btn btn-secondary popover-test" title="Popover title" data-content="Popover body content is set in this attribute.">button</a> triggers a popover on click.</p>
                                                    <hr>
                                                    <h5>Tooltips in a modal</h5>
                                                    <p><a href="#" class="tooltip-test text-primary" data-toggle="tooltip" title="Told you!">This link</a> and <a href="#" class="tooltip-test text-primary" data-toggle="tooltip" title="Another one!">that link</a> have tooltips on hover.</p> -->
                                    <form class="form-valide" method="post">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label" for="val-username">Disease Name <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-9">
                                                        <input type="text" required="" class="form-control" id="val-username" name="disease_name" placeholder="Enter a Disease Name..">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                            <input type="submit" class="btn btn-primary success-alert-right-bottom" value="Save changes" name="submit">
                                                        </div>
                                                        </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php 

                                        if (isset($_POST['submit'])) {
                                            $disease_name = $_POST['disease_name'];

                                            $query = mysqli_query($con, "INSERT INTO `tbldisease`(`disease_id`, `disease_desc`) VALUES (NULL, '$disease_name')");

                                            echo "<script>window.location.replace('diseaselist.php')</script>";
                                        }

                                     ?>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <!-- <p><a href="templatespoint.net">Templates Point</a></p> -->
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        
        <!--**********************************
            Right sidebar start
        ***********************************-->
        <!-- <div class="sidebar-right">
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
        </div> -->
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
    <script src="../../assets/plugins/bootstrap4-notify/bootstrap-notify.min.js"></script>
    <script src="../../assets/plugins/jquery-validation/jquery.validate.min.js"></script>
    <!-- JS Grid -->
    <script src="../../assets/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="../../assets/plugins/jsgrid/js/jsgrid.min.js"></script>
    <!-- Footable -->
    <script src="../../assets/plugins/footable/js/footable.min.js"></script>
    <!-- Bootgrid -->
    <script src="../../assets/plugins/jquery-bootgrid/dist/jquery.bootgrid.min.js"></script>
    <!-- Datatable -->
    <script src="../../assets/plugins/datatables/js/jquery.dataTables.min.js"></script>


    <!-- JS Grid Init -->
    <script src="../js/plugins-init/jsgrid-init.js"></script>
    <script src="../js/plugins-init/footable-init.js"></script>
    <script src="../js/plugins-init/jquery.bootgrid-init.js"></script>
    <script src="../js/plugins-init/datatables.init.js"></script>



</body>


</html>