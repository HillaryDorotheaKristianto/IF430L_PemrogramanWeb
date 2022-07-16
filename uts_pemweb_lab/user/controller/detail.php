<?php
    require '../include/db_connect.php';
	
	$id = $_GET["id"];
    $result = mysqli_query($conn, "SELECT * FROM menu WHERE id = $id");
    
    $kategori = $_GET["kategori"];
    $menus = mysqli_query($conn, "SELECT * FROM menu WHERE kategori = '$kategori' AND id <> $id");
    
    
?>