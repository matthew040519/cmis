<div class="modal fade bd-example-modal-lg<?php echo $package_id; ?>">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Update <?php echo $row['package_desc']; ?></h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <?php 

                                                    // $food_id = $row['food_id'];
                                                    // echo $food_id;
                                                    $queryPackage = mysqli_query($con, "SELECT * FROM tblpackage WHERE package_id = '$package_id'");
                                                    while($rowPackage = mysqli_fetch_array($queryPackage)):
                                                        // $id = $rowFood['food_id'];
                                                        // $category_id = $rowFood['category_id'];
                                                        $active = $rowPackage['active'];

                                                 ?>
                                                <form method="POST">
                                                    
                                                    <div class="form-group" style="display: none;">
                                                        <label for="example-text-input" class="col-form-label">Package Image</label>
                                                        <input class="form-control" type="text" value="<?php echo $package_id; ?>" name="package_id"  id="example-text-input">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Package Description</label>
                                                        <input class="form-control" value="<?php echo $rowPackage['package_desc']; ?>" type="text" name="package_description" id="example-text-input">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Package Price</label>
                                                        <input class="form-control" value="<?php echo $rowPackage['package_price']; ?>" type="text" name="package_price" id="example-text-input">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Package Details</label>
                                                        <!-- <input class="form-control" type="text" name="package_price" id="example-text-input"> -->
                                                        <textarea class="form-control" rows="4" name="package_details"><?php echo $rowPackage['package_details']; ?></textarea>
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
                                            $package_id = $_POST['package_id'];
                                            $package_description = $_POST['package_description'];
                                            $package_price = $_POST['package_price'];
                                            $active_desc = $_POST['active'];
                                            $package_details = $_POST['package_details'];

                                            $queryUpdate = mysqli_query($con, "UPDATE `tblpackage` SET `package_desc`='$package_description',`package_price`='$package_price', `package_details`='$package_details', `active`='$active_desc' WHERE package_id = '$package_id'");
                            // }

                                            echo "<script>window.location.replace('packagelist.php')</script>";
                                        }
                                        

                                     ?>
                                        <?php endwhile; ?>
                                        </div>
                                    </div>
                                    
                                </div>