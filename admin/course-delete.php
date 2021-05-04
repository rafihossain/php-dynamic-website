<?php session_start();
	require_once('functions/function.php');

	$id = $_GET['d'];
	$query = "DELETE FROM web_course WHERE course_id='$id' ";


	if (mysqli_query($con,$query)) {
			header('location:course-all.php');
		}else{
			echo "course not delete";
		}


?>