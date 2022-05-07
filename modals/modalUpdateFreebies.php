   <div class="modal fade" id="exampleModalpopover1<?php echo $row['giveaways_id']; ?>">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Update Freebies</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php 

                                                            $food_id = $row['food_id'];
                                                            $giveaways_id = $row['giveaways_id'];

                                                            $queryFreebies = mysqli_query($con, "SELECT * FROM tblgiveaways WHERE giveaways_id = '$giveaways_id'");
                                                            $rowFreebies = mysqli_fetch_array($queryFreebies);

                                                     ?>
                                   <form method="POST" enctype="multipart/form-data">
                                                   <!--   <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Food Image</label>
                                                        <input class="form-control" type="file" name="food_image" id="example-text-input">
                                                    </div> -->
                                                    <input type="hidden" value="<?php echo $row['giveaways_id']; ?>" name="freebies_id">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Food Description</label>
                                                        <!-- <input class="form-control" type="text" name="category_description" id="example-text-input"> -->
                                                        <select class="custom-select" name="food_description" id="example-text-input">
                                                            <?php 
                                                                $query1 = mysqli_query($con, "SELECT * FROM tblfoods WHERE active = 1");
                                                                while($row1 = mysqli_fetch_array($query1)){
                                                             ?>
                                                             <option value="<?php echo $row1['food_id']; ?>" <?php if ($food_id == $row1['food_id']) { echo "selected"; } ?>><?php echo $row1['food_desc']; ?></option>
                                                         <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Price From: </label>
                                                        <input class="form-control" value="<?php echo $rowFreebies['begin_price']; ?>" type="number" name="price_from" id="example-text-input">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Price To: </label>
                                                        <input class="form-control" value="<?php echo $rowFreebies['limit_price']; ?>" type="number" name="price_to" id="example-text-input">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Qty</label>
                                                        <input class="form-control" value="<?php echo $rowFreebies['qty']; ?>" type="number" name="qty" id="example-text-input">
                                                    </div>
                                               <!--      <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Food Price</label>
                                                        <input class="form-control" type="number" name="foor_price" id="example-text-input">
                                                    </div> -->
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="update" class="btn btn-primary">Save changes</button>
                                            </div>
                                            </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                   <?php 
                                        if (isset($_POST['submit']))
                                        {
                                            $food_description = $_POST['food_description'];
                                            $price_from = $_POST['price_from'];
                                            $price_to = $_POST['price_to'];
                                            $qty = $_POST['qty'];

                                            // $target = "images/food/". basename($_FILES['food_image']['name']);
                                            // $image = $_FILES['food_image']['name'];

                                            $query = mysqli_query($con, "INSERT INTO `tblgiveaways`(`giveaways_id`, `food_id`, `begin_price`, `limit_price`, `qty`) VALUES (NULL,'$food_description','$price_from','$price_to', '$qty')");

                            //                   if (move_uploaded_file($_FILES['food_image']['tmp_name'], $target)){
                            //   echo "<script>alert('Successfully Upload')</script>";
                            // } else {
                            //   echo "<script>alert('Error!')</script>";
                            // }

                                            echo "<script>window.location.replace('giveaways.php')</script>";
                                        }
                                        
                                        
                                        

                                     ?>