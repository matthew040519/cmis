<?php 
	
	include('../../include/connection.php');

	$id = $_GET['id'];

	$query = mysqli_query($con, "UPDATE `tbltransaction` SET `return_deliver`= 1 WHERE transaction_id  = $id");

	echo "<script>window.location.replace('approvelist.php')</script>";
 ?>