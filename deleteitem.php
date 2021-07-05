<?php
include 'dbconnection.php';
$sql = "DELETE FROM `posts` WHERE `post_id` = ".$_GET['postid']."";
$result = $conn->query($sql);
header('Location: mycollection.php');
?>