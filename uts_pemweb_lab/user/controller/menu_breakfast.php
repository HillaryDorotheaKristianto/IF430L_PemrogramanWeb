<?php
    require '../include/db_connect.php';
	
	$query = "SELECT * FROM menu WHERE kategori='Breakfast'";
	$result = $conn->query($query);
    
    $admin = "SELECT * FROM user WHERE keterangan='admin'";
	$result2 = $conn->query($admin);
?>