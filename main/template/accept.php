<?php 
	
	include('../../include/connection.php');

	$id = $_GET['id'];
	$transaction_number = $_GET['transactionNumber'];
	$customer_id = $_GET['customer_id'];

	$query = mysqli_query($con, "UPDATE `tbltransaction` SET `status_id`= 2 WHERE transaction_id  = $id");

	$query = mysqli_query($con, "INSERT INTO `tblnotification`(`notification_id`, `customer_id`, `transaction_id`, `status_id`) VALUES (NULL, '$customer_id', '$transaction_number', 2)");

	echo "<script>window.location.replace('pendinglist.php')</script>";
 ?>