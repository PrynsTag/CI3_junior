<?php
	ob_start();
	session_start();
	error_reporting(0);

	// Create connection
	$conn = new mysqli("localhost", "root", "", "jarsproject"); 

	// Check connection
	if($conn->connect_error) {
		die("Connection failed: ". $conn->connect_error);
	}

	date_default_timezone_set("Asia/Manila");
?>