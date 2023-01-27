<?php
	include("connect.php");
	$id = $_GET['id'];
	$q = "delete from iris where id = $id ";
	mysqli_query($con,$q);
	
?>