<div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li><a href="admindashboard.php" aria-expanded="false"><i class="ti-home"></i><span class="nav-text">Dashboard</span></a></li>
                    <li class="nav-label">Entry</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="ti-share-alt"></i>Entry<span class="nav-text"></span>
                        </a>
                        <ul aria-expanded="false">
                              <?php 

                                $status = $_SESSION['status'];
                                // echo $status;
                                // $status_desc = "";
                                if ($status == 'admin')
                                {

                             ?>
                                    <li><a href="userlist.php"><i class="ti-user"></i>User list</a></li>
                                <?php } ?>
                              <li><a href="categorylist.php"><i class="ti-view-list"></i>Category list</a></li>
                                    <li><a href="foodlist.php"><i class="ti-view-list"></i>Food list</a></li>
                                     <li><a href="packagelist.php"><i class="ti-package"></i>Package list</a></li>
                                    <!-- <li><a href="foodpackagelist.php"><i class="ti-view-list"></i>Package Food list</a></li> -->
                                    <!-- <li><a href="events.php"><i class="ti-view-list"></i>Events list</a></li> -->
                                    <li><a href="giveaways.php"><i class="ti-view-list"></i>Freebies list</a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="ti-server"></i>Transaction<span class="nav-text"></span>
                        </a>
                        <ul aria-expanded="false">
                              <li><a href="pendinglist.php"><i class="ti-reload"></i>Pending list</a></li>
                              <li><a href="approvelist.php"><i class="ti-check-box"></i>Approve list</a></li>
                        </ul>
                    </li>
                     <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="ti-reload"></i>History<span class="nav-text"></span>
                        </a>
                        <ul aria-expanded="false">
                              <li><a href="customerhistory.php"><i class="ti-archive"></i>Customer History</a></li>
                        </ul>
                    </li>
                      <?php 

                                $status = $_SESSION['status'];
                                // echo $status;
                                // $status_desc = "";
                                if ($status == 'admin')
                                {

                             ?>
                     <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="ti-bar-chart"></i>Reports<span class="nav-text"></span>
                        </a>
                        <ul aria-expanded="false">
                               <li><a href="monthlysalesreport.php"><i class="ti-stats-up"></i>Monthly Reports</a></li>
                        </ul>
                    </li>
                <?php } ?>
                 <!--    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon-layers"></i><span class="nav-text">Layouts</span></a>
                        <ul aria-expanded="false">
                            <li><a href="layout-blank.html">Blank</a></li>
                            <li><a href="layout-one-column.html">One Column</a></li>
                            <li><a href="layout-two-column.html">Two column</a></li>
                            <li><a href="layout-fixed-header.html">Fixed Header</a></li>
                            <li><a href="layout-fixed-sidebar.html">Fixed Sidebar</a></li>
                            <li><a href="layout-horizontal-nav.html">Horizontal</a></li>
                            <li><a href="layout-rtl.html">RTL</a></li>
                            <li><a href="layout-boxed.html">Boxed</a></li>
                            <li><a href="layout-wide-boxed.html">Wide Boxed</a></li>
                            <li><a href="layout-wide.html">Wide</a></li>
                            <li><a href="layout-dark.html">Dark</a></li>
                            <li><a href="layout-light.html">Light</a></li>
                        </ul>
                    </li> -->
                   <!--  <li class="nav-label">Apps</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon-screen-smartphone"></i><span class="nav-text">Apps</span></a>
                        <ul aria-expanded="false">
                            <li><a href="email-inbox.html">Mailbox</a></li>
                            <li><a href="app-profile.html">Profile</a></li>
                            <li><a href="app-calender.html">Calendar</a></li>
                        </ul>
                    </li> -->
                    <!-- <li><a href="charts.html" aria-expanded="false"><i class="icon-chart"></i> <span class="nav-text">Charts</ --><!-- span></a></li>
                    <li class="nav-label">UI Components</li>
                    <li><a href="ui-bootstrap.html" aria-expanded="false"><i class="icon-diamond"></i><span class="nav-text">UI Bootstrap</span></a></li>
                    <li><a href="components.html" aria-expanded="false"><i class="icon-puzzle"></i><span class="nav-text">Components</span></a></li>
                    <li><a href="widget-basic.html" aria-expanded="false"><i class="icon-badge"></i><span class="nav-text">Widget</span></a></li>
                    <li class="nav-label">Forms</li>
                    <li><a href="forms.html" aria-expanded="false"><i class="icon-settings"></i><span class="nav-text">Forms</span></a></li>
                    <li class="nav-label">Table</li>
                    <li><a href="tables.html" aria-expanded="false"><i class="icon-briefcase"></i><span class="nav-text">Table</span></a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon-globe"></i><span class="nav-text">Pages</span></a>
                        <ul aria-expanded="false">
                            <li><a href="page-login.html">Login</a></li>
                            <li><a href="page-register.html">Register</a></li>
                            <li><a href="page-user-lock.html">Lock Screen</a></li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Erorr</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="page-error-400.html">Erorr 400</a></li>
                                    <li><a href="page-error-403.html">Erorr 403</a></li>
                                    <li><a href="page-error-404.html">Erorr 404</a></li>
                                    <li><a href="page-error-500.html">Erorr 500</a></li>
                                    <li><a href="page-error-503.html">Erorr 503</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> -->

                </ul>
            </div>
        </div>