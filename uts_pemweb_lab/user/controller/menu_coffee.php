<?php
    require '../include/db_connect.php';
	
	$query = "SELECT * FROM menu WHERE kategori='Coffee'";
	$result = $conn->query($query);
?>