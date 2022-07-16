<?php
    require '../include/db_connect.php';
	
    //session_start();
    $id = $_SESSION['id_user'];
    $id_booking = $_GET['id'];
    $result2 = mysqli_query($conn, "SELECT * FROM booking JOIN hotel ON booking.id_hotel = hotel.id_hotel WHERE id_booking = $id_booking");
    $result = mysqli_query($conn, "SELECT * FROM booking INNER JOIN hotel ON booking.id_hotel = hotel.id_hotel");
?>