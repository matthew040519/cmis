<?php 
		
		include('../../include/connection.php');
		$id = $_GET['id'];
		$food_code = $_GET['food_code'];

		$deleteQuery = mysqli_query($con, "DELETE FROM tblfoodimage WHERE fimage_id = $id");

		echo "<script>window.location.replace('updatefood.php?id=$food_code')</script>";


 ?>