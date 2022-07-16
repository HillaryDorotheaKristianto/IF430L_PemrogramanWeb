<?php
    require '../include/db_connect.php';
    
    $id = $_GET["id_booking"];
    
    mysqli_query($conn, "DELETE FROM booking WHERE id_booking = $id");
    
    header("Location: ../view/booking_list.php?id=0");
?>