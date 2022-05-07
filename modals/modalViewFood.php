<div class="modal fade bd-example-modal-lg<?php echo $row['transaction_number']; ?>">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Items List</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                        <div class="col-sm-4">
                                                            <label>Description</label>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <label>Qty</label>
                                                        </div>
                                                        <div class="col-sm-3">
                                                             <label>Price</label>
                                                        </div>
                                                        <div class="col-sm-3">
                                                             <label>Total Price</label>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                <?php 
                                                $sum = 0;
                                                $transaction_id = $row['transaction_number'];
                                                $querys = mysqli_query($con, "SELECT * FROM tblorder INNER join tblfoods on tblfoods.food_code=tblorder.item_code WHERE order_code = $transaction_id");
                                                while ($rows = mysqli_fetch_array($querys)){

                                                 ?>
                                                 <div class="row">
                                                        <div class="col-sm-4">
                                                            <label><?php echo $rows['food_desc']; ?></label>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <label><?php echo $rows['qty']; ?></label>
                                                        </div>
                                                        <div class="col-sm-3">
                                                             <label><?php echo number_format($rows['price'],2); ?></label>
                                                        </div>
                                                        <?php   
                                                                $totalprice = $rows['qty'] * $rows['price'];
                                                         ?>
                                                        <div class="col-sm-3">
                                                             <label>&#8369; <?php echo number_format($totalprice, 2) ; ?></label>
                                                        </div>
                                                    </div>

                                            <?php $sum += $totalprice; } ?>
                                            <?php 
                                                $transaction_id = $row['transaction_number'];
                                                $querys = mysqli_query($con, "SELECT * FROM tblorder INNER join tblpackage on tblpackage.package_code=tblorder.item_code WHERE order_code = $transaction_id");
                                                while ($rows = mysqli_fetch_array($querys)){
                                                 ?>
                                                 <div class="row">
                                                        <div class="col-sm-4">
                                                            <label><?php echo $rows['package_desc']; ?></label>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <label><?php echo $rows['qty']; ?></label>
                                                        </div>
                                                        <div class="col-sm-3">
                                                             <label><?php echo number_format($rows['package_price'],2); ?></label>
                                                        </div>
                                                        <?php   
                                                                $totalprice = $rows['qty'] * $rows['package_price'];
                                                         ?>
                                                        <div class="col-sm-3">
                                                             <label>&#8369; <?php echo number_format($totalprice, 2) ; ?></label>
                                                        </div>
                                                    </div>

                                            <?php $sum += $totalprice; } ?>
                                            <?php 
                                                $transaction_id = $row['transaction_number'];
                                                $querys = mysqli_query($con, "SELECT * FROM tblorder INNER join tblevents on tblevents.event_code=tblorder.item_code WHERE order_code = $transaction_id");
                                                while ($rows = mysqli_fetch_array($querys)){
                                                 ?>
                                                 <div class="row">
                                                        <div class="col-sm-4">
                                                            <label><?php echo $rows['events_desc']; ?></label>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <label><?php echo $rows['qty']; ?></label>
                                                        </div>
                                                        <div class="col-sm-3">
                                                             <label><?php echo number_format($rows['events_price'],2); ?></label>
                                                        </div>
                                                        <?php   
                                                                $totalprice = $rows['qty'] * $rows['events_price'];
                                                         ?>
                                                        <div class="col-sm-3">
                                                             <label>&#8369; <?php echo number_format($totalprice, 2) ; ?></label>
                                                        </div>
                                                    </div>

                                            <?php $sum += $totalprice; } ?>
                                            <?php 
                                                // $sum = 0;
                                                $transaction_id = $row['transaction_number'];
                                                $querys = mysqli_query($con, "SELECT * from tblfoods INNER JOIN tblgiveaways on tblgiveaways.food_id=tblfoods.food_id WHERE $sum BETWEEN tblgiveaways.begin_price AND tblgiveaways.limit_price");
                                                while ($rows = mysqli_fetch_array($querys)){

                                                 ?>
                                                 <div class="row">
                                                        <div class="col-sm-4">
                                                            <label><?php echo $rows['food_desc']; ?> (Freebies)</label>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <label><?php echo $rows['qty']; ?></label>
                                                        </div>
                                                        <div class="col-sm-3">
                                                             <label>0.00</label>
                                                        </div>
                                                        <?php   
                                                                $totalprice = $rows['qty'] * $rows['price'];
                                                         ?>
                                                        <div class="col-sm-3">
                                                             <label>&#8369; 0.00</label>
                                                        </div>
                                                    </div>

                                            <?php  } ?>
                                            <hr>
                                            <div class="row">
                                                        <div class="col-sm-3">
                                                           Total:
                                                        </div>
                                                        <div class="col-sm-3">
                                                           
                                                        </div>
                                                        <div class="col-sm-3">
                                                            
                                                        </div>
                                                        
                                                        <div class="col-sm-3">
                                                             <label>&#8369; <?php echo number_format($sum, 2) ; ?></label>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <p>Special Request: <?php echo $row['remarks'] ?></p>
                                                <!-- <div class="data-tables"> -->
                                   <!--  <table id="dataTable">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start Date</th>
                                                <th>salary</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Airi Satou</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>33</td>
                                                <td>2008/11/28</td>
                                                <td>$162,700</td>
                                            </tr>
                                        </tbody>
                                    </table> -->
                                <!-- </div> -->
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <!-- <button type="submit" name="submit" class="btn btn-primary">Save changes</button> -->
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    <?php 
                                        
                                        

                                     ?>
                                </div>