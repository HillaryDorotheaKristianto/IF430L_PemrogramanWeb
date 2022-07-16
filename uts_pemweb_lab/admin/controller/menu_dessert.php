<?php
    require '../include/db_connect.php';
	
	$query = "SELECT * FROM menu WHERE kategori='Dessert'";
	$result = $conn->query($query);
?>