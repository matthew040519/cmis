<div class="modal fade" id="exampleModalpopover<?php echo $code; ?>">
     <script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image<?php echo $code; ?>').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Add Users</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                    <form method="POST" enctype="multipart/form-data">
                                        <input type="text" style="display: none;" value="<?php echo $code; ?>" name="code">
                                                     <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Food Image</label>
                                                         <input type="file" onchange="readURL(this);" required="" name="image" class="form-control" placeholder="Enter schoolyear" />
                                                    </div>
                                                    <div class="form-group">
                                                      <img id="image<?php echo $code; ?>" class="img-thumbnail" style="width: 470px; height: 300px;" src="#" alt="your image" />
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                            </form>
                                                </div>
                                            </div>
                                        </div>

                                   <?php 
                                        if (isset($_POST['submit']))
                                        {
                                          
                                            $code = $_POST['code'];
                                            $image = $_FILES['image']['name'];  
                                            $target = "../../images/food/". basename($_FILES['image']['name']);

                                                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)){
                                                  // echo "<script>alert('Successfully Upload')</script>";
                                                    $queryImage = mysqli_query($con, "UPDATE `tblfoodimage` SET `image`= '$image' WHERE fimage_id = '$code'");
                                                } 
                                                else {
                                                  // echo "<script>alert('Error!')</script>";
                                                }

                                             

                                            // echo "<script>window.location.replace('updateFood.php')</script>";
                                        }
                                        

                                     ?>