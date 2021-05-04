<?php session_start();
	require_once('functions/function.php');

	$id = $_GET['d'];
	$query = "DELETE FROM web_event WHERE event_id='$id'";
	
	if (mysqli_query($con,$query)) {
		header('location: event-all.php');
	}else{
		echo 'Opps ! Event Data not delete';
	}


?>