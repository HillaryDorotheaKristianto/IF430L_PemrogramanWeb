<?php
    require '../include/db_connect.php';
	
	$id = $_GET["id"];
    $result = mysqli_query($conn, "SELECT * FROM hotel");
    $result2 = mysqli_query($conn, "SELECT * FROM hotel WHERE id_hotel = $id");
?>