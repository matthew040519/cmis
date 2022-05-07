<div class="modal fade bd-example-modal-lg<?php echo $row['events_id']; ?>">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Update <?php echo $row['events_desc']; ?></h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <?php 

                                                    $events_id = $row['events_id'];
                                                    // echo $food_id;
                                                    $queryEvent = mysqli_query($con, "SELECT * FROM tblevents WHERE events_id = '$events_id'");
                                                    while($rowEvent = mysqli_fetch_array($queryEvent)):
                                                        $id = $rowEvent['events_id'];
                                                        $active = $rowEvent['active'];

                                                 ?>
                                                <form method="POST">
                                                     <div class="form-group" style="display: none;">
                                                        <label for="example-text-input" class="col-form-label">Food Image</label>
                                                        <input class="form-control" type="text" name="event_id" id="example-text-input" value="<?php echo $events_id; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Event Description</label>
                                                        <input class="form-control" value="<?php echo $rowEvent['events_desc']; ?>" type="text" name="event_description" id="example-text-input">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Event Price</label>
                                                        <input class="form-control" value="<?php echo $rowEvent['events_price']; ?>" type="number" name="event_price" id="example-text-input">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Event Detail</label>
                                                        <!-- <input class="form-control" type="number" name="foor_price" id="example-text-input"> -->
                                                        <textarea class="form-control" name="event_detail" rows="4"><?php echo $rowEvent['events_details']; ?></textarea>
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
                                             $event_description = $_POST['event_description'];
                                            $event_price = $_POST['event_price'];
                                            $event_detail = $_POST['event_detail'];
                                            $event_id = $_POST['event_id'];
                                            $active = $_POST['active'];

                                            $queryUpdate = mysqli_query($con, "UPDATE `tblevents` SET `events_desc`='$event_description',`events_details`='$event_detail',`events_price`='$event_price',`active`='$active' WHERE events_id = '$event_id'");
                            // }

                                            echo "<script>window.location.replace('events.php')</script>";
                                        }
                                        

                                     ?>
                                        <?php endwhile; ?>
                                        </div>
                                    </div>
                                    
                                </div>