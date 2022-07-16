<?php
    require '../include/db_connect.php';
    
    $id = $_GET["id"];
    
    mysqli_query($conn, "DELETE FROM cart WHERE id_cart = $id");
    
    header("Location: ../view/cart.php");
?>