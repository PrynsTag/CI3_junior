<?php
	session_start();
	include('dbconnection.php');
	session_destroy();
	header('Location: index.php');
	unset($_SESSION['myid']);
?>