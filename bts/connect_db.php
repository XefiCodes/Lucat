<?php 
    //Starts output buffering and session.
	ob_start();
	session_start();

	// Sets variables for timezone and the connection.
	$timezone = date_default_timezone_set("Europe/London");
	$con = mysqli_connect("localhost", "root", "", "lucat");

	if(mysqli_connect_errno()) { //Error message if failed connection.
		echo "Connection failed. " . mysqli_connect_errno();
	}
?>