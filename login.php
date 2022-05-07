<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Misyel's Catering</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Satisfy&display=swap" rel="stylesheet"> -->
    <link href="images/mainlogo.jpg" rel="icon">
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">
    
</head>

<body >
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>

    <?php 

                    if (isset($_GET['register']))
                    {
                        echo "<script>alert('Register Success!')</script>";
                    }

                    session_start();
                    include('include/connection.php');
                    if (isset($_POST['login']))
                    {
                        $username = $_POST['username'];
                        $password = md5($_POST['password']);
                        // echo "asas";
                        $query = mysqli_query($con, "SELECT * FROM tbluser WHERE username = '$username' AND password = '$password' AND status='admin'");
                        $queryrow = mysqli_num_rows($query);
                        $row = mysqli_fetch_array($query);

                        $query1 = mysqli_query($con, "SELECT * FROM tbluser WHERE username = '$username' AND password = '$password' AND status='secretary'");
                        $queryrow1 = mysqli_num_rows($query1);
                        $row1 = mysqli_fetch_array($query1);

                        $query2 = mysqli_query($con, "SELECT * FROM tblcustomer WHERE username = '$username' AND password = '$password'");
                        $queryrow2 = mysqli_num_rows($query2);
                        $row2 = mysqli_fetch_array($query2);

                        if ($queryrow > 0)
                        {
                          $_SESSION['username'] = true;
                          $_SESSION['username'] = $row['username'];
                          // $_SESSION['profile_pic'] = $row['profile_pic'];
                          $_SESSION['user_id'] = $row['user_id'];
                          $_SESSION['status'] = $row['status'];
                          echo "<script>window.location.replace('main/template/admindashboard.php')</script>";
                        }
                        else if ($queryrow1 > 0)
                        {
                          $_SESSION['username'] = true;
                          $_SESSION['username'] = $row1['username'];
                          // $_SESSION['profile_pic'] = $row1['profile_pic'];
                          $_SESSION['user_id'] = $row1['user_id'];
                            $_SESSION['status'] = $row1['status'];

                          // date_default_timezone_set('Asia/Manila');
                          // $tday = Date("m/d/Y");
                          // $id =  $row1['user_id'];
                          // $insertdata = mysqli_query($con, "INSERT INTO `tbllogdata`(`log_id`, `member_id`, `tdate`, `logtypecode`) VALUES (NULL,'$id','$tday',1)");

                          echo "<script>window.location.replace('main/template/admindashboard.php')</script>";
                        }
                        else if ($queryrow2 > 0)
                        {
                          $_SESSION['fullname'] = true;
                          $_SESSION['fullname'] = $row2['fullname'];
                          // $_SESSION['profile_pic'] = $row1['profile_pic'];
                          $_SESSION['customer_id'] = $row2['customer_id'];

                          // date_default_timezone_set('Asia/Manila');
                          // $tday = Date("m/d/Y");
                          // $id =  $row1['user_id'];
                          // $insertdata = mysqli_query($con, "INSERT INTO `tbllogdata`(`log_id`, `member_id`, `tdate`, `logtypecode`) VALUES (NULL,'$id','$tday',1)");

                          header("location: main/template/customerdashboard.php");
                        }
                        else {
                          echo "<script>alert('Wrong Username Or Password')</script>";
                        }
                    }

                 ?>


    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area" style="background-image: url('imageslogin/banner.jpg');">
        <div class="container">
            <div class="login-box ptb--50">
                <form method="POST">
                    <div class="login-form-head" style="background-color: white;">
                       <h1><a href="index.php">Misyel's Catering</a></h1>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" name="username" id="exampleInputEmail1">
                            <i class="ti-email"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" id="exampleInputPassword1">
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>
                        <!-- <div class="row mb-4 rmber-area">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <a href="#">Forgot Password?</a>
                            </div>
                        </div> -->
                        <div class="submit-btn-area">
                            <button id="form_submit" name="login" type="submit">Login <i class="ti-key"></i></button>
                           <!--  <div class="login-other row mt-4">
                                <div class="col-6">
                                    <a class="fb-login" href="#">Log in with <i class="fa fa-facebook"></i></a>
                                </div>
                                <div class="col-6">
                                    <a class="google-login" href="#">Log in with <i class="fa fa-google"></i></a>
                                </div>
                            </div> -->
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Don't have an account? <a href="register.php">Sign up</a></p>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>