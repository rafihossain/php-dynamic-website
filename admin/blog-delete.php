<?php session_start();
	require_once('functions/function.php');

	$id = $_GET['d'];
	$query = "DELETE FROM web_blog WHERE blog_id='$id'";
	
	if (mysqli_query($con,$query)) {
		header('location: blog-all.php');
	}else{
		echo 'Opps ! News Data not delete';
	}


?>