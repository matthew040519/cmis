<?php 
  
  include('include/connection.php');

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Misyel's Catering</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="images/mainlogo.jpg" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Delicious - v4.2.0
  * Template URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center fixed-top topbar-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-center justify-content-lg-start">
       <i class="bi bi-phone d-flex align-items-center"><span> 0923-7235909</span></i>
      <i class="bi bi-clock ms-4 d-none d-lg-flex align-items-center"><span>Mon-Sun: 09:00 AM - 04:00 PM</span></i>
    </div>
  </section>


  <?php 

    if(isset($_GET['book']))
    {
      echo "<script>alert('Book Successfuly')</script>";
    }

   ?>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <div class="logo me-auto">
        <h1><a href="index.php">Misyel's Catering</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#menu">Menu</a></li>
          <!-- <li><a class="nav-link scrollto" href="#specials">Specials</a></li> -->
          <!-- <li><a class="nav-link scrollto" href="#events">Events</a></li> -->
          
          <!-- <li><a class="nav-link scrollto" href="#chefs">Chefs</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li> -->
          <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="nav-link scrollto" href="login.php">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <!-- <a href="#book-a-table" class="book-a-table-btn scrollto">Book a table</a> -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background: url('images/company_image/J17_2564.jpg');">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"><span>Misyel's</span> Catering</h2>
                <p class="animate__animated animate__fadeInUp">Misyels Catering Services
Since 1994 onwards...
Try us and for sure and "pangita-ngita-on mogid"</p>
                <div>
                  <a href="#menu" class="btn-menu animate__animated animate__fadeInUp scrollto">Our Menu</a>
                  <!-- <a href="#book-a-table" class="btn-book animate__animated animate__fadeInUp scrollto">Book a Table</a> -->
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background: url('images/company_image/J17_2578.jpg');">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"><span>Misyel's</span> Catering</h2>
                <p class="animate__animated animate__fadeInUp">Misyels Catering Services
Since 1994 onwards...
Try us and for sure and "pangita-ngita-on mogid"</p>
                <div>
                  <a href="#menu" class="btn-menu animate__animated animate__fadeInUp scrollto">Our Menu</a>
                  <!-- <a href="#book-a-table" class="btn-book animate__animated animate__fadeInUp scrollto">Book a Table</a> -->
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background: url('images/company_image/JS4_7435_1.jpg');">
            <!-- <div class="carousel-background"><img src="images/company_image/J17_2523.jpg" alt=""></div> -->
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"><span>Misyel's</span> Catering</h2>
                <p class="animate__animated animate__fadeInUp">Misyels Catering Services
Since 1994 onwards...
Try us and for sure and "pangita-ngita-on mogid"</p>
                <div>
                  <a href="#menu" class="btn-menu animate__animated animate__fadeInUp scrollto">Our Menu</a>
                  <!-- <a href="#book-a-table" class="btn-book animate__animated animate__fadeInUp scrollto">Book a Table</a> -->
                </div>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">

          <!-- <div class="col-lg-5 align-items-stretch video-box" style='background-image: url("assets/img/about.jpg");'>
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>
 -->
          <div class="col-lg-12">

            <div class="content">
              <h3>Misyel???s @ your Service!!!</h3>
              <br>
              <p style="text-indent: 30px;">
             What started with pork barbecue, mango and ube cakes, and lengua with mushroom sauce for ???to go??? orders in 1994, to customers??? preferred choices, now has more than a thousand platter stories to tell.
How could a newbie graduate, fresh from Marketing Management in De La Salle University, try to help support the family???s dwindling finances? With her brother???s demise and her dad???s illness, and armed only with an assortment of chairs, and her parents??? wedding gifts of assorted plates, utensils, and glasses, she had to help cater for as many as thirty guests at a time. With one driver, one waiter, one office staff, one cook and one baker, and with Michelle to work as the manager and her mother to handle the marketing, Team Misyel was formed.
</p>
<br>

<p style="text-indent: 30px;">
Their recipes??? main secret ingredients were and are the same: faith and hard work. 
In 1997 came another crisis, when Michelle???s dad passed away. The loss of their family???s main breadwinner was a hard hit, with loans for the hospital bills and two brothers still in school. But they persevered; what little Michelle and her family had saved, they started their small central kitchen, utilizing her Dad???s old pickup as their delivery service, and they started accepting catering orders for up to fifty to a hundred guests. The seven men and women pioneers of Misyel???s were reinforced by Michelle???s two brothers, who have since gone on their own. 
</p>
<br>
<p style="text-indent: 30px;">
And as the pages of Misyel???s story increase so do the catering services - weddings, baptisms, blessings, packed foods, and burial catering. 
What started as ???Misyel??? good foods concocted in the small kitchen spread by word of mouth. Twenty-five years later, Misyel???s can cater to a maximum of 1000 pax buffet and even do simultaneous caterings on different venues in a day. Its biggest catering event so far was 15,000 packed lunches and 10,000 snack packs. 
</p>  
<br>
<p style="text-indent: 30px;">
Misyel???s is also honored to have catered for different Presidents of our country, famous artists and personalities, and national conventions. From the northern to the southern points of the province, Misyel???s men and women have a vast wealth of experience serving their valuable clients.
Continuous innovation, improvement of its menus and services, and earnestly welcoming constructive suggestions ??? Team Misyel???s men and women are committed to serving quality foods and rendering good service.
</p>
<br>
<p style="text-indent: 30px;">
Misyel???s,  has come a long, long way. It is still an unfinished story but is worth the telling and the re-telling. 
Misyel???s. Truly pangita-ngitaon mo gid guiapon.
</p>
              </p>
              <!-- <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p>
              <ul>
                <li><i class="bx bx-check-double"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="bx bx-check-double"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="bx bx-check-double"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
              </ul>
              <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                culpa qui officia deserunt mollit anim id est laborum
              </p> -->
            </div>

          </div>

        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Whu Us Section ======= -->
    <!-- <section id="why-us" class="why-us">
      <div class="container">

        <div class="section-title">
          <h2>Why choose <span>Our Restaurant</span></h2>
          <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="box">
              <span>01</span>
              <h4>Lorem Ipsum</h4>
              <p>Ulamco laboris nisi ut aliquip ex ea commodo consequat. Et consectetur ducimus vero placeat</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box">
              <span>02</span>
              <h4>Repellat Nihil</h4>
              <p>Dolorem est fugiat occaecati voluptate velit esse. Dicta veritatis dolor quod et vel dire leno para dest</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box">
              <span>03</span>
              <h4> Ad ad velit qui</h4>
              <p>Molestiae officiis omnis illo asperiores. Aut doloribus vitae sunt debitis quo vel nam quis</p>
            </div>
          </div>

        </div>

      </div>
    </section> --><!-- End Whu Us Section -->

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
      <div class="container">

        <div class="section-title">
          <h2>Check our tasty <span>Menu</span></h2>
        </div>

       <!--  <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="menu-flters">
              <li data-filter="*" class="filter-active">Show All</li>
              <li data-filter=".filter-starters">Starters</li>
              <li data-filter=".filter-salads">Salads</li>
              <li data-filter=".filter-specialty">Specialty</li>
            </ul>
          </div>
        </div> -->

        <div class="row menu-container">
          <?php 
              $query = mysqli_query($con, "SELECT * FROM tblcategory WHERE active = 1");
              while ($row = mysqli_fetch_array($query)){
                $id = $row['category_id'];
           ?>
          <div class="col-lg-6 menu-item filter-starters">
            <div class="menu-content">
              <a href="#"><?php echo $row['category_desc']; ?> </a>
            </div>

            

            <div class="menu-ingredients ">
              <?php 
                $query2 = mysqli_query($con,"SELECT * FROM tblfoods WHERE category_id = $id");
                while($row1 = mysqli_fetch_array($query2)){
             ?>
             <!--  <a href="#"><?php echo $row1['food_desc']; ?></a><span style="float: right;">&#8369;<?php echo number_format($row1['price'], 2); ?></span> -->
             <li style="list-style: none;"><?php echo $row1['food_desc']; ?> <span>(<?php echo $row1['food_serve']; ?>) Person/s</span> <span style="float: right;">&#8369; <?php echo number_format($row1['price'], 2); ?></span></li>
            <?php } ?>
            </div>
          </div>
        <?php } ?>
          <!-- <div class="col-lg-6 menu-item filter-starters">
            <div class="menu-content">
              <a href="#">Lobster Bisque</a><span>$5.95</span>
            </div>
            <div class="menu-ingredients">
              Lorem, deren, trataro, filede, nerada
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-specialty">
            <div class="menu-content">
              <a href="#">Bread barrel</a><span>$6.95</span>
            </div>
            <div class="menu-ingredients">
              Lorem, deren, trataro, filede, nerada
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-starters">
            <div class="menu-content">
              <a href="#">Crab Cake</a><span>$7.95</span>
            </div>
            <div class="menu-ingredients">
              A delicate crab cake served on a toasted roll with lettuce and tartar sauce
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-salads">
            <div class="menu-content">
              <a href="#">Caesar Selections</a><span>$8.95</span>
            </div>
            <div class="menu-ingredients">
              Lorem, deren, trataro, filede, nerada
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-specialty">
            <div class="menu-content">
              <a href="#">Tuscan Grilled</a><span>$9.95</span>
            </div>
            <div class="menu-ingredients">
              Grilled chicken with provolone, artichoke hearts, and roasted red pesto
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-starters">
            <div class="menu-content">
              <a href="#">Mozzarella Stick</a><span>$4.95</span>
            </div>
            <div class="menu-ingredients">
              Lorem, deren, trataro, filede, nerada
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-salads">
            <div class="menu-content">
              <a href="#">Greek Salad</a><span>$9.95</span>
            </div>
            <div class="menu-ingredients">
              Fresh spinach, crisp romaine, tomatoes, and Greek olives
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-salads">
            <div class="menu-content">
              <a href="#">Spinach Salad</a><span>$9.95</span>
            </div>
            <div class="menu-ingredients">
              Fresh spinach with mushrooms, hard boiled egg, and warm bacon vinaigrette
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-specialty">
            <div class="menu-content">
              <a href="#">Lobster Roll</a><span>$12.95</span>
            </div>
            <div class="menu-ingredients">
              Plump lobster meat, mayo and crisp lettuce on a toasted bulky roll
            </div>
          </div> -->

        </div>

      </div>
    </section><!-- End Menu Section -->

    <!-- ======= Specials Section ======= -->
    
    <!-- End Specials Section -->

    <!-- ======= Events Section ======= -->
    <!-- <section id="events" class="events">
      <div class="container">

        <div class="section-title">
          <h2>Organize Your <span>Events</span></h2>
        </div>

        <div class="events-slider swiper-container">
          <div class="swiper-wrapper">
              <?php   
                    $query = mysqli_query($con, "SELECT * FROM tblevents WHERE active = 1");
                    while($row = mysqli_fetch_array($query)){
               ?>
            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="images/events/<?php echo $row['events_image']; ?>" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3><?php  echo $row['events_desc']; ?></h3>
                  <div class="price">
                    <p><span>&#8369; <?php  echo number_format($row['events_price'], 2); ?></span></p>
                  </div>
                  <p class="fst-italic">
                   <?php echo $row['events_details'];  ?>
                  </p>
                
                </div>
              </div>
            </div>
                  <?php   } ?>
           

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section> -->
    <!-- End Events Section -->

    <!-- ======= Book A Table Section ======= -->
  <!--   <section id="book-a-table" class="book-a-table">
      <div class="container">

        <div class="section-title">
          <h2>Book a <span>Catering</span></h2>
          <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>

        <form method="POST">
          <div class="row">
            <div class="col-lg-4 col-md-6 form-group">
              <input type="text" name="name" class="form-control" required="" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              <input type="text" class="form-control" required="" name="location" id="location" placeholder="Your Location">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              <input type="text" class="form-control" required="" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="text" name="date" class="form-control" required="" id="date" placeholder="Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="text" class="form-control" required="" name="time" id="time" placeholder="Time" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
          
             <select class="form-control" name="package" required="" id="package">
                <?php 
                                                                $query = mysqli_query($con, "SELECT * FROM tblpackage WHERE active = 1");
                                                                while($row = mysqli_fetch_array($query)){
                                                             ?>
                                                             <option value="<?php echo $row['package_id']; ?>"><?php echo $row['package_desc']; ?></option>
                                                         <?php } ?>
             </select>
              <div class="validate"></div>
            </div>
          </div>
         
          <div class="mb-3">
          
          </div>
          <div class="text-center"><button class="btn btn-primary" style="background-color: #FFA012; border: 0;" type="submit" name="book" >Book</button></div>
        </form>

      </div>
    </section> --><!-- End Book A Table Section -->
    <?php 

      if(isset($_POST['book']))
      {
          $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 12; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

          date_default_timezone_set('Asia/Manila');
          $tdate = date("m/d/Y");
          $name = $_POST['name'];
          $location = $_POST['location'];
          $phone = $_POST['phone'];
          $date = $_POST['date']; 
          $time = $_POST['time'];
          $package = $_POST['package'];

          $query = mysqli_query($con, "INSERT INTO `tbltransaction`(`transaction_id`, `transaction_number`, `name`, `location`, `contact_number`, `tdate`, `time`, `package_id`, `todaydate`) VALUES (NULL,'$randomString','$name','$location','$phone','$date','$time','$package', '$tdate')");

          echo "<script>window.location.replace('index.php?book')</script>";
      }

     ?>

    <!-- ======= Gallery Section ======= -->
    <!-- <section id="gallery" class="gallery">
      <div class="container-fluid">

        <div class="section-title">
          <h2>Some photos from <span>Our Restaurant</span></h2>
          <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>

        <div class="row no-gutters">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-1.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-2.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-3.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-4.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-5.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-6.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-7.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-8.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section> --><!-- End Gallery Section -->

    <!-- ======= Chefs Section ======= -->
    <!-- <section id="chefs" class="chefs">
      <div class="container">

        <div class="section-title">
          <h2>Our Proffesional <span>Chefs</span></h2>
          <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="member">
              <div class="pic"><img src="assets/img/chefs/chefs-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Walter White</h4>
                <span>Master Chef</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member">
              <div class="pic"><img src="assets/img/chefs/chefs-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Patissier</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member">
              <div class="pic"><img src="assets/img/chefs/chefs-3.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>Cook</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section> --><!-- End Chefs Section -->

    <!-- ======= Testimonials Section ======= -->
    <!-- <section id="testimonials" class="testimonials">
      <div class="container position-relative">

        <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div> --><!-- End testimonial item -->

            <!-- <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div> --><!-- End testimonial item -->

            <!-- <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div> --><!-- End testimonial item -->

            <!-- <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div> --><!-- End testimonial item -->

            <!-- <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div> --><!-- End testimonial item -->

          <!-- </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section> --><!-- End Testimonials Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2><span>Contact</span> Us</h2>
          <!-- <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p> -->
        </div>
      </div>

     <!--  <div class="map">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
      </div> -->
      <div class="mapouter"><div class="gmap_canvas"><iframe width="1200" height="350" id="gmap_canvas" src="https://maps.google.com/maps?q=MISYEL'S%20CATERING%20SERVICES%2026%20Street,%20Calamba,%20Mandalagan,%20Bacolod%20City,%20Negros%20Occidental,%2025th%20St,%20Bacolod,%20Negros%20Occidental&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://fmovies-online.net">fmovies</a><br><style>.mapouter{position:relative;text-align:right;width: 100%; height: 350px;;}</style><a href="https://www.embedgooglemap.net">build custom google map</a><style>.gmap_canvas {overflow:hidden;background:none!important;width: 100%; height: 350px;;}</style></div></div>
      <div style="width: 100px; background-color:red;"></div>
      <div class="container mt-5">

        <div class="info-wrap">
          <div class="row">
            <div class="col-lg-3 col-md-6 info">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>

 
              <p>26 Street, Calamba, Mandalagan,<br>Bacolod City, Negros Occidental</p>
            </div>

            <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
              <i class="bi bi-clock"></i>
              <h4>Open Hours:</h4>
              <p>Monday-Sunday:<br>09:00 AM - 04:00 PM</p>
            </div>

            <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>info@example.com<br>contact@example.com</p>
            </div>

            <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
              <i class="bi bi-phone"></i>
              <h4>Call:</h4>
              <p> 0923-7235909<br></p>
            </div>
          </div>
        </div>

        <!-- <form action="forms/contact.php" method="post" role="form" class="php-email-form">
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
          </div>
          <div class="my-3">
        
          </div>
          <div class="text-center"><button type="submit">Send Message</button></div>
        </form> -->

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <!-- <footer id="footer">
    <div class="container">
      <h3>Delicious</h3>
      <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>Delicious</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer> -->
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>