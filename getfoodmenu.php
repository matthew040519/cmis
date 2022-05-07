 <?php 
        include('include/connection.php'); 
 $id = $_GET['id'];
  ?>
 <div class="col-sm-4" style="margin-top: 10px;">
    <?php 
            $queryPackage = mysqli_query($con, "SELECT * FROM tblpackage WHERE package_id='$id'");
            while($rowPackage = mysqli_fetch_array($queryPackage)){
     ?>
     <!-- <p></p> -->
     <img class="img-thumbnail" width="100%" height="100%"  style="height: 300px; width: 100%;" src="images/package/<?php echo $rowPackage['image']; ?>">
      <br>
      <br>
     <h2><?php echo $rowPackage['package_desc']; ?></h2>
    <?php } ?>
 </div>
 <?php
 
                $query2 = mysqli_query($con,"SELECT * FROM tblsetpackage inner join tblpackage on tblpackage.package_id=tblsetpackage.package_id inner join tblfoods on tblfoods.food_id=tblsetpackage.food_id where tblsetpackage.package_id = '$id'");
                while($row1 = mysqli_fetch_array($query2)){
                   $food_code = $row1['food_code'];
             ?>
          <div class="col-sm-3" style="margin-top: 10px;">
           <!--  <div class="menu-content">
              <a href="#"></a>
            </div> -->
             <?php 
                  $queryimage = mysqli_query($con, "SELECT *, MAX(fimage_id) as fimage_id FROM `tblfoodimage` WHERE food_code = '$food_code'");
                  $rowImage = mysqli_fetch_array($queryimage);
               ?>

            <div class="menu-ingredients">
              
             <img class="gallery-lightbox" width="100%" style="height: 300px;" src="images/food/<?php echo $rowImage['image']; ?>">
             <li style="list-style: none;"><?php echo $row1['food_desc']; ?> </li>

             <li style="list-style: none;">
               <span>Good For (<?php echo $row1['food_serve']; ?>) Person/s</span>
             </li>
              <br>
             <form method="POST" action="order.php?id=<?php echo $row1['food_id']; ?>">
              <div class="form-group">
                <input type="text" readonly="" value="<?php echo $row1['qty']; ?>" name="quantity" value="0" class="form-control" />
              </div>
             
             </form>
            </div>
          </div>
          <?php } ?>    
          <div class="row mt-5">
            <div class="col-lg-4">
                
            </div>
             <div class="col-lg-4">
                <div class="form-group">
                <label>Quantity: </label>
                <input type="number" name="qty">
              </div>
            </div>
             <div class="col-lg-4">
                <input type="submit" value="Submit" class="btn btn-primary" name="submit">
            </div>
              
          </div>
           