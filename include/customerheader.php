<!-- <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav> -->
  <section id="topbar" class="d-flex align-items-center fixed-top ">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-center justify-content-lg-start">
      <i class="bi bi-phone d-flex align-items-center"><span>+1 5589 55488 55</span></i>
      <i class="bi bi-clock ms-4 d-none d-lg-flex align-items-center"><span>Mon-Sat: 11:00 AM - 23:00 PM</span></i>
    </div>
  </section>
      <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <div class="logo me-auto">
        <h1><a href="index.html">Misyel's Catering</a></h1>
        
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="customerdashboard.php">Home</a></li>
          <!-- <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#menu">Menu</a></li>
          <li><a class="nav-link scrollto" href="#events">Events</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li> -->
          <li class="dropdown"><a href="#"><span>Order List</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <?php 
                  $id = $_SESSION['customer_id'];
                  $query = mysqli_query($con, "SELECT COUNT(*) as count FROM tblTransaction WHERE status_id = 1 AND customer_id = $id");
                  $num_rows = mysqli_fetch_array($query);
               ?>
              <li><a href="pendingCustomer.php">Pending Reserve (<?php echo $num_rows['count']; ?>)</a> </li>
              <!-- <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li> -->
              <?php 
                  $query = mysqli_query($con, "SELECT COUNT(*) as count FROM tblTransaction WHERE status_id = 2  AND customer_id = $id");
                  $num_rows = mysqli_fetch_array($query);
               ?>
              <li><a href="ApproveCustomer.php">Approve Reserve (<?php echo $num_rows['count']; ?>)</a></li>

              <?php 
                  $query = mysqli_query($con, "SELECT COUNT(*) as count FROM tblTransaction WHERE status_id = 3  AND customer_id = $id");
                  $num_rows = mysqli_fetch_array($query);
               ?>
              <!-- <li><a href="DeclineCustomer.php">Decline Reserve (<?php echo $num_rows['count']; ?>)</a></li> -->
             <!--  <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li> -->
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Menu List</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              
              <li><a href="order.php">Food Menu</a> </li>
              <li><a href="packagemenu.php">Package Menu</a> </li>
            </ul>
          </li>
          <?php 
              $query = mysqli_query($con, "SELECT * FROM tblorder WHERE customer_id = $customer_id AND act_no = 0");
              $countrows = mysqli_num_rows($query);
           ?>
           <li class="dropdown"><a href="#"><span>My Cart(<?php echo $countrows; ?>)</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              
              <li><a href="cart.php">Food Cart</a> </li>
              <li><a href="packagecart.php">Package Cart</a> </li>
            </ul>
          </li>
          <!-- <li><a class="nav-link scrollto" href="cart.php"></a></li> -->
          <!-- <li><a class="nav-link scrollto" href="order.php">Menu</a></li> -->
          <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
          <!-- <li><a class="nav-link scrollto" href="#chefs">Chefs</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li> -->
          
          <!-- <li><a class="nav-link scrollto" href="login.php">Login</a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

      <!-- <a href="#book-a-table" class="book-a-table-btn scrollto">Book a table</a> -->

    </div>
  </header>