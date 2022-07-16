<?php
    require '../include/db_connect.php';
    
    $id = $_GET["id"];
    $kategori = $_GET["kategori"];
    
    mysqli_query($conn, "DELETE FROM menu WHERE id = $id");
    
    if($kategori == "Breakfast"){
        header("location: ../view/breakfast.php");
    } else if($kategori == "Dessert"){
        header("location: ../view/dessert.php");
    } else if($kategori == "Coffee"){
        header("location: ../view/coffee.php");
    } else if($kategori == "Non-Coffee"){
        header("location: ../view/non_coffee.php");
    } else{
        echo "Data Gagal Dihapus!";
    }
    
?>