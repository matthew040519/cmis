<?php 
session_start();
  if (!isset($_SESSION['username'])) {
    header("location: ../../index.php");
  }
  // echo $_SESSION['customer_name'];
  include('../../include/connection.php');

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

        <div style="text-align: center;">
                <img src="../../images/mainlogo.jpg">
                <h1>Misyel's Catering</h1>
                <h2>Monthly Sales Report</h2>
                <h3>Date From: <?php echo $_GET['bdate']; ?> To <?php echo $_GET['edate']; ?></h3>

               
        </div>
        <div class="margin-top: 50px;">
                 <table style="width: 100%" class="table">
                                         <thead class="text-capitalize">
                                            <tr>
                                                <th>Date</th>
                                                <th>Transaction Code</th>
                                                <th>Customer</th>
                                                <th>Client Number</th>
                                                <th>Location</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php 
                                    $sum = 0;
                                    $bdate = date("m/d/Y", strtotime($_GET['bdate']));
                                $edate = date("m/d/Y", strtotime($_GET['edate']));
                                        $query = mysqli_query($con, "SELECT * FROM `tbltransaction` INNER JOIN tblstatus ON tblstatus.status_id=tbltransaction.status_id inner join tblcustomer on tblcustomer.customer_id=tbltransaction.customer_id INNER JOIN tblorder ON tblorder.order_code=tbltransaction.transaction_number WHERE tbltransaction.status_id = 2 AND tbltransaction.return_deliver = 1 AND tbltransaction.tdate BETWEEN '$bdate' AND '$edate'");
                                        while($row = mysqli_fetch_array($query)){
                                            $sum += $row['price'];
                                     ?>
                                    <tr>
                                        <td><?php echo $row['tdate']; ?></td>
                                        <td><?php echo $row['transaction_number']; ?></td>
                                                <td><?php echo $row['fullname']; ?></td>
                                                <td><?php echo $row['contact_number']; ?></td>
                                                <td><?php echo $row['location']; ?></td>
                                                <td><?php echo number_format($row['price'], 2); ?></td>
                                               
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <td colspan="5">Total Sales</td>
                                        <td colspan="5"><?php echo number_format($sum, 2); ?></td>
                                    </tr>
                                        </tbody>
                                    </table>
        </div>
        
      
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
    <script type="text/javascript">window.print()</script>


</body>


</html>