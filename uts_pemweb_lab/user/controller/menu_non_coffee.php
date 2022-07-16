<?php
    require '../include/db_connect.php';
	
	$query = "SELECT * FROM menu WHERE kategori='Non-Coffee'";
	$result = $conn->query($query);
    
    //$querymodal = "SELECT * FROM menu";
    //$resultmodal = $conn->query($querymodal);
?>