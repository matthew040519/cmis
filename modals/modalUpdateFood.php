<div class="modal fade bd-example-modal-lg<?php echo $food_id; ?>">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Update <?php echo $row['food_desc']; ?></h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <?php 

                                                    // $food_id = $row['food_id'];
                                                    // echo $food_id;
                                                    $queryFood = mysqli_query($con, "SELECT * FROM tblfoods WHERE food_id = '$food_id'");
                                                    while($rowFood = mysqli_fetch_array($queryFood)):
                                                        $id = $rowFood['food_id'];
                                                        $category_id = $rowFood['category_id'];
                                                        $active = $rowFood['active'];

                                                 ?>
                                                <form method="POST">
                                                     <div class="form-group" style="display: none;">
                                                        <label for="example-text-input" class="col-form-label">Food Image</label>
                                                        <input class="form-control" type="text" name="food_id" id="example-text-input" value="<?php echo $food_id; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Category Description</label>
                                                        <!-- <input class="form-control" type="text" name="category_description" id="example-text-input"> -->
                                                        <select class="custom-select" name="category_description" id="example-text-input">
                                                            <?php 
                                                                $query1 = mysqli_query($con, "SELECT * FROM tblcategory WHERE active = 1");
                                                                while($row1 = mysqli_fetch_array($query1)){
                                                             ?>
                                                             <option value="<?php echo $row1['category_id']; ?>" <?php 
                                if ($row1['category_id'] == $category_id)
                                {
                                  echo "selected";
                                }
                             ?>><?php echo $row1['category_desc']; ?></option>
                                                         <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Food Description</label>
                                                        <input class="form-control" value="<?php echo $rowFood['food_desc']; ?>" type="text" name="food_description" id="example-text-input">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Food Price</label>
                                                        <input class="form-control" value="<?php echo $rowFood['price']; ?>" type="number" name="foor_price" id="example-text-input">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Good For People</label>
                                                        <input class="form-control" type="number" value="<?php echo $rowFood['food_serve']; ?>" name="food_serve" id="example-text-input">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Food Details</label>
                                                        <!-- <input class="form-control" type="number" name="food_serve" id="example-text-input"> -->
                                                        <textarea class="form-control" name="food_details" rows="4"><?php echo $rowFood['food_details']; ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Available</label>
                                                        <!-- <input class="form-control" type="text" name="category_description" id="example-text-input"> -->
                                                        <select class="custom-select" name="active" id="example-text-input">
                                                           
                                                             <option value="1"  <?php if($active == 1){ echo "selected"; }?>>Available</option>
                                                        
                                                            <option value="0" <?php if($active == 0){ echo "selected"; }?>>Not Available</option>
                                                      
                                                        </select>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="update" class="btn btn-primary">Save changes</button>
                                            </div>
                                            </form>
                                             <?php 
                                        if (isset($_POST['update']))
                                        {
                                            $category_description = $_POST['category_description'];
                                            $food_description = $_POST['food_description'];
                                            $foor_price = $_POST['foor_price'];
                                            $food_details = $_POST['food_details'];
                                            $food_serve = $_POST['food_serve'];
                                            $active_desc = $_POST['active'];
                                            $foodid = $_POST['food_id'];

                                            $queryUpdate = mysqli_query($con, "UPDATE `tblfoods` SET `food_desc`='$food_description',`category_id`='$category_description',`price`='$foor_price',`active`='$active_desc',`food_serve`='$food_serve',`food_details`='$food_details' WHERE food_id= '$foodid'");
                            // }

                                            echo "<script>window.location.replace('foodlist.php')</script>";
                                        }
                                        

                                     ?>
                                        <?php endwhile; ?>
                                        </div>
                                    </div>
                                    
                                </div>