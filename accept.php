<?php 
	
	include('include/connection.php');

	$id = $_GET['id'];

	$query = mysqli_query($con, "UPDATE `tbltransaction` SET `status_id`= 2 WHERE transaction_id  = $id");

	echo "<script>window.location.replace('pendinglist.php')</script>";
 ?>