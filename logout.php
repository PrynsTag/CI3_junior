<?php
	session_start();
	include('dbconnection.php');
	session_destroy();
	header('Location: old_index.php');
	unset($_SESSION['myid']);
?>