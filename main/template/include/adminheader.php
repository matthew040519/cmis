<div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr">MC</b>
                    <span class="brand-title"><b>Misyel's Catering</b></span>
                </a>
            </div>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="toggle-icon"><i class="ti-menu"></i></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="header-left">
                  
                </div>
                <div class="header-right">

                    <ul class="clearfix">
                        <li class="icons">
                            <a href="javascript:void(0)" class="">
                                <i class="ti-email"></i>
                                <?php 

                                $query = mysqli_query($con, "SELECT count(*) as count FROM tblfeedback WHERE click = 0");
                                $row= mysqli_fetch_array($query);
                                 ?>
                                <span class="badge badge-danger"><?php echo $row['count']; ?></span>
                            </a>
                            <div class="drop-down animated flipInX">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <?php 
                                        $querytransaction = mysqli_query($con, "SELECT * FROM tblfeedback INNER JOIN tblcustomer ON tblcustomer.customer_id=tblfeedback.customer_id ORDER BY tblfeedback.feedback_id DESC");
                                        while($rowTransaction = mysqli_fetch_array($querytransaction)){
                                            $click = $rowTransaction['click'];
                                         ?>
                                        <li class="notification-unread" >
                                            <a href="feedbackdetails.php?id=<?php echo $rowTransaction['feedback_id'];?>&fullname=<?php echo $rowTransaction['fullname']; ?>">
                                                <img class="float-left mr-3 avatar-img" src="../../assets/images/avatar/1.jpg" alt="">
                                                <div class="notification-content" >
                                                    <div class="notification-text" style="color: <?php if ($click == 0) { echo 'blue'; } else { echo 'black'; } ?>">New Feedback FROM <?php echo $rowTransaction['fullname']; ?></div>
                                                    <div class="notification-timestamp"><?php echo $rowTransaction['tdate']; ?></div>
                                                </div>
                                            </a>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                    <!-- <a class="d-flex justify-content-center bg-primary px-4 text-white" href="email-inbox.html">
                                        <span>See all messagese </span>
                                    </a> -->
                                </div>
                            </div>
                        </li>
                        <li class="icons">
                            <a href="javascript:void(0)" class="">
                                <i class="ti-bell"></i>
                                <?php 

                                $query = mysqli_query($con, "SELECT count(*) as count FROM tbltransaction WHERE click = 0");
                                $row= mysqli_fetch_array($query);
                                 ?>
                                <span class="badge badge-danger"><?php echo $row['count']; ?></span>
                            </a>
                            <div class="drop-down animated flipInX">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <?php 
                                        $querytransaction = mysqli_query($con, "SELECT * FROM tbltransaction ORDER BY transaction_id DESC");
                                        while($rowTransaction = mysqli_fetch_array($querytransaction)){
                                            $click = $rowTransaction['click'];
                                         ?>
                                        <li class="notification-unread" >
                                            <a href="transactiondetails.php?id=<?php echo $rowTransaction['transaction_id'];?>&transactionNumber=<?php echo $rowTransaction['transaction_number']; ?>">
                                                <img class="float-left mr-3 avatar-img" src="../../assets/images/avatar/1.jpg" alt="">
                                                <div class="notification-content" >
                                                    <div class="notification-text" style="color: <?php if ($click == 0) { echo 'blue'; } else { echo 'black'; } ?>">New Order! Transaction Code: <?php echo $rowTransaction['transaction_number']; ?></div>
                                                    <div class="notification-timestamp"><?php echo $rowTransaction['tdate']; ?></div>
                                                </div>
                                            </a>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                    <!-- <a class="d-flex justify-content-center bg-primary px-4 text-white" href="email-inbox.html">
                                        <span>See all messagese </span>
                                    </a> -->
                                </div>
                            </div>
                        </li>
                        <li class="icons">
                            <div class="user-img c-pointer-x">
                                <span class="activity active"></span>
                                <img src="../../assets/images/user/1.png" height="40" width="40" alt="avatar">
                            </div>
                            <div class="drop-down dropdown-profile animated flipInX">
                                <div class="dropdown-content-body">
                                    <ul>
                                        
                                        <li><a href="logout.php"><i class="ti-power-off"></i> <span>Logout</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>


            </div>
        </div>