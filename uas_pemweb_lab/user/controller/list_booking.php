<?php
    require '../include/db_connect.php';
	
    $id = $_SESSION['id_user'];
    $id_booking = $_GET['id'];
    
    $result2 = mysqli_query($conn, "SELECT booking.id_booking, booking.harga, booking.email, booking.nomor_telepon, booking.check_in, booking.check_out, booking.jumlah_orang, booking.jumlah_kamar, hotel.nama_hotel, hotel.foto, hotel.bintang, hotel.kamar, hotel.alamat, hotel.telp FROM booking LEFT OUTER JOIN hotel ON hotel.id_hotel = booking.id_hotel WHERE id_user = '$id' AND id_booking = '$id_booking'");
    
    $result = mysqli_query($conn, "SELECT id_booking,hotel.nama_hotel FROM booking LEFT OUTER JOIN hotel ON hotel.id_hotel = booking.id_hotel WHERE id_user = '$id'");
?>