<?php session_start();
	require_once('functions/function.php');

	$id = $_GET['d'];
	$query = "DELETE FROM web_banner WHERE ban_id='$id'";
	
	if (mysqli_query($con,$query)) {
		header('location: banner-all.php');
	}else{
		echo 'Opps ! Banner Data not delete';
	}


?>