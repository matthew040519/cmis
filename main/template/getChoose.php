 <?php 
		include('../../include/connection.php');
		$id = $_GET['id'];

        if ($id == "Food")
        {?>
            <div class="row">
                 <?php 

                            $query = mysqli_query($con, "SELECT * FROM `tblfoods` ORDER BY food_id DESC");
                            while($row = mysqli_fetch_array($query)){
                                 $food_code = $row['food_code'];
                                 $active = $row['active'];
                    ?>
            <div class="col-xl-4 col-xxl-4 col-md-4 col-sm-4">
                        <!-- <div class="owl-carousel offer_card_carousel" id="offer_card_carousel"> -->
                              
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
                                <div class="card-body">
                                    <div class="vertical-card__menu--desc">
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
                                        <div class="vertical-card__menu--rating c-pointer">
                                            <!-- <span class="icon"><i class="fa fa-star"></i></span>
                                            <span class="icon"><i class="fa fa-star"></i></span>
                                            <span class="icon"><i class="fa fa-star"></i></span>
                                            <span class="icon"><i class="fa fa-star"></i></span>
                                            <span class="icon"><i class="fa fa-star-o"></i></span> -->
                                        </div>
                                    </div>
                                </div>
                              <!--   <div class="col-lg-12 pl-0">
                                    <div class="card-body d-flex align-items-center h-100">
                                        <ul class="w-100 m-0">
                                            <li class="mb-4">
                                                <div class="d-flex justify-content-between">
                                                    <h4 class="d-inline-block">Porota</h4>
                                                    <span class="badge badge-primary">2 Piece</span>
                                                </div>
                                                <span>Classic marinara sauce</span>
                                            </li>
                                            <li class="mb-4">
                                                <div class="d-flex justify-content-between">
                                                    <h4 class="d-inline-block">Chicken</h4>
                                                    <span class="badge badge-primary">4 Piece</span>
                                                </div>
                                                <span>Classic marinara sauce</span>
                                            </li>
                                            <li class="mb-4">
                                                <div class="d-flex justify-content-between">
                                                    <h4 class="d-inline-block">Vegatible</h4>
                                                    <span class="badge badge-primary">250 Gm</span>
                                                </div>
                                                <span>Classic marinara sauce</span>
                                            </li>
                                            <li class="mb-4">
                                                <div class="d-flex justify-content-between">
                                                    <h4 class="d-inline-block">Cold Drinks</h4>
                                                    <span class="badge badge-primary">2 Glass</span>
                                                </div>
                                                <span>Classic marinara sauce</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div> -->
                            </div>
                                   <div class="card-footer d-flex justify-content-between align-items-center">
                                     <?php 
                                if ($active == 1){
                             ?>
                                <form method="POST">  

                                <div>
                                   <div style="float: left; width: 100%;">
                                        <span class="icon"><i class="fa fa-map-marker"></i></span>
                                        Quantity: 
                                        <input type="number" class="form-control" value="0" name="qty">
                                        <input type="text" style="display: none;" class="form-control" value="<?php echo $row['food_code']; ?>" name="code">
                                    </div>
                                    <div style="float: right; margin-top: 10px;">
                                         <input type="submit"  class="btn btn-primary" value="Add to Cart" name="add_to_cart">
                                         <input type="hidden" value="food" name="type">
                                       <!--  <span class="icon"><i class="fa fa-motorcycle"></i></span>
                                        <span>10 min</span>
                                        <span class="icon ml-2"><i class="fa fa-clock-o"></i></span>
                                        <span>15min</span> -->

                                    </div>
                                </div>
                              
                                </form>
                            <?php } else { ?>
                                <div>
                                    <h2>Not Available!</h2>
                                </div>
                            <?php } ?>
                            </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
               <!--  </div>
            </div> -->

        </div>
      <?php  } else {?>
        <div class="row">
             <?php 

                            $query = mysqli_query($con, "SELECT * FROM `tblpackage` ORDER BY package_id DESC");
                            while($row = mysqli_fetch_array($query)){
                                 // $food_code = $row['food_code'];
                                 $active = $row['active'];
                    ?>
        <div class="col-xl-4 col-xxl-4 col-md-4 col-sm-4">
                        <!-- <div class="owl-carousel offer_card_carousel" id="offer_card_carousel"> -->
                             
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
                                   
                                    <img style="height: 300px;" src="../../images/package/<?php echo $row['image'] ?>" alt="Menu">
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="vertical-card__menu--desc p-3">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="vertical-card__menu--title"><?php echo $row['package_desc']; ?></h4>
                                        <div class="vertical-card__menu--fav">
                                            <a href="javascript:void()"><i class="fa fa-heart-o"></i></a>
                                        </div>
                                    </div>
                                    <!-- <p>Good for: <?php echo $row['food_serve']; ?> People</p> -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2 class="vertical-card__menu--price">&#8369;<span><?php echo number_format($row['package_price'], 2); ?></span></h2>
                                        <div class="vertical-card__menu--rating c-pointer">
                                            <!-- <span class="icon"><i class="fa fa-star"></i></span>
                                            <span class="icon"><i class="fa fa-star"></i></span>
                                            <span class="icon"><i class="fa fa-star"></i></span>
                                            <span class="icon"><i class="fa fa-star"></i></span>
                                            <span class="icon"><i class="fa fa-star-o"></i></span> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 pl-0">
                                    <div class="card-body d-flex align-items-center h-100">
                                        <ul class="w-100 m-0">
                                            <li><?php echo $row['package_details']; ?></li>
                                            <!-- <?php 

                                                $id = $row['package_id'];

                                                $queryPackage = mysqli_query($con, "SELECT * FROM tblsetpackage INNER JOIN tblfoods ON tblfoods.food_id=tblsetpackage.food_id WHERE tblsetpackage.package_id='$id'");
                                                while($rowPackage = mysqli_fetch_array($queryPackage)){

                                             ?>
                                            <li class="mb-4">
                                                <div class="d-flex justify-content-between">
                                                    <h4 class="d-inline-block"><?php echo $rowPackage['food_desc']; ?></h4>
                                                    <span class="badge badge-primary"><?php echo $rowPackage['food_serve']; ?> Piece</span>
                                                </div>
                                                <span><?php echo $rowPackage['food_details']; ?></span>
                                            </li>
                                        <?php } ?> -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <?php 
                                if ($active == 1){
                             ?>
                                <form method="POST">  

                                <div>
                                    <div style="float: left; width: 100%;">
                                        <span class="icon"><i class="fa fa-map-marker"></i></span>
                                        Quantity: 
                                        <input type="number" class="form-control" value="0" name="qty">
                                        <input type="text" style="display: none;" class="form-control" value="<?php echo $row['package_code']; ?>" name="code">
                                    </div>
                                    <div style="float: right; margin-top: 10px;">
                                         <input type="submit"  class="btn btn-primary" value="Add to Cart" name="add_to_cart">
                                         <input type="hidden" value="package" name="type">
                                       <!--  <span class="icon"><i class="fa fa-motorcycle"></i></span>
                                        <span>10 min</span>
                                        <span class="icon ml-2"><i class="fa fa-clock-o"></i></span>
                                        <span>15min</span> -->

                                    </div>
                                </div>
                              
                                </form>
                            <?php } else { ?>
                                <div>
                                    <h2>Not Available!</h2>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                        </div>
                        <?php } ?>
                   
            </div>
      <?php } ?>

 